<ul class="list-unstyled">
    @foreach ($posts as $post)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($post->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!} <span class="text-muted">posted at {{ $post->created_at }}</span>
                </div>
                <div style="line-height: 1.5;margin: 2em;padding: 1em;border: 1px solid #336699;background-color: #white;">
                <div>
                     <h5><label class="col-4 col-form-label ">タイトル　:</label></h5>
                    <h4><p class="mb-0 border">{!! nl2br(e($post->title)) !!}</p></h4>
                    <h5><label class="col-4 col-form-label">内容:</label></h5>
                    <h4><p class="mb-0 border">{!! nl2br(e($post->content)) !!}</p></h4>
                </div>
                 <div>
                    @if (Auth::id() == $post->user_id)
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                    @include('user_favorite.favorite_button', ['user' => $user])
                    <span class="fa fa-heart like-btn"></span>
                    <span >{{ $post->favorited()->count() }}</span>
                </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $posts->links('pagination::bootstrap-4') }}