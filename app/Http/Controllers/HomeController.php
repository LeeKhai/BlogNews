<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function comment(Request $request, $id)
    {
        $comment = Comment::create([
            'content'         => $request->input('content'),
            'parent_id'       => 0,
            'user_id'         => Auth::user()->id,
            'news_id'         => $id,
        ]);
        $str = '
        <div class="media" >
            <div class="media-left">
                <a href="#">
                    <img alt="64x64" class="media-object" src="' . asset('avatars/' . Auth::user()->picture) . '" data-holder-rendered="true" style="border-radius: 50%;">
                </a>
            </div>
            <div class="media-body">
                <h2 class="media-heading">'.Auth::user()->name.'</h2>
                '.$comment->content.'
                <div class="comment_article_social">
                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                    <a href="#"><span class="reply_ic"> Reply </span></a>
                </div>
            </div>    
        </div>
      ';
        return $str;
    }
}
