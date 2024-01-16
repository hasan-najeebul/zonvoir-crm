<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Services\SettingsService;
use App\Services\LanguageService;
use Illuminate\Support\Facades\Route;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allowedNames = ['company_logo','company_dark_logo','favicon', 'apptitle', 'allowed_file_types'];
        $generalSettingInfo = Option::whereIn('name', $allowedNames)->get();
        $generalInfo = [];
        foreach ($generalSettingInfo as $info) {
            $generalInfo[$info['name']] = $info['value'];
        }
        return view('admin.settings.general', compact('generalInfo'));
    }

    public function companyInfoindex(Request $request)
    {
        $allowedNames = ['company_name','company_address','city', 'state', 'country', 'zip_code', 'contact_no', 'vat_no','gst_no','tan_no'];
        $companySettingInfo = Option::whereIn('name', $allowedNames)->get();
        $companyInfo = [];
        foreach ($companySettingInfo as $info) {
            $companyInfo[$info['name']] = $info['value'];
        }
        return view('admin.settings.company_info', compact('companyInfo'));
    }

    public function localizationindex(Request $request)
    {
        $allowedNames = ['date_format', 'time_zone', 'time_format', 'default_language', 'table_pagination_limit', 'kanban_pagination_limit'];

        $localizationInfo = Option::whereIn('name', $allowedNames)->get();

        $localInfo = [];

        foreach ($localizationInfo as $info) {
            $localInfo[$info['name']] = $info['value'];
        }
        $languages = LanguageService::index();

        return view('admin.settings.localization', compact('languages', 'localInfo'));
    }



    public function emailSettingindex(Request $request)
    {
        $allowedNames = ['mail_engine','email_protocol','smtp_host', 'mailer', 'smtp_port', 'smtp_username', 'smtp_password', 'email','email_charset','bcc_all_emails_to','email_signature','predefined_header','predefined_footer','mail_email','mail_email_charset','mail_bcc_all_emails_to','mail_email_signature','mail_predefined_header','mail_predefined_footer'];
        $emailSettingInfo = Option::whereIn('name', $allowedNames)->get();
        $emailInfo = [];
        foreach ($emailSettingInfo as $info) {
            $emailInfo[$info['name']] = $info['value'];
        }
        return view('admin.settings.emailSetting', compact('emailInfo'));
    }

    public function currencySettingindex(Request $request)
    {
        $allowedNames = ['decimal_separator','thousands_separator','show_tax_per_item', 'default_tax', 'smtp_port'];
        $currencySettingInfo = Option::whereIn('name', $allowedNames)->get();
        $currencyInfo = [];
        foreach ($currencySettingInfo as $info) {
            $currencyInfo[$info['name']] = $info['value'];
        }
        return view('admin.settings.currencySetting', compact('currencyInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveOrUpdate(Request $request)
    {
        $uri = $request->segment(3);
        $formData = $request->except('_token');
        $savedData = SettingsService::saveOrUpdate($formData);

        return response([
            'success'       => true,
            'message'       => 'Data saved successfully',
            'data'          => $savedData,
            'redirect_url'  => route("admin.settings.$uri")

        ]);

    }


}
