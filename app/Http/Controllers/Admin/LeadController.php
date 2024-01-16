<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\LeadRequest;
use App\Services\LeadService;

class LeadController extends Controller
{

    public function index()
    {
        $title = __('app.lead.leads');
        $leads = LeadService::index();
        $data = LeadService::getCustomerRelatedData();
        $countryMap = collect($data['countries'])->pluck('name', 'id');
        $languages = collect($data['languages'])->pluck('name', 'id');
        return view('admin.leads.index', compact('title', 'leads', 'countryMap','languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Lead';
        $data = LeadService::getCustomerRelatedData();
        $existingTags = Tag::pluck('name')->toArray();
        return view('admin.leads.create',compact('title','data', 'existingTags'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            LeadService::store($data);
            return response([
                'success'       => true,
                'message'       => 'Lead has been created successfully.',
                'redirect_url'  => route('admin.leads.index')
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
        $title  = 'Edit Language';
        $lead = LeadService::getByColumn('id', $id);
        $data   = LeadService::getCustomerRelatedData();
        $allTags = Tag::pluck('name')->toArray();

        // Get selected tags for the current lead
        $selectedTags = $lead->selectedTags();

        return view('admin.leads.edit', compact('title', 'lead', 'data', 'allTags', 'selectedTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeadRequest $request, string $id)
    {
        if($request->ajax())
        {
            LeadService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => 'Lead has been updated successfully.',
                'redirect_url'  => route('admin.leads.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $lead = LeadService::getByColumn('id', $id);
            $lead->delete();
            return response()->json([
                'success' => true,
                'message' => 'Lead has been deleted successfully.',
            ]);
        }
    }
}
