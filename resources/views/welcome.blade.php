@extends('layouts.app')

@section('content')
     @if (Auth::check())
       <div class="row">
            <aside class="col-sm-4">
                 @include('users.card', ['user' => Auth::user()])
                  @if (Auth::id() == $user->id)
                   {!! link_to_route('posts.create', '新規投稿の作成', [], ['class' => 'btn btn-warning']) !!}
            @endif
            </aside>
            <div class="col-sm-8">
                @include('users.navtabs', ['user' => $user])
                @if (count($posts) > 0)
                    @include('posts.posts', ['posts' => $posts])
                @endif
            </div>
        </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
             {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif
@endsection