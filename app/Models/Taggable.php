<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    use HasFactory;
    protected $fillable = ['rel_id','rel_type','tag_id','tag_order'];


}
