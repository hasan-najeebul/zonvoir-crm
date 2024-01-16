<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactLoginRequest;
use App\Services\ContactService;
use Illuminate\Support\Facades\Auth;
class ContactLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:contact')->only(['shoLoginForm','login']);
    }

    public function shoLoginForm()
    {
        return view('auth.contact-login');
    }

    public function login(ContactLoginRequest $request)
    {
        if (Auth::guard('contact')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('contact-dashboard');

        }else{
            // Authentication failed
            return back()->withErrors(['email' => __(('auth.failed'))]);
        }
    }

    public function dashboard()
    {
        $id = Auth::guard('contact')->id();
        $contact = ContactService::getContact($id);
        return view('contact.dashboard', compact('contact'));
    }

    public function logout(){
        Auth::guard('contact')->logout();
        return redirect()->route('contact-login');
    }

    protected function guard(){
        return Auth::guard('contact');
    }
}
