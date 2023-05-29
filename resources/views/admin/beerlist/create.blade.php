
@extends('layouts.admin') {{-- viewファイルの継承。layouts/admin.blade.phpを読み込む・置き換わる --}}
@section('title', 'ビールリストの新規作成') {{-- @section:コンテンツのセクションを定義。admin.blade.phpの
                                            @yield('title')に'新規作成'を埋め込む --}}
@section('content') {{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ビールリストの新規作成</h2>
                <form action="{{ route('admin.beerlist.create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0) {{--$errors は `validate` で弾かれた内容を記憶する配列。conutメソッド：配列の個数を返す --}}
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">銘柄</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="brand" value="{{ old('brand') }}"> 
                                <!-- old('変数'):エラー時に自動で入れなおす-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">醸造所</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="brewery" value="{{ old('brewery') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">スタイル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="style" value="{{ old('style') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">形状</label>
                        <div class="col-md-10">
                            <input type="radio" class="form-control" name="shape" value="{{ old('缶') }}">
                            <input type="radio" class="form-control" name="shape" value="{{ old('瓶') }}">
                            <input type="radio" class="form-control" name="shape" value="{{ old('生ビール') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">アルコール度数</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="alcohol" value="{{ old('alcohol') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
{{-- @endsection --}}