  @if (Auth::user()->is_favoriting($post->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('取り消し', ['class' => "btn btn-danger btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
             {!! Form::submit('いいね!', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    @endif