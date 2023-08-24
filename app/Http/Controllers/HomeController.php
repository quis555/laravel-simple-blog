<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
