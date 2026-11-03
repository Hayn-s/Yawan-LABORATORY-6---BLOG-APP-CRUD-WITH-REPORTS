<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PostReportController extends Controller
{
    public function index(Request $request)
    {
        $filters = $this->validateFilters($request);
        $posts = $this->getReportData($filters);

        return view('posts.reports.index', [
            'posts' => $posts,
            'startDate' => $filters['start_date'] ?? '',
            'endDate' => $filters['end_date'] ?? '',
            'totalPosts' => $posts->count(),
        ]);
    }

    public function exportPdf(Request $request)
    {
        $filters = $this->validateFilters($request);
        $posts = $this->getReportData($filters);

        $data = [
            'posts' => $posts,
            'startDate' => $filters['start_date'] ?? '',
            'endDate' => $filters['end_date'] ?? '',
            'totalPosts' => $posts->count(),
        ];

        return Pdf::loadView('posts.reports.pdf', $data)
            ->setPaper('a4', 'portrait')
            ->download('posts-report.pdf');
    }

    public function exportCsv(Request $request): StreamedResponse
    {
        $filters = $this->validateFilters($request);
        $posts = $this->getReportData($filters);

        return response()->streamDownload(function () use ($posts) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['ID', 'Title', 'Body', 'Created At']);

            foreach ($posts as $post) {
                fputcsv($handle, [
                    $post->id,
                    $this->csvText($post->title),
                    $this->csvText($post->body),
                    $post->created_at?->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($handle);
        }, 'posts-report.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    private function validateFilters(Request $request): array
    {
        return $request->validate([
            'start_date' => ['nullable', 'date_format:Y-m-d'],
            'end_date' => [
                'nullable',
                'date_format:Y-m-d',
                'after_or_equal:start_date',
            ],
        ]);
    }

    private function getReportData(array $filters)
    {
        return Post::query()
            ->when(
                !empty($filters['start_date']),
                fn ($query) => $query->whereDate(
                    'created_at',
                    '>=',
                    $filters['start_date']
                )
            )
            ->when(
                !empty($filters['end_date']),
                fn ($query) => $query->whereDate(
                    'created_at',
                    '<=',
                    $filters['end_date']
                )
            )
            ->orderByDesc('created_at')
            ->get();
    }

    private function csvText(?string $value): string
    {
        $value = $value ?? '';

        if (preg_match('/^[\s]*[=+\-@]/', $value)) {
            return "'" . $value;
        }

        return $value;
    }
}
