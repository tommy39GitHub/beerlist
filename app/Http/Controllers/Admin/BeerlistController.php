<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Beerlist; //models/Beerlistが使用できる

class BeerlistController extends Controller
{
    public function add()
    {
        return view('admin.beerlist.create'); //views/admin/beerlist/create.blade.php呼出
    }

    public function create(Request $request)
    { 
        // 以下を追記
        // Validationを行う
        $this->validate($request, Beerlist::$rules);

        $beerlist = new Beerlist;
        $form = $request->all();

        // フォームから画像が送信されてきたら保存して、$news->image_path に画像のパスを保存
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $beerlist->image_path = basename($path);
        } else {
            $beerlist->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $beerlist->fill($form);
        $beerlist->save();

        return redirect('admin/beerlist/'); //admin/beerlist/createにリダイレクトする
    }
    public function index(Request $request) //追加 ビール一覧の表示
    {
        $cond_brand = $request->cond_brand; //$request中のcond_brandの値を$cond_brandに代入
            // if ($cond_brand != '') { //nullでないとき
            //     $posts = Beerlist::where('brand', $cond_brand)->get();
            //     /* whereメソッド beerlistテーブルの中のbrandカラムで$cond_brand（ユーザーが入力した文字）に一致するレコードをすべて取得 $posts変数に代入*/
            // } else {
            //     $posts = Beerlist::all();
            //     /* beerlistmodelを使ってデータベースに保存されているbeerlistテーブルのレコードをすべて取得 $postに代入*/
            // }
            $posts = Beerlist::orderBy('id', 'ASC') //結果データのソート orderBy('列名', '昇順')
                ->when(!is_null($cond_brand), function($q) use ($cond_brand){
                    // laravelのSQL 
                    $q->where('brand','LIKE',"%$cond_brand%")->orwhere('brewery','LIKE',"%$cond_brand%")->orwhere('comment','LIKE',"%$cond_brand%");
                    // where('brand','LIKE検索',"%検索ボックスの値%")->orwhere(追加)
                })
                ->get();
            return view('admin.beerlist.index', ['posts' =>$posts, 'cond_brand' => $cond_brand]);
            /*index.blade.phpファイルに$postsとユーザが入力した文字列$cond_brandを渡しページを開く*/
    }

}
