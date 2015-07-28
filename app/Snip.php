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
}
