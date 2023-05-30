<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beerlist', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // ビールの名称・タイトルを保存するカラム
            $table->string('brewery')->nullable(); // 醸造所
            $table->string('origin'); // 産地（県名か国名）
            $table->string('style')->nullable();  // ビールのスタイル
            $table->string('form')->nullable(); //ビール形状
            $table->string('hop')->nullable(); //使用ホップ
            $table->double('abv')->nullable(); //abvアルコール度数
            $table->double('ibu')->nullable(); //ibu苦味指数
            $table->integer('bitter'); //５段階苦味指数
            $table->integer('aroma'); //５段階香り指数
            $table->integer('sweet'); //５段階甘味指数
            $table->integer('acid'); //５段階酸味指数
            $table->integer('nodo'); //５段階のどごし指数
            $table->integer('koku'); //５段階コク指数 ５段階は７角形座標表示？
            $table->integer('cost'); //５段階コスパ指数
            $table->integer('ml')->nullable(); //内容量
            $table->string('image_path')->nullable();  // 画像のパスを保存するカラム
            $table->text('comment'); //コメント：メンター指導追加
            $table->date('date'); //飲んだ日付：メンター指導追加
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { #取消しの為のコード。beerlistというテーブルがあれば削除
        Schema::dropIfExists('beerlist');
    }
};
