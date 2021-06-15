<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;

class PageControllers extends Controller
{
    public function listProject(){
        $listAll = Projects::all();
        return view('admin.projects')->with('data',$listAll);
    }
}