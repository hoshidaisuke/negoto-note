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
                                    'bride' => '嫁',
                                    'husband' => '旦那',
                                    'boyfriend' => '彼氏',
                                    'girlfriend' => '彼女',
                                    'father' => '父',
                                    'mother' => '母',
                                    'son' => '息子',
                                    'daughter' => '娘',
                                    'grandfathe' => '祖父',
                                    'grandmother' => '祖母',
                                    'brother' => '兄',
                                    'sister' => '姉',
                                    'friend' => '友人',
                                    'Other' => 'その他',
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