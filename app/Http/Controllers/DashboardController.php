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

    public function show()
    {
        $projects = Project::all();
        return view('dashboard.show')->with('projects', $projects);
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
            'body' => 'required'
        ]);

        $project = new Project;
        $project->title = $request->input('title');
        $project->body = $request->input('body');
        $project->img_url = "noImage.png";
        $project->save();
        return redirect('/dashboard/add')->with('success', 'Post created');
    }
}
