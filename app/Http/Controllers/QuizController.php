<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Quiz;

class QuizController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index($slug, $name){
    	$course = Course::where('slug', $slug)->first();
    	$quiz = $course->quizzes()->where('name', $name)->first();
    	return view('quiz', compact('quiz')); 
    }
    public function submit($slug, $name, Request $request){
    	$quiz = Quiz::where('name', $name)->first();
    	$questions = $quiz->questions;
    	$quiz_score = 0;
    	$questions_ids = [];
    	$questions_right_answers = [];

    	foreach ($questions as $question) {
    		$question_ids[] = $question->id;
    		$questions_right_answers[] = $question->right_answer;
    		$quiz_score += $question->score;
    	}
    	for($i=0, $i < count($questions_ids); $i++;){
    		$your_answer = trim($request['answer' .$questions_ids[$i]]);
    		$the_answer = trim($questions_right_answers[$id]);
    		if($your_answer != $the_answer){
    			return redirect("/courses/{$slug}/quizzes/{$name}")->withStatus("Your Answer {$your_answer} Is Not Correct !");
    		}
    	}
    	// attach user with the quiz
    	$user = auth()->user();
    	$user->quizzes()->attach([$quiz->id]);
    	//increment user`s score
    	$user->score += $quiz_score;
    	if($user->save()){
    		return redirect("/courses/" . $quiz->course->slug)->withStatus("Well done, You`ve solved {$quiz->name} Quiz and earned ".$quiz_score." Point.");
    	}
	}
}
