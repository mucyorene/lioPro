<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;

class FormControllerImages extends Controller
{
    //
    public function create(){
        return view('create');
    }
    public function store(Request $request){
    
    
        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
         }
    
         $file= new Images;
         $file->imageName=json_encode($data);
         $real = json_decode($file);
         
         $file->save();
        return back()->with('success', 'Data Your files has been successfully added');

    }
       
}
