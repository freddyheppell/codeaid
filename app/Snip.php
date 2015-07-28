<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snip extends Model
{
    protected $fillable = [
      'name',
      'language_id',
      'content'
    ];

    public function getVoteByUser($user_id)
    {
        $vote = Vote::where('user_id', '=', $user_id)->get();

        return $vote->type;
    }
}
