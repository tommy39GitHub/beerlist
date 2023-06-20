@extends('layouts.admin')
@section('title', 'ビールリストの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ビールリスト編集</h2>
                <form action="{{ route('admin.beerlist.update') }}" method="post" enctype="multipart/form-data">
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
                    </div>

{{-- 足りないのは追って追加 --}}

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