<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Snip;
use App\Vote;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function makeVote(Snip $snip,Request $request)
    {
        $current_vote = Vote::where('snip_id', $snip->id)->where('user_id', user()->id)->first();

        if (!$current_vote){
            $vote = new Vote();
            $vote->type = '+';
            $vote->snip_id = $snip->id;
            $vote->user_id = user()->id;
            $vote->save();
        }else{
            $current_vote->delete();
        }

        $snip->pushToIndex();

        return redirect(action('SnipController@show', $snip->id));

    }

}
