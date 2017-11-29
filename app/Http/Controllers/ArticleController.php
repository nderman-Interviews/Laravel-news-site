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
}
