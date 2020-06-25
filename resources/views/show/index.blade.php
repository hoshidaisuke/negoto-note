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
                    <button type="submit" class="btn-like">
                        <span class="material-icons">favorite</span>
                    </button>{{ $count_like_users }}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['likes.like', $post->id]]) !!}
                    <button type="submit" class="btn-like">
                        <span class="material-icons">favorite_border</span>
                    </button>{{ $count_like_users }}
                    {!! Form::close() !!}
                @endif
                 
            @else
                <span class="material-icons">favorite_border</span>{{ $count_like_users }}
            @endif
            
            
            @if (Auth::check())
                @if($post->user_id === Auth::user()->id)
                <div class="sns-wrapper">
                    <div>
                    <p class="micro-copy">\寝言を投稿したよ/</p>
                    <a href="{{ 'https://twitter.com/intent/tweet?text=%E5%AF%9D%E8%A8%80%E3%82%92%E6%8A%95%E7%A8%BF%E3%81%97%E3%81%9F%E3%82%88%0D%0A%23%E3%81%AD%E3%81%94%E3%81%A8%E3%81%AE%E3%83%BC%E3%81%A8%0D%0A' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
            ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                    </div>
                </div>
                @else
                    <div class="sns-wrapper">
                        <div>
                            <p class="micro-copy">\この寝言がおもしろい/</p>
                            <a href="{{ 'https://twitter.com/intent/tweet?text=%E3%81%93%E3%81%AE%E5%AF%9D%E8%A8%80%E3%81%8C%E3%81%8A%E3%82%82%E3%81%97%E3%82%8D%E3%81%84%0D%0A%23%E3%81%AD%E3%81%94%E3%81%A8%E3%81%AE%E3%83%BC%E3%81%A8%0D%0A' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                        ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                        </div>
                        <div>
                            <p class="micro-copy">\この寝言がかわいい/</p>
                            <a href="{{ 'https://twitter.com/intent/tweet?text=%E3%81%93%E3%81%AE%E5%AF%9D%E8%A8%80%E3%81%8C%E3%81%8B%E3%82%8F%E3%81%84%E3%81%84%0D%0A%23%E3%81%AD%E3%81%94%E3%81%A8%E3%81%AE%E3%83%BC%E3%81%A8%0D%0A' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                        ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                        </div>
                    </div>
                @endif
            @else
            <div class="sns-wrapper">
                <div>
                    <p class="micro-copy">\この寝言がおもしろい/</p>
                    <a href="{{ 'https://twitter.com/intent/tweet?text=%E3%81%93%E3%81%AE%E5%AF%9D%E8%A8%80%E3%81%8C%E3%81%8A%E3%82%82%E3%81%97%E3%82%8D%E3%81%84%0D%0A%23%E3%81%AD%E3%81%94%E3%81%A8%E3%81%AE%E3%83%BC%E3%81%A8%0D%0A' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                </div>
                <div>
                    <p class="micro-copy">\この寝言がかわいい/</p>
                    <a href="{{ 'https://twitter.com/intent/tweet?text=%E3%81%93%E3%81%AE%E5%AF%9D%E8%A8%80%E3%81%8C%E3%81%8B%E3%82%8F%E3%81%84%E3%81%84%0D%0A%23%E3%81%AD%E3%81%94%E3%81%A8%E3%81%AE%E3%83%BC%E3%81%A8%0D%0A' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                </div>
            </div>
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