<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Http\Requests;
use App\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    //
    public function getchatview()
    {
        $posts = Chat::orderBy('created_at','desc')->get();
        return view('chat',['posts' => $posts]);
    }
    public function postCreatePost(Request $request)
    {
        $this->validate($request,
        [
            'body' => 'required|max:1000'
        ]);
        $post = new Chat();
        $post->body = $request['body'];
        $message = 'there was an error';
        if ($request->user()->chats()->save($post)){
            $message = 'Message send success';
        }
        return redirect()->route('chat')->with(['message' => $message]);
    }


}
