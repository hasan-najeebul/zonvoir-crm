<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Services\SkillService;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:skills-list|skills-create|skills-edit|skills-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:skills-create', ['only' => ['create','store']]);
         $this->middleware('permission:skills-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:skills-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Skills';
        $skills = SkillService::index();
        return view('admin.skills.index', compact('title', 'skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Skill';
        return view('admin.skills.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            SkillService::store($data);
            return response([
                'success'       => true,
                'message'       => 'Skill has been created successfully.',
                'redirect_url'  => route('admin.skills.index')
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
    public function edit(Request $request, $id)
    {
        $title  = 'Edit Skill';
        $skill = SKillService::getByColumn('id', $id);
        return view('admin.skills.edit',compact('title', 'skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SKillRequest $request, string $id)
    {
        if($request->ajax())
        {
            SkillService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => 'Skill has been updated successfully.',
                'redirect_url'  => route('admin.skills.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $skill = SkillService::getByColumn('id', $id);
            $skill->delete();
            return response()->json([
                'success' => true,
                'message' => 'Skill has been deleted successfully.',
            ]);
        }
    }
}
