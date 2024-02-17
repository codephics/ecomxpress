<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;

use App\Models\Global\Slider;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;

class SliderController extends Controller
{
    public function index()
    {
        return back();
    }

    public function create(Request $request)
    {
        return view('backend.global.slider.new-slider');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'email',
        ]);

        $slider = Slider::create([
            'heading' => $request->heading,
            'subheading' => $request->subheading,
            'detail' => $request->detail,
            'image_alt_text' => $request->image_alt_text,
            'button_text_1' => $request->button_text_1,
            'button_text_2' => $request->button_text_2,
            'button_link_1' => $request->button_link_1,
            'button_link_2' => $request->button_link_2,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $slider->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('global/slider/image'), $image);
            $slider->image = $image;
        }

        if ($request->hasFile('image')) {
            $slider->save();
        }

        Session::flash('success', __('Your thoughts have been successfully transmitted. You will hear from us within 3-5 business days.'));
        
        return redirect(RouteServiceProvider::ManageSliders);
    }

    public function show(Request $request)
    {            
        $sliders = Slider::all();
        
        return view('backend.global.slider.manage-sliders', ['sliders' => $sliders]);
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        
        return view('backend.global.slider.edit-slider', ['slider' => $slider]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $slider = Slider::find($id);

        if ($slider) {

            $newImage = $request->file('image');

            if ($newImage) {
                $validatedData = $request->validate([
                    // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newImageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('global/slider/image'), $newImageName);

                $slider->image = $newImageName;
            }

            $slider->heading = $request->input('heading');
            $slider->subheading = $request->input('subheading');
            $slider->detail = $request->input('detail');
            $slider->image_alt_text = $request->input('image_alt_text');
            $slider->button_text_1 = $request->input('button_text_1');
            $slider->button_text_2 = $request->input('button_text_2');
            $slider->button_link_1 = $request->input('button_link_1');
            $slider->button_link_2 = $request->input('button_link_2');

            if (!is_null($request->input('status'))) {
                $slider->status = $request->input('status');
            }
            
            $slider->comment = $request->input('comment');

            $slider->save();

        } else {

            Session::flash('update', __('An issue has arisen! Please return and update once more.'));

            return back();
        }

        Session::flash('update', __('Congratulations! The slider update operation has been executed successfully.'));
        
        return back();
    }

    public function destroy(Request $request, $id)
    {
        Slider::where('id',$id)->delete();

        Session::flash('delete', __('Congratulations! The slider deletion operation has been successfully executed.'));
        
        return back();
    }
}
