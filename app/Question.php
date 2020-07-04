<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    	'title',
    	'answers',
    	'right_answer',
    	'score',
    	'quiz_id',
    ];

    public function quiz(){
    	return $this->belongsTo('App\Quiz');
    }
}
