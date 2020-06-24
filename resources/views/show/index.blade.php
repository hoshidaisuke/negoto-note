@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <ul class="breadcrumb">
            <li>
                <a href="/">トップ</a>
            </li>
            <li><span class="material-icons">keyboard_arrow_right</span></li>
            <li>詳細ページ</li>
        </ul>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                    <div class="alert alert-dark" role="alert">
                        <p>{{ $attribute->content }}の寝言</p>
                        <p>{{ nl2br(e($post->content)) }}</p>
                        @if (Auth::check())
                            @if (Auth::user()->is_like($post->id))
                                {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
                                <button type="submit" class="btn-like"><span class="material-icons">
                                favorite
                                </span></button>{{ $count_like_users }}
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['route' => ['likes.like', $post->id]]) !!}
                                <button type="submit" class="btn-like"><span class="material-icons">
                                <span class="material-icons">
                                favorite_border
                                </span></button>{{ $count_like_users }}
                                {!! Form::close() !!}
                            @endif
                             
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success">いいね</a>

                        @endif
                        
                        <p class="micro-copy">\Twitterで寝言を拡散しよう！/</p>
                        @if (Auth::check())
                            @if($post->user_id === Auth::user()->id)
                                <a href="{{ 'https://twitter.com/intent/tweet?text=' . $post->title . '%E3%81%A8%E3%81%84%E3%81%86%E8%B3%AA%E5%95%8F%E3%81%AE%E5%9B%9E%E7%AD%94%E3%82%92%E5%8B%9F%E9%9B%86%E3%81%97%E3%81%A6%E3%81%84%E3%81%BE%E3%81%99%EF%BC%81+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                        ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                            @else
                                <a href="{{ 'https://twitter.com/intent/tweet?text=' . $post->title . '%E3%81%A8%E3%81%84%E3%81%86%E8%B3%AA%E5%95%8F%E3%81%8C%E3%81%82%E3%82%8A%E3%81%BE%E3%81%99%EF%BC%81+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                        ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                            @endif
                        @else
                            <a href="{{ 'https://twitter.com/intent/tweet?text=' . $post->title . '%E3%81%A8%E3%81%84%E3%81%86%E8%B3%AA%E5%95%8F%E3%81%8C%E3%81%82%E3%82%8A%E3%81%BE%E3%81%99%EF%BC%81+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                        ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                        @endif
                    </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-md-8 back-link">
        <a href="/"><span class="material-icons">keyboard_arrow_right</span>TOPに戻る</a>
    </div>
</div>

@endsection