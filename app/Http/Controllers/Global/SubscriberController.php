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
        return view('backend.global.subscriber.new-subscriber');
    }

    public function subscriber(Request $request): RedirectResponse
    {
        try {
            // Validate the request
            $request->validate([
                'email' => 'nullable|email|unique:subscribers,email',
            ]);

            if (!$request->has('email')) {

                return back();
            }

            $subscriber = Subscriber::create([
                'email' => $request->email,
            ]);

            $subscriber->save();

            return back()->with('success', 'You have been subscribed!');

        } catch (ValidationException $e) {

            if ($e->errorBag['email'][0] == 'The email has already been taken.') {
                return back();
            }

            return back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {

            return back()->with('error', 'An error occurred (We think, the email has already been taken.). Please try again.');
        }
    }

    public function store(Request $request): RedirectResponse
    {
        try {

            $request->validate([
                'email' => 'nullable|email|unique:subscribers,email',
            ]);

            if (!$request->has('email')) {

                return redirect(RouteServiceProvider::ManageSubscribers);
            }

            $subscriber = Subscriber::create([
                'email' => $request->email,
            ]);

            $subscriber->save();

            return redirect(RouteServiceProvider::ManageSubscribers)->with('success', 'You have been subscribed!');

        } catch (ValidationException $e) {

            if ($e->errorBag['email'][0] == 'The email has already been taken.') {
                return redirect(RouteServiceProvider::ManageSubscribers);
            }

            return redirect(RouteServiceProvider::ManageSubscribers)->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {

            return redirect(RouteServiceProvider::ManageSubscribers)->with('error', 'An error occurred. Please try again.');
        }
    }

    public function show(Request $request)
    {            
        $subscribers = Subscriber::all();
        
        return view('backend.global.subscriber.manage-subscribers', ['subscribers' => $subscribers]);
    }

    public function edit($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        
        return view('backend.global.subscriber.edit-subscriber', ['subscriber' => $subscriber]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $subscriber = Subscriber::find($id);

        if ($subscriber) {

            $subscriber->email = $request->input('email');

            $subscriber->save();

        } else {

            Session::flash('update', __('An issue has arisen! Please return and update once more.'));

            return back();
        }

        Session::flash('update', __('Congratulations! The subscriber update operation has been executed successfully.'));
        
        return redirect(RouteServiceProvider::ManageSubscribers);
    }

    public function destroy(Request $request, $id)
    {
        Subscriber::where('id',$id)->delete();

        Session::flash('delete', __('Congratulations! The contact deletion operation has been successfully executed.'));
        
        return back();
    }
}
