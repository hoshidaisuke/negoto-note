@extends('layouts.app')

@section('content')

<div class="main-image">
    <p>
    ねごと
    <img src="./img/ochobo.JPG" alt="">
    のーと
    </p>
</div>
@if (Auth::check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        {!! Form::open(['route' => 'posts.store']) !!}
                            <div class="form-group">
                                {{Form::select('attribute', [
                                    '嫁' => '嫁',
                                    '旦那' => '旦那',
                                    '彼氏' => '彼氏',
                                    '彼女' => '彼女',
                                    '父' => '父',
                                    '母' => '母',
                                    '息子' => '息子',
                                    '娘' => '娘',
                                    '祖父' => '祖父',
                                    '祖母' => '祖母',
                                    '兄' => '兄',
                                    '姉' => '姉',
                                    '友人' => '友人',
                                    'その他' => 'その他',
                                ])}} の寝言
                            </div>
                            <div class="form-group">
                                {!! Form::textarea('content', '', ['class' => 'form-control', 'rows' => '3' ]) !!}
                            </div>
                            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
@endif

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {!! Form::open([
                    'route' => ['posts.index'],
                    'method' => 'get'
                ]) !!}


                    <div class="form-group sort">
                        {{Form::select('sort', [
                            '新着順',
                            'いいね数順',
                        ], $sort)}}
                        {!! Form::submit('決定', ['class' => 'btn btn-primary']) !!}
                    </div>
                    
                {!! Form::close() !!}                
                <ul class="post-list">
                    @foreach($posts as $post)
                        <li>
                            <a href="{{ route('show.index', ['id' => $post->id]) }}">
                                <p class="post">【{{ $attributes::findOrFail($post->attribute_id)->content }}の寝言】{{ $post->content }}</p>
                                <p><button type="submit" class="btn-like"><span class="material-icons">
                                <span class="material-icons">
                                favorite_border
                                </span></button>{{ $post->like_users()->count() }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{-- ページネーションのリンク --}}
                {{ $posts->links() }}
            </div>
        </div>

        <ul class="snsbtniti2">
            <li><a href="https://twitter.com/intent/tweet?text=%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3%E3%81%AEQ%26A%E3%82%B5%E3%82%A4%E3%83%88%E3%80%8C%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA%E3%80%8D&url=https://invisaqa.herokuapp.com/" class="flowbtn12 fl_tw2"
            ><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
            <li><a href="//timeline.line.me/social-plugin/share?url=https://invisaqa.herokuapp.com/" class="flowbtn12 fl_li2"><i class="fab fa-line"></i><span>LINE</span></a></li>
            <li><a href="http://b.hatena.ne.jp/add?mode=confirm&url=https://invisaqa.herokuapp.com/" class="flowbtn12 fl_hb2"><i class="fas fa-bold"></i><span>Hatena</span></a></li>
        </ul>
    </div>
</div>

@endsection