@extends('layouts.admin')
@section('title', 'ビールリストの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ビールリスト編集</h2>
                <form action="{{ route('admin.beerlist.update') }}" method="post" 
                    enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="brand">銘柄</label>
                        <div class="col-md-10">
                            <input type="varchar" class="form-control" name="brand" value="{{ $beerlist_form->brand }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">醸造所</label>
                        <div class="col-md-10">
                            <input type="varchar" class="form-control" name="brewery" value="{{ $beerlist_form->brewery }}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">産地</label>
                        <div class="col-md-10">
                            <input type="varchar" class="form-control" name="origin" value="{{ $beerlist_form->origin }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">スタイル</label>
                        <div class="col-md-10">
                            <input type="varchar" class="form-control" name="style" value="{{ $beerlist_form->style }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">形状（瓶/缶/生ビール）</label>
                        <div class="col-md-10">
                            <input type="radio" class="form-control" name="shape" value="{{ $beerlist_form->form }}">
                            <input type="radio" class="form-control" name="shape" value="{{ $beerlist_form->form }}">
                            <input type="radio" class="form-control" name="shape" value="{{ $beerlist_form->form }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">ホップ</label>
                        <div class="col-md-10">
                            <input type="varchar" class="form-control" name="hop" value="{{ $beerlist_form->hop }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">アルコール度数</label>
                        <div class="col-md-10">
                            <input type="double" class="form-control" name="abv" value="{{ $beerlist_form->abv }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">苦味</label>
                        <div class="col-md-10">
                            <input type="double" class="form-control" name="ibu" value="{{ $beerlist_form->ibu }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">香り</label>
                        <div class="col-md-10">
                            <input type="int" class="form-control" name="aroma" value="{{ $beerlist_form->aroma }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">甘味</label>
                        <div class="col-md-10">
                            <input type="int" class="form-control" name="sweet" value="{{ $beerlist_form->sweet }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">酸味</label>
                        <div class="col-md-10">
                            <input type="int" class="form-control" name="acid" value="{{ $beerlist_form->acid }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">コク</label>
                        <div class="col-md-10">
                            <input type="int" class="form-control" name="body" value="{{ $beerlist_form->body }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">コストパフォーマンス</label>
                        <div class="col-md-10">
                            <input type="int" class="form-control" name="cost" value="{{ $beerlist_form->cost }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">ml</label>
                        <div class="col-md-10">
                            <input type="int" class="form-control" name="ml" value="{{ $beerlist_form->ml }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $beerlist_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="comment" rows="20">{{ $beerlist_form->comment }}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">飲んだ日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="date" value="{{ $beerlist_form->date }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $beerlist_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection