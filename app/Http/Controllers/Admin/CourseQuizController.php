<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Course;

class CourseQuizController extends Controller
{

    public function create(Course $course)
    {
        return view('admin.courses.createquiz', compact('course'));
    }

}
