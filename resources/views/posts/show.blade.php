
@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <article class="card">
        <h1>{{ $post->title }}</h1>
        <p class="post-body">{{ $post->body }}</p>
        <div class="actions">
            <a class="button" href="{{ route('posts.edit', $post) }}">Edit Post</a>
            <a class="link" href="{{ route('posts.index') }}">← Back to posts</a>
        </div>
    </article>
@endsection
