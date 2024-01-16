<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Tag;
use App\Services\CustomerService;
use App\Services\ProjectService;
use App\Services\UserService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('app.project.projects');
        $projects = ProjectService::index();
        return view('admin.projects.index' ,compact('title','projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('app.project.addProject');
        $customers = CustomerService::index();
        $members = UserService::index();
        $existingTags = Tag::pluck('name')->toArray();
        return view('admin.projects.create' ,compact('title', 'existingTags','customers','members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            ProjectService::store($data);
            return response([
                'success'       => true,
                'message'       => __('messages.project.saveSuccess'),
                'redirect_url'  => route('admin.projects.index')
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = __('app.project.editProject');
        $project = ProjectService::getByColumn('id', $id);
        $customers = CustomerService::index();
        $members = UserService::index();
        $allTags = Tag::pluck('name')->toArray();
        // Get selected tags for the current project
        $selectedTags = $project->selectedTags();

        return view('admin.projects.edit', compact('title', 'project', 'customers','members', 'allTags', 'selectedTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        if($request->ajax())
        {
            ProjectService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => __('messages.project.updateSuccess'),
                'redirect_url'  => route('admin.projects.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        if($request->ajax()){
            ProjectService::delete($id);
            return response()->json([
                'success' => true,
                'message' => __('messages.project.deleteSuccess'),
            ]);

        }
    }
}
