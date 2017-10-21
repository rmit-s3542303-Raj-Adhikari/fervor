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
    public function loadInbox()
    {
        return view('inbox', ['rid' => false]);
    }


    public function getchatview($rid)
    {
        $sent = Chat::where('user_id','=', Auth::id())
            ->where('recipient_id','=', $rid)
            ->orderBy('id', 'asc')
            ->get();

        $received = Chat::where(function ($query) use (&$rid) {
                $query->where('recipient_id','=', Auth::id())
                    ->where('user_id','=', $rid);
            })
            ->orWhere(function ($query) use (&$rid) {
                $query->where('recipient_id','=', $rid)
                    ->where('user_id','=', Auth::id());
            })
            ->orderBy('id', 'asc')
            ->get();

        $posts = [];



        // Merge sort sent and received messages to build chronological order

        return view('inbox', ['posts' => $received, 'rid' => $rid]);
    }
    public function postCreatePost(Request $request)
    {
        $this->validate($request,
        [
            'body' => 'required|max:1000'
        ]);
        $post = new Chat();
        $post->body = $request['body'];
        $post->recipient_id = $request['rec'];
        $message = 'there was an error';
        if ($request->user()->chats()->save($post)){
            $message = 'Message send success';
        }
        return redirect()->route('loadmsg', ['rid' => $request['rec']]);
    }


}
