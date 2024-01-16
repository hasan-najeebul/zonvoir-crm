<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['project_name','project_description','status','customer_id','billing_type','start_date','deadline','project_created','date_finished','progress','progress_from_tasks',
                            'project_cost','project_rate_per_hour','estimated_hours','added_by' ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'rel', 'taggables', 'rel_id', 'tag_id')
            ->withPivot('tag_order')
            ->withTimestamps();
    }

    public function selectedTags()
    {
        return $this->tags->pluck('name')->toArray();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_members');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
