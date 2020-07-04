<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;

class CourseVideoController extends Controller
{

    public function create(Course $course)
    {
        return view('admin.courses.createvideo', compact('course'));
    }
    
}