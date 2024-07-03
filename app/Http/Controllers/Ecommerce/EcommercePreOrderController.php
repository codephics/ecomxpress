<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;

use App\Models\Global\Setting;
use App\Models\Ecommerce\EcommercePreOrder;

use App\Providers\RouteServiceProvider;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Session;

class EcommercePreOrderController extends Controller
{
    public function index()
    {
        return back();
    }

    public function create()
    {
        return view('backend.ecommerce.pre-order.new');
    }

    public function confirm(Request $request): RedirectResponse
    {
        $preOrder = EcommercePreOrder::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->aaddressddress,
            'quantity' => $request->quantity,
            'shipping_method' => $request->shipping_method,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'sub_total' => $request->sub_total,
            'delivery_charge' => $request->delivery_charge,
            'total' => $request->total,
            'order_note' => $request->order_note,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $preOrder->save();

        Session::flash('success', __('Your Order Placed Successfully!'));
        
        return view('frontend.ecommerce.pre-order.view');
    }

    public function invoice($id)
    {
        $setting = Setting::first();
        $preOrder = EcommercePreOrder::findOrFail($id);
        
        return view('backend.ecommerce.pre-order.view', [
            'setting' => $setting,
            'lead' => $preOrder
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $preOrder = EcommercePreOrder::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->aaddressddress,
            'quantity' => $request->quantity,
            'shipping_method' => $request->shipping_method,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'sub_total' => $request->sub_total,
            'delivery_charge' => $request->delivery_charge,
            'total' => $request->total,
            'order_note' => $request->order_note,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $preOrder->save();

        Session::flash('message', __('Your Order Placed Successfully!'));
        
        return redirect(RouteServiceProvider::EcommercePreOrder);
    }

    public function show(Request $preOrderDetail)
    {
        $preOrders = EcommercePreOrder::all();

        return view('backend.ecommerce.pre-order.manage', ['preOrders' => $preOrders]);
    }

    public function edit($id)
    {
        $preOrder = EcommercePreOrder::findOrFail($id);

        return view('backend.ecommerce.pre-order.edit', ['lead' => $preOrder]);
    }

    public function view($id)
    {
        $setting = Setting::first();
        $preOrder = EcommercePreOrder::findOrFail($id);
        
        return view('backend.ecommerce.pre-order.view', [
            'setting' => $setting,
            'lead' => $preOrder
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $preOrder = EcommercePreOrder::find($id);

        if ($preOrder) {
            $preOrder->name = $request->input('name');
            $preOrder->email = $request->input('email');
            $preOrder->mobile = $request->input('mobile');
            $preOrder->address = $request->input('address');
            $preOrder->quantity = $request->input('quantity');
            $preOrder->shipping_method = $request->input('shipping_method');
            $preOrder->product_name = $request->input('product_name');
            $preOrder->product_price = $request->input('product_price');
            $preOrder->sub_total = $request->input('sub_total');
            $preOrder->delivery_charge = $request->input('delivery_charge');
            $preOrder->total = $request->input('total');
            $preOrder->order_note = $request->input('order_note');

            if (!is_null($request->input('status'))) {
                $preOrder->status = $request->input('status');
            }
        
            $preOrder->comment = $request->input('comment');

            $preOrder->save();

        } else {
            return back();
        }

        Session::flash('update', __('Pre-Order Successfully Updated!'));
        
        return back();
    }

    public function destroy($id)
    {
        EcommercePreOrder::where('id',$id)->delete();

        Session::flash('delete', __('Pre-Order Successfully Deleted!'));
        
        return back();
    }
}
