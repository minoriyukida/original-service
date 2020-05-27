@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
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
@endsection

