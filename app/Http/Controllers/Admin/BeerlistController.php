<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; //Controllerを呼出
use Illuminate\Http\Request;

use App\Models\Beerlist; //models/Beerlistが使用できる

class BeerlistController extends Controller
{
    public function add()
    {
        return view('admin.beerlist.create'); //views/admin/beerlist/create.blade.php呼出
    }

    public function create(Request $request) //(Requestクラス $requestに代入)
    { 
        // 以下を追記 Validationを行う
        $this->validate($request, Beerlist::$rules); 
            //$this->validateメソッド参照($request->all()判定) Models/Beerlist.phpで$rulesを呼出

        $beerlist = new Beerlist; //newメソッド Modelからインスタンス生成
        $form = $request->all(); //formで入力された値を取得

        // フォームから画像が送信されてきたら保存して、$->image_path に画像のパスを保存
        if (isset($form['image'])) { //isset(引数にデータがあるか)
            $path = $request->file('image')->store('public/image'); //file(画像をアップロード) store(パスを指定)->デプロイ時に変更
            $beerlist->image_path = basename($path); //basename(ファイル名のみ取得)
        } else {
            $beerlist->image_path = null; //$Beerlistテーブルimage_pathカラムにnull代入
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        $beerlist->fill($form);
        $beerlist->save(); // データベースに保存 saveメソッド

        return redirect('admin/beerlist/'); //admin/beerlist/createにリダイレクトする
    }
    
    public function index(Request $request) //追加 ビール一覧の表示
    {
        $cond_brand = $request->cond_brand; //$request中のcond_brandの値を$cond_brandに代入/なければnull
        $posts = Beerlist::orderBy('id', 'ASC') //結果データのソート orderBy('列名', '昇順')
            ->when(!is_null($cond_brand), function($q) use ($cond_brand) {
              // laravelのSQL文 
                $q->where('brand','LIKE',"%$cond_brand%")->orwhere('brewery','LIKE',"%$cond_brand%")
                    ->orwhere('style','LIKE',"%$cond_brand%");
                // where('カラム名','LIKE検索',"%検索ボックスの値%")->orwhere();
            })
            ->get();
            return view('admin.beerlist.index', ['posts' =>$posts, 'cond_brand' => $cond_brand]);
                                    /*index.blade.phpに取得した$postsとユーザが入力した文字列$cond_brandを渡しページを開く*/
    }

}
