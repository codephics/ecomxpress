<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;

use App\Models\Global\Setting;
use App\Models\Ecommerce\EcommerceLead;

use App\Providers\RouteServiceProvider;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Session;

class EcommerceLeadController extends Controller
{
    public function index()
    {
        return back();
    }

    public function create()
    {
        return view('backend.ecommerce.lead.new-lead');
    }

    public function storeFront(Request $request): RedirectResponse
    {
        $lead = EcommerceLead::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'note' => $request->note,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $lead->save();

        Session::flash('success', __('Your Order Placed Successfully!'));
        
        return view('frontend.ecommerce.lead.view-invoice');
    }

    public function invoice($id)
    {
        $setting = Setting::first();
        $lead = EcommerceLead::findOrFail($id);
        
        return view('backend.ecommerce.lead.view-lead', [
            'setting' => $setting,
            'lead' => $lead
        ]);
    }

    public function storeBack(Request $request): RedirectResponse
    {
        $lead = EcommerceLead::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'note' => $request->note,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $lead->save();

        Session::flash('message', __('Your Order Placed Successfully!'));
        
        return redirect(RouteServiceProvider::EcommerceLead);
    }

    public function show(Request $leadDetail)
    {
        $leads = EcommerceLead::all();

        return view('backend.ecommerce.lead.manage-lead', ['leads' => $leads]);
    }

    public function edit($id)
    {
        $lead = EcommerceLead::findOrFail($id);

        return view('backend.ecommerce.lead.edit-lead', ['lead' => $lead]);
    }

    public function view($id)
    {
        $setting = Setting::first();
        $lead = EcommerceLead::findOrFail($id);
        
        return view('backend.ecommerce.lead.view-lead', [
            'setting' => $setting,
            'lead' => $lead
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $lead = EcommerceLead::find($id);

        if ($lead) {

            $lead->name = $request->input('name');
            $lead->email = $request->input('email');
            $lead->mobile = $request->input('mobile');
            $lead->address = $request->input('address');
            $lead->note = $request->input('note');

            if (!is_null($request->input('status'))) {
                $lead->status = $request->input('status');
            }
        
            $lead->comment = $request->input('comment');

            $lead->save();

        } else {
            return back();
        }

        Session::flash('update', __('Lead Successfully Updated!'));
        
        return back();
    }

    public function destroy($id)
    {
        EcommerceLead::where('id',$id)->delete();

        Session::flash('delete', __('Lead Successfully Deleted!'));
        
        return back();
    }
}
