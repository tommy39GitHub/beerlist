<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beerlist extends Model
{
    use HasFactory;
    protected $table = 'adminbeerlists'; //table
   // 以下を追記
    protected $guarded = array('id');

    public static $rules = array(
        'brand' => 'required',
        // 'aroma' => 'required',
        // 'sweet' => 'required', 
        // 'acid' => 'required',
        // 'body' => 'required',
        // 'cost' => 'required',
        // 'comment' => 'required',
        // 'date' => 'required',
        
        //自分のテーブルに合わせて作っていく 空ではＸ
    );

}
