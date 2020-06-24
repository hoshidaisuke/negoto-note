@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($posts) > 0)
                    <ul class="post">
                        @foreach($posts as $post)
                            <li>
                                <a href="{{ route('show.index', ['id' => $post->id]) }}">
                                    <p>【{{ $attributes::findOrFail($post->attribute_id)->content }}の寝言】{{ nl2br(e($post->content)) }}</p>
                                    <p>{{ date('Y/m/d', strtotime($post->created_at)) }}</p>
                                    <p>{{ $post->like_users()->count() }}いいね</p>
                                    <div class="btn-wrap">{!! link_to_route('mypage.edit', '編集', ['mypage' => $post->id], ['class' => 'btn btn-light']) !!}
                                        {!! Form::model($post, ['route' => ['mypage.destroy', $post->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    {{-- ページネーションのリンク --}}
                    {{ $posts->links() }}
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection