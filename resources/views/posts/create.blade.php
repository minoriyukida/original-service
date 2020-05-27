@extends('layouts.app')

@section('content')

    <h1>新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($post, ['route' => 'posts.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'タイトル　:') !!}
                    {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'rows' => '1']) !!}
                    {!! Form::label('content', '内容　:') !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                </div>
        
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection