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

        return view('article')->withArticle($article)->withTitle($title)->withEditing(0);
    }

    public function edit($id)
    {
        $article = Article::where('id',$id)->first();
        if ($article){

            $title = $article->title;
        }

        return view('article')->withArticle($article)->withTitle($title)->withEditing(1);
    }

    public function new()
    {

        return view('article')->withEditing(1);
    }


    public function update(Request $request)
    {
        if ($request->id != ''){ //editing an existing article
            $post = Article::where('id', $request->id)->first();

        }else{
            $post = new Article();
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->snippet_text = $this->get_string_between($request->body,'<p>', '</p>');
        $post->save();
        return redirect('edit/'.$post->id)->withMessage('Saved successfully');
    }

    private function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
}
