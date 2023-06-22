<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; //Controllerを呼出
use Illuminate\Http\Request;

use App\Models\Beerlist; //models/Beerlistが使用できる

class BeerlistController extends Controller
{
    public function add()
    {
        return view('admin.beerlist.create'); //views/admin/beerlist/create.blade 呼出
    }

    public function create(Request $request) //(Requestクラス $requestに代入)
    { 
        // dd($request);
        // dd($request->form[0] . "/" . $request->form[1]);
        $package = '';
        if ($request->package != null) {
            for ($i = 0; $i < count($request->package); $i++) {
                $package .= $request->package[$i];
                if ($i < count($request->package) -1) { //"/"を最後使わないため-1
                    $package .= "/";
                }
            }
        }

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
        
        unset($form['_token']); // フォームから送信されてきた_tokenを削除
        unset($form['image']);         // フォームから送信されてきたimageを削除
        unset($form['package']);

        $beerlist->fill($form);
        $beerlist->package = $package;
        $beerlist->save(); // データベースに保存 saveメソッド

        return redirect('admin/beerlist/'); //admin/beerlist/ にリダイレクトする
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

    public function edit(Request $request) //追加
        {
            // Beerlist Modelからデータを取得する
            $beerlist = Beerlist::find($request->id);
            // dd($beerlist);
            if (empty($beerlist)) {
                abort(404);
            }
            $package = $beerlist->package; //$packageに文字代入
            $bottle =""; //バラで準備 初期化
            $can ="";
            $draft =""; 
            $elements = explode("/", $package); //ばらした要素　配列に
                foreach($elements as $element) {
                    if ($element == "瓶") {
                        $bottle = "ON";
                    }
                    if ($element == "缶") {
                        $can = "ON";
                    }
                    if ($element == "生ビール") {
                        $draft = "ON";
                    }
                }
            return view('admin.beerlist.edit', ['beerlist_form' => $beerlist, 'bottle'=> $bottle, 'can'=> $can, 'draft' => $draft]);
        }

    public function update(Request $request)
    {
        $this->validate($request, Beerlist::$rules); //updade時のvalidationもcreate.bladeと同じ
        // Beerlist Modelからデータを取得する
        $beerlist = Beerlist::find($request->id);
        // 送信されてきたフォームデータを格納する
        $beerlist_form = $request->all();

        if ($request->remove == 'true') {
            $beerlist_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $beerlist_form['image_path'] = basename($path);
        } else {
            $beerlist_form['image_path'] = $beerlist->image_path;
        }

        unset($beerlist_form['image']);
        unset($beerlist_form['remove']);
        unset($beerlist_form['_token']);

        // 該当するデータを上書きして保存する
        $beerlist->fill($beerlist_form)->save();

        return redirect('admin/beerlist');
    }
    
}
