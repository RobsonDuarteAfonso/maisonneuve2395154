<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::select(
            'articles.id',
            'articles.en_title',
            'articles.en_text',
            'articles.fr_title',
            'articles.fr_text',
            'articles.created_at',
            'articles.user_id',
            'users.name as name'
        )
        ->join('users', 'users.id','=','user_id')
        ->paginate(5);

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'en_title' => 'min:3|max:255',
            'en_text' => 'required',
            'fr_title' => 'min:3|max:255',
            'fr_text' => 'required',
        ]);

        $userId = Auth::id();

        $newArticle = Article::create([
            'en_title' => $request->en_title,
            'en_text' => $request->en_text,
            'fr_title' => $request->fr_title,
            'fr_text' => $request->fr_text,
            'user_id' => $userId
        ]);

        return redirect(route('article.show', $newArticle->id))->withSuccess('Article enregistré!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $userId = Auth::id();

        if ($article->user_id != $userId) {
            return redirect(route('article.index'))->withErrors("Vous n'êtes pas autorisé à accéder à cette article.");
        }

        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $userId = Auth::id();

        if ($article->user_id != $userId) {
            return redirect(route('article.index'))->withErrors("Vous n'êtes pas autorisé à modifier cette article.");
        }

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'en_title' => 'min:3|max:255',
            'en_text' => 'required',
            'fr_title' => 'min:3|max:255',
            'fr_text' => 'required',
        ]);

        $userId = Auth::id();

        $article->update([
            'en_title' => $request->en_title,
            'en_text' => $request->en_text,
            'fr_title' => $request->fr_title,
            'fr_text' => $request->fr_text,
            'user_id' => $userId
        ]);

        return redirect(route('article.show', $article->id))->withSuccess('Article mis a jour!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('article.index'))->withSuccess('Article effacé!');
    }
}
