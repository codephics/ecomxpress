<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;

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
    public function index()
    {
        return back();
    }

    public function create()
    {
        return view('backend.ecommerce.seller.new-seller');
    }

    public function store(Request $request): RedirectResponse
    {
        $seller = EcommerceSeller::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'gender' => $request->gender,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'bio' => $request->bio,
            'address' => $request->address,
            'youtube_iframe' => $request->youtube_iframe,
            'header_content' => $request->header_content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'facebook_meta_title' => $request->facebook_meta_title,
            'facebook_meta_description' => $request->facebook_meta_description,
            'twitter_meta_title' => $request->twitter_meta_title,
            'twitter_meta_description' => $request->twitter_meta_description,
            'icon_alt_text' => $request->icon_alt_text,
            'thumb_alt_text' => $request->thumb_alt_text,
            'cover_alt_text' => $request->cover_alt_text,
            'og_img_alt_text' => $request->og_img_alt_text,
            'is_index' => $request->is_index,
            'is_follow' => $request->is_follow,
            'is_featured' => $request->is_featured,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $seller->save();

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('ecommerce/seller/image/icon'), $icon);
            $seller->icon = $icon;
        }

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb')->getClientOriginalName();
            $request->file('thumb')->move(public_path('ecommerce/seller/image/thumb'), $thumb);
            $seller->thumb = $thumb;
        }

        if ($request->hasFile('cover')) {
            $coverImage = $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('ecommerce/seller/image/cover'), $coverImage);
            $seller->cover = $coverImage;
        }

        if ($request->hasFile('og_image')) {
            $oGImage = $request->file('og_image')->getClientOriginalName();
            $request->file('og_image')->move(public_path('ecommerce/seller/image/og'), $oGImage);
            $seller->og_image = $oGImage;
        }

        if ($request->hasFile('icon') || $request->hasFile('thumb') || $request->hasFile('cover') || $request->hasFile('og_image')) {
            $seller->save();
        }

        Session::flash('message', __('New Seller Successfully Added!'));
        
        return redirect(RouteServiceProvider::EcommerceSeller);
    }

    public function show(Request $sellerDetail)
    {
        $sellers = EcommerceSeller::all();

        return view('backend.ecommerce.seller.manage-sellers', ['sellers' => $sellers]);
    }

    public function detail($slug)
    {
        $sellers = EcommerceSeller::where('slug', $slug)->firstOrFail();

        return view('frontend.ecommerce.item-detail', ['sellers' => $sellers]);
    }

    public function edit($id)
    {
        $seller = EcommerceSeller::findOrFail($id);

        return view('backend.ecommerce.seller.edit-seller', ['seller' => $seller]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $seller = EcommerceSeller::find($id);

        if ($seller) {

            $newIcon = $request->file('icon');

            if ($newIcon) {

                $validatedData = $request->validate([
                    // 'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newIconName = $request->icon->getClientOriginalName();
                $request->icon->move(public_path('ecommerce/seller/image/icon'), $newIconName);

                $seller->icon = $newIconName;
            }
            
            $newThumb = $request->file('thumb');

            if ($newThumb) {

                $validatedData = $request->validate([
                    // 'thumb' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newThumbName = $request->thumb->getClientOriginalName();
                $request->thumb->move(public_path('ecommerce/seller/image/thumb'), $newThumbName);

                $seller->thumb = $newThumbName;
            }

            $newCover = $request->file('cover');

            if ($newCover) {

                $validatedData = $request->validate([
                    // 'cover' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $coverImage = $request->cover->getClientOriginalName();
                $request->cover->move(public_path('ecommerce/seller/image/cover'), $coverImage);

                $seller->cover = $coverImage;
            }

            $newOGImage = $request->file('og_image');

            if ($newOGImage) {

                $validatedData = $request->validate([
                    // 'og_image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $oGImage = $request->og_image->getClientOriginalName();
                $request->og_image->move(public_path('ecommerce/seller/image/og'), $oGImage);

                $seller->og_image = $oGImage;
            }

            $seller->name = $request->input('name');
            $seller->slug = $request->input('slug');
            $seller->gender = $request->input('gender');
            $seller->mobile = $request->input('mobile');
            $seller->email = $request->input('email');
            $seller->bio = $request->input('bio');
            $seller->address = $request->input('address');
            $seller->youtube_iframe = $request->input('youtube_iframe');
            $seller->header_content = $request->input('header_content');
            $seller->meta_title = $request->input('meta_title');
            $seller->meta_description = $request->input('meta_description');
            $seller->facebook_meta_title = $request->input('facebook_meta_title');
            $seller->facebook_meta_description = $request->input('facebook_meta_description');
            $seller->twitter_meta_title = $request->input('twitter_meta_title');
            $seller->twitter_meta_description = $request->input('twitter_meta_description');
            $seller->icon_alt_text = $request->input('icon_alt_text');
            $seller->thumb_alt_text = $request->input('thumb_alt_text');
            $seller->cover_alt_text = $request->input('cover_alt_text');
            $seller->og_img_alt_text = $request->input('og_img_alt_text');
            $seller->is_index = $request->input('is_index');
            $seller->is_follow = $request->input('is_follow');
            $seller->is_featured = $request->input('is_featured');

            if (!is_null($request->input('status'))) {
                $seller->status = $request->input('status');
            }
            
            $seller->comment = $request->input('comment');

            $seller->save();

        } else {
            Session::flash('update', __('The record does not exist!'));
        }

        Session::flash('update', __('Seller Successfully Updated!'));
        
        return back();
    }

    public function destroy($id)
    {
        EcommerceSeller::where('id',$id)->delete();

        Session::flash('delete', __('Seller Successfully Deleted!'));
        
        return back();
    }
}
