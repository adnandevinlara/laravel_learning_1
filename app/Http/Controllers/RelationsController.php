<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class RelationsController extends Controller
{
    public function index() {
    	$projects = Project::with('users')->get();
    	return view('user_projects',compact('projects'));

    }

    public function managers() {
    	$projects = Project::with('managers')->get();
    	return view('manager_projects',compact('projects'));

    }

    public function managersPivot(){
    	$projects = Project::with('myusers')->get();
    	return view('manager_w_pivotmodel',compact('projects'));
    }
}
