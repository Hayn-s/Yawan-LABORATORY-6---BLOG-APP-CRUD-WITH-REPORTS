
@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="page-heading">
        <div>
            <h1>Edit Post</h1>
            <p class="muted">Update your post details dawg.</p>
        </div>
        <a class="link" href="{{ route('posts.show', $post) }}">← View post</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-error"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form class="card" action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field"><label for="title">Title</label><input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required></div>

        <div class="field"><label for="body">Body</label><textarea id="body" name="body" required>{{ old('body', $post->body) }}</textarea></div>

        <button type="submit">Save Changes</button>
    </form>
@endsection
