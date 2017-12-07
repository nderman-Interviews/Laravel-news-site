<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;

use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('live','1')->orderBy('created_at','desc')->paginate(5);
        $title = 'Latest News';
        return view('results')->withArticles($articles)->withTitle($title);
    }

    public function view($id)
    {
        $article = Article::where('id',$id)->first();
        if ($article){
            if (!$article->live){
                return redirect('/')->withErrors('requested page not found');
            }
            $title = $article->title;
        }

        return view('article')->withArticle($article)->withTitle($title);
    }

    public function edit($id)
    {
        $article = Article::where('id',$id)->first();
        if ($article){
            if (!$article->live){
                return redirect('/')->withErrors('requested page not found');
            }
            $title = $article->title;
        }

        return view('article')->withArticle($article)->withTitle($title)->withEditing(1);
    }
}
