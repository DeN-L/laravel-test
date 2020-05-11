@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="card">
        <div class="card-body">
            <p><b>User ID: </b>{{ $article->user_id }}</p>
            <p><b>Title: </b>{{ $article->title }}</p>
            <p><b>Content: </b>{{ $article->content }}</p>
            <p><b>Is Publish: </b>{{ $article->is_publish ? 'Yes' : 'No' }}</p>
        </div>
    </div>
@endsection
