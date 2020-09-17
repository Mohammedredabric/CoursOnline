<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index(){
        $Courses= Course::all();
        return inertia::render('Courses/Index',['courses'=>$Courses]);
    }
}
