<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;

use App\Models\Global\Subscriber;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;

class SubscriberController extends Controller
{
    public function index()
    {
        return back();
    }

    public function create(Request $request)
    {
        return view('administration.ecommerce.subscription.new-subscription');
    }

    public function subscriber(Request $request): RedirectResponse
    {
        // dd($request);

        try {
            // Validate the request
            $request->validate([
                'email' => 'nullable|email|unique:template_subscriptions,email',
            ]);

            if (!$request->has('email')) {
                // The email input is null, do not show required message
                return back();
            }

            // Create a new subscription
            $subscription = Subscriber::create([
                'email' => $request->email,
            ]);

            $subscription->save();

            // Send a confirmation email to the subscriber (optional)

            // Redirect back with a success message
            return back()->with('success', 'You have been subscribed!');
        } catch (ValidationException $e) {
            // Handle the case when the email is already taken
            if ($e->errorBag['email'][0] == 'The email has already been taken.') {
                return back();
            }
            // Handle other validation exceptions if needed
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return back()->with('error', 'An error occurred (We think, the email has already been taken.). Please try again.');
        }
    }

    public function store(Request $request): RedirectResponse
    {
        // dd($request);

        try {
            // Validate the request
            $request->validate([
                'email' => 'nullable|email|unique:ecommerce_subscriptions,email',
            ]);

            if (!$request->has('email')) {
                // The email input is null, do not show required message
                return redirect(RouteServiceProvider::Subscriber);
            }

            // Create a new subscription
            $subscription = Subscriber::create([
                'email' => $request->email,
            ]);

            $subscription->save();

            // Send a confirmation email to the subscriber (optional)

            // Redirect back with a success message
            return redirect(RouteServiceProvider::Subscriber)->with('success', 'You have been subscribed!');
        } catch (ValidationException $e) {
            // Handle the case when the email is already taken
            if ($e->errorBag['email'][0] == 'The email has already been taken.') {
                return redirect(RouteServiceProvider::Subscriber);
            }
            // Handle other validation exceptions if needed
            return redirect(RouteServiceProvider::Subscriber)->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect(RouteServiceProvider::Subscriber)->with('error', 'An error occurred. Please try again.');
        }
    }

    public function show(Request $request)
    {            
        $subscriptions = Subscriber::all();
        
        return view('administration.ecommerce.subscription.manage-subscriptions', ['subscriptions' => $subscriptions]);
    }

    public function edit($id)
    {
        $subscription = Subscriber::findOrFail($id);
        
        return view('administration.ecommerce.subscription.edit-subscription', ['subscription' => $subscription]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $subscription = Subscriber::find($id);

        if ($subscription) {

            $subscription->email = $request->input('email');

            $subscription->save();

        } else {
            // Handle the case when the record doesn't exist
            Session::flash('update', __('An issue has arisen! Please return and update once more.'));

            return back();
        }

        Session::flash('update', __('Congratulations! The subscription update operation has been executed successfully.'));
        
        return redirect(RouteServiceProvider::Subscriber);
    }

    public function destroy(Request $request, $id)
    {
        Subscriber::where('id',$id)->delete();

        Session::flash('delete', __('Congratulations! The contact deletion operation has been successfully executed.'));
        
        return back();
    }
}
