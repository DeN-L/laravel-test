@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('articles.store') }}">
                @csrf
                <div class="form-group">
                    <label for="article-user">User ID</label>
                    <input type="text" name="user_id"
                           value="{{ old('user_id') ? old('user_id') : auth()->user()->id }}" class="form-control" id="article-user">
                </div>
                <div class="form-group">
                    <label for="article-title">Title</label>
                    <input type="text" name="title"
                           value="{{ old('title') }}" class="form-control" id="article-title">
                </div>
                <div class="form-group">
                    <label for="article-content">Content</label>
                    <textarea name="content" class="form-control" id="article-content" rows="3">{{ old('content') }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="is_publish" value="1" class="form-check-input" id="article-is-publish">
                    <label class="form-check-label" for="article-is-publish">Is Publish</label>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
