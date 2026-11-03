
@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="page-heading">
        <div>
            <h1>Create Post</h1>
            <p class="muted">Create a post and share with your friends dawg</p>
        </div>
        <a class="link" href="{{ route('posts.index') }}">← Back to posts</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-error"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form class="card" action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="field"><label for="title">Title</label><input type="text" id="title" name="title" value="{{ old('title') }}" required></div>

        <div class="field"><label for="body">Body</label><textarea id="body" name="body" required>{{ old('body') }}</textarea></div>

        <button type="submit">Publish Post</button>
    </form>
@endsection
