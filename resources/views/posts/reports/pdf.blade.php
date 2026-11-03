
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yawan Blog Posts Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .details {
            margin: 20px 0;
            line-height: 1.8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #bbb;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #34495e;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 9px;
            color: #666;
        }
    </style>
</head>
<body>

    <h1>Blog Posts Report</h1>

    <div class="details">
        <strong>Prepared by:</strong> Heinz Jul Yawan<br>
        <strong>Start Date:</strong> {{ $startDate ?: 'All dates' }}<br>
        <strong>End Date:</strong> {{ $endDate ?: 'All dates' }}<br>
        <strong>Total Posts:</strong> {{ $totalPosts }}<br>
        <strong>Generated At:</strong> {{ $generatedAt ?? now()->format('Y-m-d H:i:s') }}
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 7%;">ID</th>
                <th style="width: 23%;">Title</th>
                <th style="width: 50%;">Body</th>
                <th style="width: 20%;">Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at?->format('Y-m-d H:i:s') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No posts found for the selected date range.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Yawan Blog App — Generated Report
    </div>

</body>
</html>
