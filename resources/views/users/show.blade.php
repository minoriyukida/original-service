@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
             @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'posts.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'rows' => '1']) !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
    </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
           
            @if (count($posts) > 0)
                @include('posts.posts', ['posts' => $posts])
            @endif
        </div>
        
    </div>
@endsection

