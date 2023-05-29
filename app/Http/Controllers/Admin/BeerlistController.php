<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeerlistController extends Controller
{
    public function add()
    {
        return view('admin.beerlist.create'); #views/admin/beerlist/create.blade.phpを呼び出す
    }

    public function create(Request $request)
    { 
        return redirect('admin/beerlist/create'); #admin/beerlist/createにリダイレクトする
    }
}