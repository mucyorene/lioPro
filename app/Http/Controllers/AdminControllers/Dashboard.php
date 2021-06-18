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

                $imageName = time().'.'.$image->extension();
                $image->move(public_path().'/images/', $imageName);  
                $data[] = $imageName;  
            }
        }
        $project = new Projects;
        $project->client = $request->input('client');
        $project->position = $request->input('position');
        $project->currentStage = $request->input('currentStage');
        $project->location = $request->input('location');
        $project->description = $request->input('description');
        $project->image = json_encode($data);
        $project->save();
        return back()->with('success','Project successfully saved.');
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
                $imageName = time().'.'.$image->extension();
                $image->move(public_path().'/images/', $imageName);  
                $data[] = $imageName;  
            }

            $project = Projects::find($id);
            $project->client = $request->input('client');
            $project->position = $request->input('position');
            $project->currentStage = $request->input('currentStage');
            $project->location = $request->input('location');
            $project->description = $request->input('description');
            $project->image = json_encode($data);
            $project->save();
            return back()->with('success','Project successfully modified.');

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
}
