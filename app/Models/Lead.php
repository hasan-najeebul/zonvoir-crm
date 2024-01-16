<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'hash',
        'name',
        'title',
        'company',
        'description',
        'country',
        'zip',
        'city',
        'state',
        'address',
        'assigned',
        'dateadded',
        'from_form_id',
        'status',
        'source',
        'dateassigned',
        'last_status_change',
        'addedfrom',
        'email',
        'website',
        'leadorder',
        'phonenumber',
        'date_converted',
        'lost',
        'junk',
        'last_lead_status',
        'is_imported_from_email_integration',
        'email_integration_uid',
        'is_public',
        'default_language',
        'client_id',
        'lead_value',
    ];

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
}
