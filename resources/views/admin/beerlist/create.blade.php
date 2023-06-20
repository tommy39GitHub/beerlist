
        @extends('layouts.admin') {{-- view(layouts/admin.blade.php)読込 --}}
        @section('title', 'ビールリストの新規作成') 
            {{--@sectionコンテンツのセクションを定義  admin.blade.php @yield('title')に'新規作成'を埋込。 --}}

        @section('content') {{-- admin.blade.php @yield('content')に以下のタグを埋込 --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2>ビールリスト新規作成</h2>
                        <form action="{{ route('admin.beerlist.create') }}" method="post" 
                            enctype="multipart/form-data">
                            @if (count($errors) > 0) 
                                {{--$errors は `validate` で返る内容を記憶する配列。countメソッド：配列の個数を返す --}}
                                <ul>
                                    @foreach($errors->all() as $e) {{-- $errorsを$eに代入　 --}}
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-2">銘柄</label>
                                <div class="col-md-10">
                                    <input type="varchar" class="form-control" name="brand" value="{{ old('brand') }}"> 
                                        {{--old('変数'):エラー時に自動で入れ直し--}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2">醸造所</label>
                                <div class="col-md-10">
                                    <input type="varchar" class="form-control" name="brewery" value="{{ old('brewery') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">産地</label>
                                <div class="col-md-10">
                                    <input type="varchar" class="form-control" name="origin" value="{{ old('origin') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">スタイル</label>
                                <div class="col-md-10">
                                    <input type="varchar" class="form-control" name="style" value="{{ old('style') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">形状（瓶/缶/生ビール）</label>
                                <div class="col-md-10">
                                    <input type="radio" class="form-control" name="shape" value="{{ old('form') }}">
                                    <input type="radio" class="form-control" name="shape" value="{{ old('瓶') }}">
                                    <input type="radio" class="form-control" name="shape" value="{{ old('生ビール') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">ホップ</label>
                                <div class="col-md-10">
                                    <input type="varchar" class="form-control" name="hop" value="{{ old('hop') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">アルコール度数</label>
                                <div class="col-md-10">
                                    <input type="double" class="form-control" name="abv" value="{{ old('abv') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">苦味</label>
                                <div class="col-md-10">
                                    <input type="double" class="form-control" name="ibu" value="{{ old('ibu') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">香り</label>
                                <div class="col-md-10">
                                    <input type="int" class="form-control" name="aroma" value="{{ old('aroma') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">甘味</label>
                                <div class="col-md-10">
                                    <input type="int" class="form-control" name="sweet" value="{{ old('sweet') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">酸味</label>
                                <div class="col-md-10">
                                    <input type="int" class="form-control" name="acid" value="{{ old('acid') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">コク</label>
                                <div class="col-md-10">
                                    <input type="int" class="form-control" name="body" value="{{ old('body') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">コストパフォーマンス</label>
                                <div class="col-md-10">
                                    <input type="int" class="form-control" name="cost" value="{{ old('cost') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">ml</label>
                                <div class="col-md-10">
                                    <input type="int" class="form-control" name="ml" value="{{ old('ml') }}">
                                </div>
                            </div>
                         
                            <div class="form-group row">
                                <label class="col-md-2">画像</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" name="image">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">コメント</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="comment" rows="20">{{ old('comment') }}
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">飲んだ日</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" name="drinked" value="{{ old('drinked') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2">登録日</label>
                                <div class="col-md-10">
                                    <input type="timestamp" class="form-control" name="registered" value="{{ old('registered') }}">
                                </div>
                            
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">更新日</label>
                                <div class="col-md-10">
                                    <input type="timestamp" class="form-control" name="revised" value="{{ old('revised') }}">
                                </div>
                            </div>
                            
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </form>
                    </div>
                </div>
            </div>
        @endsection
