<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\EditCommentRequest;
use App\Snip;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCommentRequest|Request $request
     * @param Snip $snip
     * @return Response
     */
    public function store(CreateCommentRequest $request, Snip $snip)
    {
        $comment = new Comment();
        $comment->user_id = user()->id;
        $comment->content = $request->comment;
        $comment->snip_id = $snip->id;
        $comment->save();

        $snip->pushToIndex();

        return redirect(action('SnipController@show', $snip->id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EditCommentRequest $request, Comment $comment, Snip $snip)
    {
        $comment = $request->all();
    }

}
