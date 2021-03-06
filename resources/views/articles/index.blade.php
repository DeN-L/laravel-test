@extends('layouts.app')

@section('title', 'All articles')

@section('content')
    <a href="{{ route('articles.create') }}" class="btn btn-success">Create Article</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Is Publish</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
        <tr>
            <th scope="row">{{ $article->id }}</th>
            <td>{{ $article->user->name }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->content }}</td>
            <td>{{ $article->is_publish ? 'Yes' : 'No' }}</td>
            <td class="table-buttons">
                <a href="{{ route('articles.show', $article) }}" class="btn btn-success">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">
                    <i class="fa fa-pencil" ></i>
                </a>
                <form method="POST" action="{{ route('articles.destroy', $article) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
