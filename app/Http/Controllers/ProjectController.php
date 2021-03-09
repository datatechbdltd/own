<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Project;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Project::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('invoice', function($data) {
                    if($data->invoice)
                        return $data->invoice->invoice_id;
                })->addColumn('status', function($data) {
                    if($data->projectStatus)
                        return $data->projectStatus->name;
                })->addColumn('image', function($data) {
                    return '<img src='.asset($data->image ?? get_static_option('no_mage')).' class="rounded-circle" width="70px;" height="70px;">';
                })->addColumn('create', function($data) {
                    return $data->created_at->format('d/M/Y');
                })->addColumn('action', function($data) {
                    return '<a href="'.route('project.edit', $data).'" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('project.destroy', $data).'"><i class="fa fa-trash"></i> </button>';
                })
                ->rawColumns(['invoice','status', 'image', 'create', 'action'])
                ->make(true);
        }else{
            return view('backend.project.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoices = Invoice::all();
        $project_statuses = ProjectStatus::all();
        return view('backend.project.create', compact('invoices','project_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice' => 'nullable|exists:invoices,id',
            'project_status' => 'nullable|exists:project_statuses,id',
            'name' => 'nullable',
            'project_id' => 'nullable',
            'description' => 'nullable',
            'agreement' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $project = new Project();

        $project->invoice_id    =   $request->invoice;
        $project->status_id    =   $request->project_status;
        $project->name    =   $request->name;

        $project->project_id    =   $request->project_id;
        $project->description    =   $request->description;
        $project->agreement    =   $request->agreement;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/project/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $project->image   = $folder_path . $image_new_name;
        }

        $project->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $invoices = Invoice::all();
        $project_statuses = ProjectStatus::all();
        return view('backend.project.edit', compact('invoices','project_statuses','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'invoice' => 'nullable|exists:invoices,id',
            'project_status' => 'nullable|exists:project_statuses,id',
            'name' => 'nullable',
            'project_id' => 'nullable',
            'description' => 'nullable',
            'agreement' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $project = $project;

        $project->invoice_id    =   $request->invoice;
        $project->status_id    =   $request->project_status;
        $project->name    =   $request->name;

        $project->project_id    =   $request->project_id;
        $project->description    =   $request->description;
        $project->agreement    =   $request->agreement;

        if($request->hasFile('image')){
            if ($project->image != null)
                File::delete(public_path($project->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/project/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $project->image   = $folder_path . $image_new_name;
        }

        $project->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try {
            if ($project->image != null)
                File::delete(public_path($project->image)); //Old image delete
            $project->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }
}
