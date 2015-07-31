<?php

namespace App;

use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use Illuminate\Database\Eloquent\Model;

class Snip extends Model
{

    use AlgoliaEloquentTrait;

    public $algoliaSettings = [
        'attributesToIndex' => [
            'id',
            'name',
            'content',
            'language' => [
                'name',
                'description'
            ]
        ],
        'customRanking' => [
            'desc(likeCount)',
        ],
    ];

    protected $fillable = [
      'name',
      'language_id',
      'content'
    ];

    public function getAlgoliaRecord()
    {
        $extra_data = [
            'language' => $this->language->toArray(),
            'likeCount' => $this->likeCount(),
            'commentCount' => $this->commentCount(),
            'owner' => $this->user->name
        ];

        return array_merge($this->toArray(), $extra_data);
    }

    public function getVoteByUser($user_id)
    {
        $vote = Vote::where('user_id', '=', $user_id)->get();

        return $vote->type;
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function commentCount()
    {
        return count($this->comments);
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Vote');
    }

    public function likeCount()
    {
        return count($this->likes);
    }
}
