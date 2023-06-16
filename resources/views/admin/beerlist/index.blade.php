@extends('layouts.admin')
@section('brand', '登録済ビール一覧')


@section('content')
    <div class="container">
        <div class="row">
            <h2>ビール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.beerlist.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.beerlist.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">銘柄</label>
                            <div class="col-md-8">
                                <input type="varchar" class="form-control" name="cond_brand" value="{{ $cond_brand }}">
                            </div>
                            <div class="col-md-2">
                                @csrf
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    <div class="row">
        <div class="list-beerlist col-md-12 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="20%">銘柄</th>
                            <th width="20%">醸造所</th>
                            <th width="50%">コメント</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $beerlist)
                            <tr>
                                <th>{{ $beerlist->id }}</th>
                                <td>{{ Str::limit($beerlist->brand, 100) }} 
                                  {{--Str::limit(文字列を指定した数値、半角で認識で切り詰める)--}}
                                </td>
                                
                                <td>{{ Str::limit($beerlist->comment, 800) }}
                                </td>
                                <td>
                                    <div>
                                        <a href="{{ route('admin.beerlist.edit', ['id' => $beerlist->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.beerlist.delete', ['id' => $beerlist->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection