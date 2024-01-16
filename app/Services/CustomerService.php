<?php

namespace App\Services;
use App\Models\Customer;

/**
 * Class CustomerService.
 */
class CustomerService
{
    public static function index()
    {
        $customers = Customer::get();
        return $customers;
    }

    public static function getCustomerRelatedData()
    {
        $data['sources']       = SourceService::getAll();
        $data['companyTypes']  = CompanyTypeService::getAll();
        $data['categories']    = CategoryService::getAll();
        $data['currencies']    = CurrencyService::getAll();
        $data['languages']     = LanguageService::getAll();
        $data['countries']     = CountryService::getAll();
        return $data;
    }

    public static function store(array $data)
    {
        $customer = Customer::create($data);
        if(isset($data['language_ids']) && !empty($data['language_ids']))
        {
            $customer->languages()->attach($data['language_ids']);
        }

        return $customer;
    }

    public static function update($id, array $data)
    {
        $customer = self::getByColumn('id', $id);
        $customer->update($data);

        if(isset($data['language_ids']) && !empty($data['language_ids']))
        {
            $customer->languages()->sync($data['language_ids']);
        }
        return $customer;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Customer::where($columnName, $columnValue)->first();
    }

}
