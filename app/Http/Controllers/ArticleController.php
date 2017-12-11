<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comments;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() //shows the site index
    {
        $articles = Article::where('live', '1')->orderBy('created_at', 'desc')->paginate(5); //retrieve live articles and show 5 with pagination
        $title    = 'Latest News';
        return view('results')->withArticles($articles)->withTitle($title);
    }

    public function view($id) //view and individual article
    {
        $article = Article::where('id', $id)->first();
        if ($article) {
            if (!$article->live) {
                return redirect('/')->withErrors('requested page not found'); //error on non existent id
            }
            $title = $article->title;
        }
        $comments = Comments::where('article_id', $id)->orderBy('created_at', 'desc')->paginate(5); //show comments for this article

        return view('article')->withArticle($article)->withTitle($title)->withEditing(0)->withComments($comments);
    }

    public function edit($id) //edit an article. Show the article view with editing flag
    {
        $article = Article::where('id', $id)->first();
        if ($article) {

            $title = $article->title;
        }

        return view('article')->withArticle($article)->withTitle($title)->withEditing(1);
    }

    function new () {

        return view('article')->withEditing(1);
    }

    public function add_comment(Request $request) //add comment to database. Record comment author and article id
    {

        $comment             = new Comments();
        $comment->body       = $request->body;
        $comment->author_id  = $request->user_id;
        $comment->article_id = $request->article_id;
        $comment->save();
        return redirect('/' . $request->article_id)->withMessage('Comment saved successfully');
    }

    public function update(Request $request) //update an article. If article doesn't already exist create a new one
    {
        if ($request->id != '') {
            //editing an existing article
            $post = Article::where('id', $request->id)->first();

        } else {
            $post = new Article();
        }
        $post->title        = $request->title;
        $post->body         = $request->body;
        $post->snippet_text = $this->get_string_between($request->body, '<p>', '</p>');
        $post->save();
        return redirect('edit/' . $post->id)->withMessage('Saved successfully');
    }

    public function delete(Request $request) //delete an article
    {
        $post = Article::where('id', $request->id)->first();
        $post->delete();

        return redirect('/')->withMessage('Deleted successfully');
    }

    private function get_string_between($string, $start, $end) //used to generate article snippets for index page
    {
        $string = ' ' . $string;
        $ini    = strpos($string, $start);
        if ($ini == 0) {
            return '';
        }

        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
}
