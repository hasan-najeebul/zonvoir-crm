<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProjectService.
 */
class ProjectService
{
    public static function index()
    {
        $projects = Project::get();
        return $projects;
    }

    public static function store(array $data)
    {
        $tagNames = isset($data['tags']) ? $data['tags'] : [];
        $members = isset($data['members']) ? $data['members'] : [];
        if (isset($data['progress_from_tasks'])) {
            $data['progress_from_tasks'] = 1;
        }else{
            $data['progress_from_tasks'] = 0;
        }
        $data['added_by'] = Auth::user()->id;
        $data['project_created'] = date('Y-m-d');

        // Store the project
        $project = Project::create($data);
        // Attach tags to the project manually
        $project_id = $project->id;
        if ($project_id && isset($data['members']) || $project_id && isset($data['tags'])) {
            foreach ($members as $member) {
                ProjectMember::create([
                    'project_id' => $project_id,
                    'user_id'    => $member,
                ]);
            }
            foreach ($tagNames as $key => $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $project->tags()->attach($tag->id, ['tag_order' => $key + 1]);
            }
            return $project;
        }
    }

    public static function delete($id)
    {
        $project = self::getByColumn('id', $id);
        $project->delete();
        return $project;
    }

    public static function update($id, array $data)
    {
        $project = self::getByColumn('id', $id);
        $tagNames = isset($data['tags']) ? $data['tags'] : [];
        $members = isset($data['members']) ? $data['members'] : [];
        $data['progress_from_tasks'] = isset($data['progress_from_tasks']) ? 1 : 0;
        $project->update($data);
        $project_members = self::getProjectMembers($id);
        $existing_members = array_column($project_members, 'user_id');
        // Delete members that are not in the updated list
        ProjectMember::where('project_id', $id)
            ->whereNotIn('user_id', $members)
            ->delete();
        // Insert new members or skip if already exists
        foreach ($members as $member) {
            if (!in_array($member, $existing_members)) {
                ProjectMember::create([
                    'project_id' => $id,
                    'user_id'    => $member,
                ]);
            }
        }
        // Sync tags for the project
        $project->tags()->detach(); // Remove existing tags
        foreach ($tagNames as $order => $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $project->tags()->attach($tag->id, ['tag_order' => $order + 1]);
        }

        return $project;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Project::where($columnName, $columnValue)->first();
    }

    public static function getProjectMembers($id)
    {
        return ProjectMember::where('project_id', $id)->get()->toArray();
    }

}
