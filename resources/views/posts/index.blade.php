
@extends('layouts.app')

@section('title', 'Blog.Hub')

@section('content')
    <div class="page-heading">
        <div>
            <h1>Blog.Hub</h1>
            <p class="muted">Post your ideas and share your stories.</p>
        </div>
        <a class="button" href="{{ route('posts.create') }}">Create Post</a>
        <a href="{{ route('posts.reports.index') }}">View Reports</a>
    </div>

    @forelse ($posts as $post)
        <article class="card">
            <h2>{{ $post->title }}</h2>
            <p class="post-body">{{ $post->body }}</p>
            <div class="actions">
                <a class="link" href="{{ route('posts.show', $post) }}">View</a>
                <a class="link" href="{{ route('posts.edit', $post) }}">Edit</a>
                <form class="inline" action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-button" type="submit" onclick="return confirm('Archive this post?')">Archive</button>
                </form>
            </div>
        </article>
    @empty
        <div class="empty">No blog posts yet. Create your first post!</div>
    @endforelse
@endsection
