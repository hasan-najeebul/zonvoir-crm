<?php

namespace App\Services;
use App\Models\Lead;
use App\Models\Tag;


/**
 * Class LeadService.
 */
class LeadService
{
    public static function index()
    {
        $leads = Lead::get();
        return $leads;
    }
    // public static function store(array $data)
    // {
    //     dd($data);
    //     $lead = Lead::create($data);
    //     return $lead;
    // }
    public static function store(array $data)
    {
        // Extract tags from the data
        $tagNames = $data['tags'];
        unset($data['tags']); // Remove 'tags' from the data array

        // Store the lead
        $lead = Lead::create($data);

        // Attach tags to the lead manually
        foreach ($tagNames as $order => $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $lead->tags()->attach($tag->id, ['tag_order' => $order + 1]);
        }

        return $lead;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Lead::where($columnName, $columnValue)->first();
    }

    public static function update($id, array $data)
    {
        $lead = self::getByColumn('id', $id);

        // Extract tags from the data
        $tagNames = $data['tags'];
        unset($data['tags']); // Remove 'tags' from the data array

        $lead->update($data);

        // Sync tags for the lead
        $lead->tags()->detach(); // Remove existing tags
        foreach ($tagNames as $order => $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $lead->tags()->attach($tag->id, ['tag_order' => $order + 1]);
        }

        return $lead;
    }

    public static function getAll()
    {
        return Lead::get();
    }
    public static function getCustomerRelatedData()
    {
        $data['languages']     = LanguageService::getAll();
        $data['countries']     = CountryService::getAll();
        return $data;
    }
}
