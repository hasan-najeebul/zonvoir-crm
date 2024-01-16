<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'company_information', 'customer_type', 'company_name', 'vat_number', 'gst_number', 'official_contact_no',
        'email', 'website', 'source_id', 'company_type_id','category_id', 'currency_id', 'country_id','address',
        'state','city', 'zipcode','billing_address','billing_city','billing_state','billing_zip','billing_country',
        'shipping_address','shipping_city','shipping_state','shipping_zip','shipping_country',
    ];

    public function languages(){
        return $this->belongsToMany(Language::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }
}
