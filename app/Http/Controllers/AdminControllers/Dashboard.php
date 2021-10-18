<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasfile('imageName')) {
            foreach ($request->file('imageName') as $image) {
                $request->validate([
                    'imageName'=>'required',
                    'client' => 'required|min:3|max:30'
                 ]);

                $imageName = rand().'.'.$image->extension();
                $image->move(public_path().'/images/', $imageName);  
                $data[]['image'] = $imageName;  
            }
        }
        $validate = Projects::where('description','=',$request->description,'or','client','=',$request->client)->first();
        if (empty($validate)) {
            $project = new Projects;
            $project->client = $request->input('client');
            $project->position = $request->input('position');
            $project->currentStage = $request->input('currentStage');
            $project->location = $request->input('location');
            $project->description = $request->input('description');
            $project->image = json_encode($data);
            $project->save();
            return back()->with('success','Project successfully saved.');
        }else{
            return back()->with('error','Project already registered');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Projects::find($id);
        return view('admin.edit',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasfile('imageName')) {
            foreach ($request->file('imageName') as $image) {

                $request->validate([
                    'imageName'=>'required',
                    'client' => 'required|min:3|max:30'
                 ]);

                $imageName = time().'.'.$image->extension();
                $image->move(public_path().'/images/', $imageName);  
                $data[] = $imageName;  
            }
            $findUpdate = Projects::where('description','=',$request->description,'or','client','=',$request->client)->first();
            if ($findUpdate) {
                $project = Projects::find($id);
                $project->client = $request->input('client');
                $project->position = $request->input('position');
                $project->currentStage = $request->input('currentStage');
                $project->location = $request->input('location');
                $project->description = $request->input('description');
                $project->image = json_encode($data);
                $project->save();
                return back()->with('success','Project successfully modified.');
            }
            else{
                return back()->with('error','Project duplicate');
            }
            
        }else{

            $project = Projects::find($id);
            $project->client = $request->input('client');
            $project->position = $request->input('position');
            $project->currentStage = $request->input('currentStage');
            $project->location = $request->input('location');
            $project->description = $request->input('description');
            $project->save();
            return back()->with('success','Project successfully modified.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $removeProject = Projects::find($id);
        $removeProject->delete();
        return back()->with('success', 'Project removed successfully');
    }
    public function jReturn(){
        $all = Projects::all();
        return $all;
    }
}
