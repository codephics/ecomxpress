<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;

use App\Models\Ecommerce\Ecommerce;
use App\Models\Ecommerce\EcommerceSeller;
use App\Models\Ecommerce\EcommerceCategory;
use App\Models\Ecommerce\EcommerceSubcategory;
use App\Models\Ecommerce\EcommerceSubSubcategory;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;

class EcommerceSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.ecommerce.seller.new-seller');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'slug' => ['required', 'regex:/^[a-z]+$/'],
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ], [
        //     'slug.regex' => 'The :attribute field must contain only lowercase letters.'
        // ]);

        $seller = EcommerceSeller::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'gender' => $request->gender,
            'bio' => $request->bio,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'description' => $request->description,
            'youtube_iframe' => $request->youtube_iframe,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ]);

        $seller->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('ecommerce/seller/image'), $image);
            $seller->image = $image;
        }

        if ($request->hasFile('og_image')) {
            $oGImage = $request->file('og_image')->getClientOriginalName();
            $request->file('og_image')->move(public_path('ecommerce/seller/image/og'), $oGImage);
            $seller->og_image = $oGImage;
        }

        if ($request->hasFile('cover')) {
            $coverImage = $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('ecommerce/seller/image/cover'), $coverImage);
            $seller->cover = $coverImage;
        }

        if ($request->hasFile('image') || $request->hasFile('og_image') || $request->hasFile('cover')) {
            $seller->save();
        }

        Session::flash('message', __('New Seller Successfully Added!'));
        
        return redirect(RouteServiceProvider::Seller);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $sellerDetail)
    {
        $sellers = EcommerceSeller::all();

        return view('backend.ecommerce.seller.manage-sellers', ['sellers' => $sellers]);
    }

    /**
     * Display the specified resource.
     */
    public function detail($slug)
    {
        $sellers = EcommerceSeller::where('slug', $slug)->firstOrFail();

        return view('frontend.ecommerce.item-detail', ['sellers' => $sellers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seller = EcommerceSeller::findOrFail($id);

        return view('backend.ecommerce.seller.edit-seller', ['seller' => $seller]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Retrieve the existing record from the database
        $seller = EcommerceSeller::find($id);

        // Make sure the record exists
        if ($seller) {
            // Validate and process the new image
            $newImage = $request->file('image');

            if ($newImage) {
                // Validate the new image file
                $validatedData = $request->validate([
                    // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                // Process the new image file (e.g., move to a specific directory, assign a new filename)
                $newImageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('ecommerce/seller/image'), $newImageName);

                // Update the image data in the model
                $seller->image = $newImageName;
            }

            // Validate and process the new image
            $newOGImage = $request->file('og_image');

            if ($newOGImage) {
                // Validate the new OG Image OG Image
                $validatedData = $request->validate([
                    // 'og_image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                // Process the new OG Image OG Image (e.g., move to a specific directory, assign a new filename)
                $oGImage = $request->og_image->getClientOriginalName();
                $request->og_image->move(public_path('ecommerce/seller/image/og'), $oGImage);

                // Update the OG Image data in the model
                $seller->og_image = $oGImage;
            }

            // Validate and process the new image
            $newCover = $request->file('cover');

            if ($newCover) {
                // Validate the new OG Image OG Image
                $validatedData = $request->validate([
                    // 'cover' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                // Process the new OG Image OG Image (e.g., move to a specific directory, assign a new filename)
                $coverImage = $request->cover->getClientOriginalName();
                $request->cover->move(public_path('ecommerce/seller/image/cover'), $coverImage);

                // Update the OG Image data in the model
                $seller->cover = $coverImage;
            }

            // Update other fields of the request
            $seller->name = $request->input('name');
            $seller->slug = $request->input('slug');
            $seller->gender = $request->input('gender');
            $seller->bio = $request->input('bio');
            $seller->mobile = $request->input('mobile');
            $seller->email = $request->input('email');
            $seller->address = $request->input('address');
            $seller->description = $request->input('description');
            $seller->youtube_iframe = $request->input('youtube_iframe');
            $seller->meta_title = $request->input('meta_title');
            $seller->meta_description = $request->input('meta_description');

            // dd($request);

            if (!is_null($request->input('status'))) {
                $seller->status = $request->input('status');
            }

            // Save the changes
            $seller->save();

            // Perform any additional actions or redirect as needed
        } else {
            // Handle the case when the record doesn't exist
            Session::flash('update', __('The record does not exist!'));
        }

        Session::flash('update', __('Seller Successfully Updated!'));
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        EcommerceSeller::where('id',$id)->delete();

        Session::flash('delete', __('Successfully Deleted!'));
        
        return back();
    }
}
