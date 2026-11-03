
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
            color: #333;
            background: #f5f6fa;
        }

        h1 {
            color: #2c3e50;
        }

        .card {
            background: white;
            padding: 22px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        label {
            display: inline-block;
            margin: 8px 5px 8px 0;
        }

        input[type="date"] {
            padding: 9px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            margin: 5px 5px 5px 0;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            color: white;
            background: #2878c7;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .green {
            background: #218838;
        }

        .gray {
            background: #6c757d;
        }

        .error {
            color: #c0392b;
            margin-top: 8px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }

        th {
            color: white;
            background: #34495e;
        }

        tr:nth-child(even) {
            background: #f8f9fa;
        }

        .summary {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Posts Report</h1>
    <p>Filter your blog posts by their creation date and export the results.</p>

    <div class="card">
        <h2>Filter by Date</h2>

        <form method="GET" action="{{ route('posts.reports.index') }}">
            <label for="start_date">Start Date:</label>
            <input
                type="date"
                id="start_date"
                name="start_date"
                value="{{ old('start_date', $startDate) }}"
            >

            <label for="end_date">End Date:</label>
            <input
                type="date"
                id="end_date"
                name="end_date"
                value="{{ old('end_date', $endDate) }}"
            >

            <button type="submit" class="btn">Generate Report</button>

            <a href="{{ route('posts.reports.index') }}" class="btn gray">
                Clear Filters
            </a>
        </form>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>

    <div class="card">
        <p class="summary">Total Posts: {{ $totalPosts }}</p>

        <p>
            <strong>Start Date:</strong>
            {{ $startDate ?: 'All dates' }}
        </p>

        <p>
            <strong>End Date:</strong>
            {{ $endDate ?: 'All dates' }}
        </p>

        <h2>Export Report</h2>

        <a
            href="{{ route('posts.reports.pdf', request()->query()) }}"
            class="btn green"
        >
            Export PDF
        </a>

        <a
            href="{{ route('posts.reports.csv', request()->query()) }}"
            class="btn"
        >
            Export CSV
        </a>

        <a href="{{ route('posts.index') }}" class="btn gray">
            Back to Posts
        </a>
    </div>

    <div class="card">
        <h2>Report Results</h2>

        @if ($posts->isEmpty())
            <p>No posts found for the selected date range.</p>
        @else
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body Preview</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($post->body, 150) }}</td>
                                <td>{{ $post->created_at?->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</body>
</html>
