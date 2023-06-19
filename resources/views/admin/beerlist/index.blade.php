@extends('layouts.admin')
@section('brand', '登録済ビール一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ビール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.beerlist.create') }}" role="button" class="btn btn-primary">新規作成</a>
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
                                <th>ID</th> {{-- <th>表の見出し要素 --}}
                                <th>銘柄</th>
                                <th>醸造所</th>
                                <th>産地</th>
                                <th>コメント</th>
                                <th>編集・削除</th> {{-- <th>と<td>の数を合わせる ->width bootstrapでは不要--}}
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $beerlist)
                            <tr>
                                <td>{{ $beerlist->id }}</td> {{-- <td>表の行要素 --}}
                                <td>{{ Str::limit($beerlist->brand, 100) }} </td>
                                    {{--Str::limit(文字列を指定した数値、半角で認識で切り詰める)--}}
                                <td>{{ Str::limit($beerlist->brewery, 100) }}</td>
                                <td>{{ Str::limit($beerlist->origin, 100) }}</td>
                                <td>{{ Str::limit($beerlist->comment, 800) }}</td>
                                <td>
                                    {{-- 
                                        <div>
                                        <a href="{{ route('admin.beerlist.edit',['id'=>$beerlist->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.beerlist.delete',['id'=>$beerlist->id]) }}">削除</a>
                                    </div> 
                                    --}}
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