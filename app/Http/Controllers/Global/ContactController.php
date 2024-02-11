<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;

use App\Models\Global\Contact;
use App\Models\Global\Page;
use App\Models\Global\Setting;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'contact-us')->firstOrFail();
        $setting = Setting::first();

        return view('frontend.global.contact-us', [
            'page' => $page,
            'setting' => $setting
        ]);
    }

    public function newContact(Request $request)
    {
        $request->validate([
            'email' => 'email',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ]);

        $contact->save();

        Session::flash('success', __('Your thoughts have been successfully transmitted. You will hear from us within 3-5 business days.'));
        
        return redirect()->back();
    }

    public function create(Request $request)
    {
        return view('backend.global.contact.new-contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'email',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ]);

        $contact->save();

        Session::flash('success', __('Your thoughts have been successfully transmitted. You will hear from us within 3-5 business days.'));
        
        return redirect(RouteServiceProvider::ManageContacts);
    }

    public function show(Request $request)
    {            
        $contacts = Contact::all();
        
        return view('backend.global.contact.manage-contacts', ['contacts' => $contacts]);
    }

    public function view($id)
    {
        $contact = Contact::findOrFail($id);
        
        return view('backend.global.contact.view-contact', ['contact' => $contact]);
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        
        return view('backend.global.contact.edit-contact', ['contact' => $contact]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $contact = Contact::find($id);

        if ($contact) {

            $contact->name = $request->input('name');
            $contact->email = $request->input('email');            
            $contact->description = $request->input('description');

            $contact->save();

        } else {
            // Handle the case when the record doesn't exist
            Session::flash('update', __('An issue has arisen! Please return and update once more.'));

            return back();
        }

        Session::flash('update', __('Congratulations! The contact update operation has been executed successfully.'));
        
        return back();
    }

    public function destroy(Request $request, $id)
    {
        Contact::where('id',$id)->delete();

        Session::flash('delete', __('Congratulations! The contact deletion operation has been successfully executed.'));
        
        return back();
    }
}
