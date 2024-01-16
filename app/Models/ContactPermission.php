<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPermission extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['permission_id', 'contact_id'];

}
