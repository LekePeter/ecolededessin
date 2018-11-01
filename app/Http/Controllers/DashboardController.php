<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Project;
use App\Contact;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
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

        if($request->hasFile('image1')){
            $fileNameWithExt = $request->file('image1')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image1')->getClientOriginalExtension();
            $fileNameToStore1 = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image1')->storeAs('public/images', $fileNameToStore1);
        }else{
            $fileNameToStore1 = "noImage.png";
        }

        if($request->hasFile('image2')){
            $fileNameWithExt = $request->file('image2')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image2')->getClientOriginalExtension();
            $fileNameToStore2 = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image2')->storeAs('public/images', $fileNameToStore2);
        }else{
            $fileNameToStore2 = "noImage.png";
        }

        if($request->hasFile('image3')){
            $fileNameWithExt = $request->file('image3')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image3')->getClientOriginalExtension();
            $fileNameToStore3 = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image3')->storeAs('public/images', $fileNameToStore3);
        }else{
            $fileNameToStore3 = "noImage.png";
        }

        $project = new Project;
        $project->title = $request->input('title');
        $project->subtitle = $request->input('subtitle');
        $project->extract = $request->input('extract');
        $project->summary = $request->input('summary');
        $project->body = $request->input('body');
        $project->img1 = $fileNameToStore1;
        $project->img2 = $fileNameToStore2;
        $project->img3 = $fileNameToStore3;
        $project->save();
        return redirect('/dashboard/add')->with('success', 'Project created successfully');
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'contact_name' => 'required',
            'contact_subject' => 'required',
            'contact_email' => 'required',
            'contact_message' => 'required'
        ]);

        $contact = new Contact;
        $contact->name = $request->input('contact_name');
        $contact->subject = $request->input('contact_subject');
        $contact->email = $request->input('contact_email');
        $contact->message = $request->input('contact_message');        
        $contact->save();
        return redirect('/contact')->with('success', 'Message sent successfully');
    }

    public function mail(){
        return view('dashboard.mail');
        
    }
}
