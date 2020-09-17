<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index(){
        $Courses= Course::with("user") -> withCount('Episodes')->get();
        return inertia::render('Courses/Index',['courses'=>$Courses]);
    }

    public function show(int $id){
        $Course = Course::where('id',$id) -> with('Episodes') -> first();
        return inertia::render('Courses/Show',['course'=>$Course]);
    }
}
