<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Track;
use App\Course;
use App\User;
use App\Quiz;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$tracks = Track::orderBY('id','desc')->limit(5)->get();
    	$courses = Course::orderBY('id','desc')->limit(5)->get();
        $users = User::orderBY('id','desc')->limit(5)->get();
        $quizzes = Quiz::orderBY('id','desc')->limit(5)->get();

        return view('admin.dashboard', compact('tracks', 'courses', 'users', 'quizzes'));
    }
}
