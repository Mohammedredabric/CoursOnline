<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index(){

        $Courses= Course::with("user") ->
        select('courses.*',DB::raw('(select COUNT(DISTINCT (user_id))
        from completions
        inner join episodes on completions.episodes_id = episodes.id
        where episodes.course_id = courses.id )
        As participants'))
            -> withCount('Episodes')->get();
        return inertia::render('Courses/Index',['courses'=>$Courses]);
    }

    public function show(int $id){
        $Course = Course::where('id',$id) -> with('Episodes','user') -> withCount('Episodes') -> first();
        $watched = auth()->user()->Episodes;
        return inertia::render('Courses/Show',['course'=>$Course,'watched'=>$watched]);
    }

    public function toggeleProgress(Request $request){

        $user= auth() -> user();
        $user->Episodes()->toggle($request -> input('epissode_id'));
        return $user->Episodes;
    }

    public function store(Request $request){

            $request -> validate([
                'title'=>'required|string',
                'description'=>'required|string',
                'episodes'=>'required|array',
                'episodes.*.title'=>'required|string',
                'episodes.*.description'=>'required|string',
                'episodes.*.video_url'=>'required|url',
            ]);
            $course = Course::create($request->all());
            foreach ($request->input('episodes') as  $episode ){
                $episode['course_id'] = $course -> id;
                Episode::create($episode);
            }
            return Redirect::route('dashboard')->with('success','Félicitation, la formation a bien été mese en ligne.  ');
    }

}
