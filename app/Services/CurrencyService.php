<?php

namespace App\Services;
use App\Models\Currency;
/**
 * Class CurrencyService.
 */
class CurrencyService
{
    public static function getAll()
    {
        return Currency::get();
    }

    public static function store(array $data)
    {
        $currency = Currency::create($data);
        return $currency;
    }

    public static function update($id, array $data)
    {
        $currency = self::getByColumn('id', $id);
        $currency->update($data);
        return $currency;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Currency::where($columnName, $columnValue)->first();
    }


}
