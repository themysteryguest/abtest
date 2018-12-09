<?php

namespace App\Http\Controllers;

use App\Project;
use App\Http\Resources\ProjectResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Used by the API to display a list of projects
        return ProjectResource::collection(Project::simplePaginate(20)); //Return 20 results per call - returned json contains page link info

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Use the store method to process and parse the uploaded XML

        //TODO - add empty field, file format validation here, also could validate xml structure
        //TODO - copy file to folder and process from there

        $projects_xml_file = $request->file('projects_xml_file');

        //move the file into the storage folder
        $destinationPath = storage_path('app/uploads');
        $input['filename'] = time().'_'.$projects_xml_file->getClientOriginalName(); //add timestamp to filename
        $projects_xml_file->move($destinationPath, $input['filename']); //TODO check for successful move

        //open and read the file
        $xml = simplexml_load_file($destinationPath."/".$input['filename']);

        foreach($xml->children() as $project) {

            //add a new row for each entry

            //TODO collect and report on empty fields
            //TODO check for duplicates and exclude(?)
            //TODO handle large data sets

            DB::table('projects')->insert(
                ['project_name' => $project->name, 'project_description' => $project->description]
            );

            return redirect('/')
                ->with('flash_message', 'The new projects were successfully imported.');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($projectId)
    {



        //display the specified project
        $project = Project::where('id', $projectId)->first();
        return new ProjectResource($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
