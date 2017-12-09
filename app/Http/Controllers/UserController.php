<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function view($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            if (!$user->live) {
                return redirect('/')->withErrors('requested page not found');
            }
            $title = $user->title;
        }

        return view('user')->withuser($user)->withTitle($title)->withEditing(0);
    }

     public function signup()
    {
        $user = user::where('id', $id)->first();
        if ($user) {
            if (!$user->live) {
                return redirect('/')->withErrors('requested page not found');
            }
            $title = $user->title;
        }

        return view('user')->withuser($user)->withTitle($title)->withEditing(0);
    }

     public function login()
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            if (!$user->live) {
                return redirect('/')->withErrors('requested page not found');
            }
            $title = $user->title;
        }

        return view('login');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {

            $title = $user->title;
        }

        return view('user')->withuser($user)->withTitle($title)->withEditing(1);
    }

    function new () {

        return view('user')->withEditing(1);
    }

    public function update(Request $request)
    {
        if ($request->id != '') {
            //editing an existing user
            $post = user::where('id', $request->id)->first();

        } else {
            $post = new user();
        }
        $post->title        = $request->title;
        $post->body         = $request->body;
        $post->snippet_text = $this->get_string_between($request->body, '<p>', '</p>');
        $post->save();
        return redirect('edit/' . $post->id)->withMessage('Saved successfully');
    }

    public function delete(Request $request)
    {
        $post = user::where('id', $request->id)->first();
        $post->delete();

        return redirect('/')->withMessage('Deleted successfully');
    }
}
