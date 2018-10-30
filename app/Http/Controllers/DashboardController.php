<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Project;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function add()
    {
        return view('dashboard.add');
    }

    public function projects()
    {
        $projects = Project::all();
        return view('dashboard.projects')->with('projects', $projects);
    }

    public function project($id)
    {
        $project = Project::find($id);
        return view('dashboard.project')->with('project', $project);
    }
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required'
        ]);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = "noImage.png";
        }

        $project = new Project;
        $project->title = $request->input('title');
        $project->subtitle = $request->input('subtitle');
        $project->extract = $request->input('extract');
        $project->summary = $request->input('summary');
        $project->body = $request->input('body');
        $project->img_url = $fileNameToStore;
        $project->save();
        return redirect('/dashboard/add')->with('success', 'Project created successfully');
    }
}
