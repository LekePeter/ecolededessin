<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class PageController extends Controller
{
    public function index(){
        $projects = Project::orderBy('created_at', 'desc')->take(4)->get();
        return view('pages.index')->with('projects', $projects);
    }

    public function service(){
        return view('pages.service');
    }

    public function projects(){
        $projects = Project::all();
        return view('pages.projects')->with('projects', $projects);
    }

    public function project($id){
        $project = Project::find($id);
        return view('pages.project')->with('project', $project);
    }

    public function contact(){
        return view('pages.contact');
    }

    public function about(){
        return view('pages.about');
    }

}
