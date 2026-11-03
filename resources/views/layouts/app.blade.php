<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog.Hub')</title>
    <style>
        :root { color: #172033; background: #f3f6fb; font-family: Inter, Arial, sans-serif; }
        * { box-sizing: border-box; }
        body { margin: 0; background: #f3f6fb; }
        .site-header { background: linear-gradient(120deg, #122042, #1c3f78); box-shadow: 0 2px 12px rgba(18, 32, 66, .18); }
        .nav, .container { max-width: 940px; margin: 0 auto; padding-left: 24px; padding-right: 24px; }
        .nav { min-height: 70px; display: flex; align-items: center; justify-content: space-between; }
        .brand { color: #fff; font-size: 1.35rem; font-weight: 800; letter-spacing: -.02em; text-decoration: none; }
        .container { padding-top: 42px; padding-bottom: 56px; }
        h1 { margin: 0 0 8px; color: #172033; font-size: 2.15rem; letter-spacing: -.04em; }
        h2, h3 { margin-top: 0; }
        .muted { color: #64748b; }
        .page-heading { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 28px; }
        .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 26px; margin-bottom: 18px; box-shadow: 0 6px 20px rgba(30, 41, 59, .06); }
        .card h2 { color: #1e3a68; font-size: 1.35rem; letter-spacing: -.02em; }
        .post-body { color: #475569; line-height: 1.7; white-space: pre-line; }
        .actions { display: flex; align-items: center; flex-wrap: wrap; gap: 12px; margin-top: 18px; }
        .button, button { border: 0; border-radius: 8px; background: #2563eb; color: #fff; cursor: pointer; display: inline-block; font: inherit; font-size: .9rem; font-weight: 700; padding: 10px 16px; text-decoration: none; transition: background .2s, transform .2s; }
        .button:hover, button:hover { background: #1d4ed8; transform: translateY(-1px); }
        .button-secondary { background: rgba(255, 255, 255, .14); color: #fff; }
        .button-secondary:hover { background: rgba(255, 255, 255, .24); }
        .link { color: #2563eb; font-size: .9rem; font-weight: 700; text-decoration: none; }
        .link:hover { text-decoration: underline; }
        .delete-button { background: transparent; color: #dc2626; padding: 0; }
        .delete-button:hover { background: transparent; color: #b91c1c; }
        form.inline { display: inline; margin: 0; }
        label { display: block; font-size: .9rem; font-weight: 700; margin-bottom: 7px; }
        input, textarea { background: #fff; border: 1px solid #cbd5e1; border-radius: 8px; color: #172033; font: inherit; padding: 11px; width: 100%; }
        input:focus, textarea:focus { border-color: #2563eb; box-shadow: 0 0 0 3px #dbeafe; outline: none; }
        textarea { min-height: 150px; resize: vertical; }
        .field { margin-bottom: 18px; }
        .alert { border-radius: 10px; margin-bottom: 20px; padding: 13px 15px; }
        .alert-success { background: #ecfdf5; border-left: 4px solid #059669; color: #047857; }
        .alert-error { background: #fef2f2; border-left: 4px solid #dc2626; color: #b91c1c; }
        .alert-error ul { margin: 0; padding-left: 20px; }
        .empty { background: #fff; border: 1px dashed #b8c5d6; border-radius: 14px; color: #64748b; padding: 32px; text-align: center; }
        @media (max-width: 600px) { .nav, .container { padding-left: 16px; padding-right: 16px; } .page-heading { align-items: flex-start; flex-direction: column; } }
    </style>
</head>
<body>
    <header class="site-header">
        <nav class="nav">
            <a class="brand" href="{{ route('posts.index') }}">Blog.Hub</a>
            <a class="button button-secondary" href="{{ route('posts.create') }}">New Post</a>
        </nav>
    </header>

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
