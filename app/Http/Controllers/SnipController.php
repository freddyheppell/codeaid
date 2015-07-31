<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateSnipRequest;
use App\Language;
use App\Snip;
use App\Vote;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SnipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @internal param Request $request
     */
    public function index()
    {
        return view('index')->with(['snips' => Snip::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $languages = Language::all();
        return view('new')->with(['languages' => $languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateSnipRequest $request)
    {
        $snip = new Snip;
        $snip->name = $request->name;
        $snip->content = $request->comment;
        $snip->language_id = $request->language_id;
        $snip->user_id = user()->id;
        $snip->save();

        return redirect(action('SnipController@show', $snip->id));
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     * @internal param int $id
     */
    public function show(Snip $snip)
    {
        $vote_count = count(Vote::where('snip_id', $snip->id)->get());
        if (Auth::check()) {
            $user_vote = Vote::where('snip_id', $snip->id)->where('user_id', user()->id)->first();
        }else{
            $user_vote = null;
        }
        $snip->load('comments');
        return view('snip', compact('snip', 'vote_count', 'user_vote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Snip $snip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Snip $snip)
    {
        $snip = $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Snip $snip)
    {
        $snip->delete();
    }
}
