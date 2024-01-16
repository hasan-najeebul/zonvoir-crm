<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contact extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['profile_image','customer_id','first_name','last_name','position_in_company','email',
    'contact_number','primary_contact','password','invoice_emails','estimate_emails','credit_note_emails',
    'support_ticket_emails','project_emails','contract_emails','task_emails','proposal_emails' ];

    protected $hidden = ['password'];
    protected $guard = 'contact';
    protected $casts = [
        'password' => 'hashed'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
