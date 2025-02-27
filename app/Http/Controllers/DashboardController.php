<?php

namespace App\Http\Controllers;

use App\Models\Committe;
use App\Models\Official;
use App\Models\Post;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Post::limit(8)->orderBy('updated_at', 'desc')->get();

        $card_statistic = [
            'article' => Post::count(),
            'committe' => Committe::count(),
            'official' => Official::count(),
            'training' => Training::count()
        ];

        $article_per_month = Post::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year) // Get data for the current year
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format data for Chart.js
        $line_statistic = [];

        for ($i = 1; $i <= 12; $i++) {
            $line_statistic[] = $article_per_month->where('month', $i)->first()->total ?? 0;
        }

        return view('pages.admin.dashboard', compact('articles', 'card_statistic', 'line_statistic'));
    }
}
