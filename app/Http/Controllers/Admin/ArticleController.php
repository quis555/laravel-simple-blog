<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('admin/article/list', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function deleteConfirmation(int $id): View
    {
        $article = Article::findOrFail($id);
        return $this->confirmDelete(
            'Czy na pewno chcesz usunąć artykuł ' . $article->title . '?',
            'Potwierdź usunięcie artykułu'
        );
    }

    public function delete(int $id): RedirectResponse
    {
        $article = Article::findOrFail($id);
        if (!empty($article->img)) {
            Storage::disk('public')->delete($article->img);
        }
        $article->delete();
        return redirect('/admin/articles')->with('status', 'Artykuł został usunięty.');
    }

    public function edit(?int $id = null): View
    {
        return view('admin/article/edit', [
            'article' => $id ? Article::findOrFail($id) : null,
        ]);
    }

    public function save(SaveArticleRequest $request, ?int $id = null): RedirectResponse
    {
        $title = $request->validated('title');
        $content = $request->validated('content');

        if ($id === null) {
            $article = new Article();
            $message = 'Artykuł został utworzony.';
        } else {
            $article = Article::findOrFail($id);
            $message = 'Zapisano zmiany';
        }

        $article->title = $title;
        $article->content = $content;
        if ($request->hasFile('img')) {
            $article->img = $request->img->store('articles', 'public');
        }
        $article->save();
        return redirect('/admin/articles')->with('status', $message);
    }
}
