<?php

namespace App\Services;

use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SettingsService
{
    public static function saveOrUpdate(array $formData)
    {
        // Define an array of file upload field names
        $fileUploadFields = ['company_logo', 'favicon', 'company_dark_logo'];

        foreach ($formData as $name => $value) {
            // Check if the input is a file and if the $name is in the array of file upload fields
            if (in_array($name, $fileUploadFields) && $value instanceof \Illuminate\Http\UploadedFile) {
                // Generate a random name for the file
                $randomName = Str::random(10); // Adjust the length as needed

                // Get the file extension
                $extension = $value->getClientOriginalExtension();

                // Combine the random name and extension
                $randomFileName = $randomName . '.' . $extension;

                // Move the file to the destination folder with the random name using the File facade
                File::move($value->getPathname(), public_path('images/logo') . '/' . $randomFileName);

                // Save the random file name with extension in the database
                Option::updateOrCreate(['name' => $name], ['value' => $randomFileName]);
                // Add the saved file data to the $savedData array
                $savedData[$name] = $randomFileName;
            } else {
                // For non-file data, save directly to the database
                Option::updateOrCreate(['name' => $name], ['value' => $value]);
                // Add the saved non-file data to the $savedData array
                $savedData[$name] = $value;
            }
        }
        return $savedData;

        // Additional logic if needed
    }

}

