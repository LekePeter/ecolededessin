<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function service(){
        return view('pages.service');
    }

    public function project(){
        return view('pages.project');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function about(){
        return view('pages.about');
    }

}
