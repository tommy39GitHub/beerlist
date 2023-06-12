<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beerlist extends Model
{
    use HasFactory;

   // 以下を追記
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'xxxxx' => 'required', //自分のテーブルに合わせて作っていく 空ではＸ
    );

}
