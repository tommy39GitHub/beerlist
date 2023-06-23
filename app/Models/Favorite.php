<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $table = '$favorites';

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'brand_id' => 'required',
    );
}