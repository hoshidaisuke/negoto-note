@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">{{ Auth::user()->name }}</h2>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! Form::model($post, ['route' => ['mypage.update', $post->id], 'method' => 'put']) !!}
                            <div class="form-group">
                                {!! Form::label('attribute', '私の') !!}
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
                                ], $attribute->code)}} の
                            </div>
                            <div class="form-group">
                                {!! Form::label('content', '寝言') !!}
                                {!! Form::textarea('content', $post->content, ['class' => 'form-control', 'rows' => '3' ]) !!}
                            </div>
                            <div class="btn-wrap">
                                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                                {!! link_to_route('mypage.show', 'キャンセル', ['mypage' => Auth::id()], ['class' => 'btn btn-light']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection