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


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function setVote(VoteRequest $request)
    {
        $vote = Vote::where('snip_id', $request->snip_id)->where('user_id', user()->id)->first();

        if (!$vote){
            $vote->type = $request->type;
            $vote->save();
            return $vote;
        }else{
            $vote = Vote::create($request->all() . ['user_id' => user()->id]);
            return $vote;
        }

    }

    public function getVote(Request $request)
    {
        return Vote::where('snip_id', $request->snip_id)->where('user_id', user()->id);
    }

}
