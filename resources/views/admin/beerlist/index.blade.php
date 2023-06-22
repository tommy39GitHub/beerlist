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
                                                    {{-- create ->add --}}
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.beerlist.index') }}" method="get">
                    <div class="form-group row">

                            <div class="col-md-8">
                                <input type="varchar" placeholder="検索対象を入力"  class="form-control" name="cond_brand" value="{{ $cond_brand }}">
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
                                <th>ID</th> {{-- <th>table header要素 --}}
                                <th>☆</th>
                                <th>銘柄</th>
                                <th>醸造所</th>
                                <th>産地</th>
                                <th>スタイル</th>
                                <th>苦味</th>
                                <th>香り</th>
                                <th>甘味</th>
                                <th>酸味</th>
                                <th>コク</th>
                                <th>コスパ</th>
                                <th>写真</th>
                                <th>形状</th>
                                {{-- <th>コメント</th> --}}
                                <th>飲んだ日</th>
                                <th>編集</th> {{-- <th>と<td>の数を合わせる ->width属性 sass使ったら不要--}}
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $beerlist)
                            <tr>
                                <td>{{ $beerlist->id }}</td> {{-- <td>table data表の行要素 --}}
                                    <td>{{ $beerlist->favorite }}</td>
                                    <td>{{ Str::limit($beerlist->brand, 100) }} </td>
                                    {{--Str::limit(文字列を指定した数値(半角認識)で切り詰)--}}
                                <td>{{ Str::limit($beerlist->brewery) }}</td>
                                <td>{{ Str::limit($beerlist->origin) }}</td>
                                <td>{{ Str::limit($beerlist->style, 100) }}</td>
                                <td>{{ Str::limit($beerlist->ibu) }}</td>
                                <td>{{ Str::limit($beerlist->aroma) }}</td>
                                <td>{{ Str::limit($beerlist->sweet) }}</td>
                                <td>{{ Str::limit($beerlist->acid) }}</td>
                                <td>{{ Str::limit($beerlist->body) }}</td>
                                <td>{{ Str::limit($beerlist->cost) }}</td>
                                <td>
                                    @if($beerlist->image_path != "") {{-- 空文字でなければ画像を表示 --}}
                                    <img src="{{ asset('/storage/image/' . $beerlist->image_path) }}" style="width: 100px;"></td>
                                    {{-- imgタグ src属性 asset('シンボリックリンク作成後public以下のパス' . $任意の変数名->パスが格納された列名 
                                        style属性 width属性 要素の横幅--}}
                                    @endif
                                <td>{{ Str::limit($beerlist->package, 50) }}</td>
                                {{-- <td>{{ Str::limit($beerlist->comment, 800) }}</td> --}}
                                <td>{{ Str::limit($beerlist->date) }} </td>
                                <td>
                                    <div>
                                    <a href="{{ route('admin.beerlist.edit',['id'=>$beerlist->id]) }}">編集</a>
                                    </div>
                                    {{-- 
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