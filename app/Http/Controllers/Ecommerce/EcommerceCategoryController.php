<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;

use App\Models\Ecommerce\EcommerceCategory;
use App\Models\Ecommerce\EcommerceSubcategory;
use App\Models\Ecommerce\EcommerceSubSubcategory;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;

class EcommerceCategoryController extends Controller
{
    public function index()
    {
        return view('backend.ecommerce.categories.manage-category');
    }

    public function create(Request $request)
    {
        if ($request->routeIs('ecommerce.new-category')) {
            
            return view('backend.ecommerce.categories.new-category');

        } elseif ($request->routeIs('ecommerce.new-subcategory')) {
        
            $categories = EcommerceCategory::select('category_name')->get();
            
            return view('backend.ecommerce.categories.new-subcategory', ['categories' => $categories]);

        } elseif ($request->routeIs('ecommerce.new-sub-subcategory')) {
        
            $subcategories = EcommerceSubcategory::select('subcategory_name')->get();
            
            return view('backend.ecommerce.categories.new-sub-subcategory', ['subcategories' => $subcategories]);
        }
        
        return view('backend.ecommerce.dashboard');
    }

    public function store(Request $request): RedirectResponse
    {

        if ($request->routeIs('ecommerce.new-category.store')) {

            $category = EcommerceCategory::create([
                'category_name' => $request->category_name,
                'slug' => $request->slug,
                'title' => $request->title,
                'description' => $request->description,
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

            $category->save();

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon')->getClientOriginalName();
                $request->file('icon')->move(public_path('ecommerce/category/image/icon'), $icon);
                $category->icon = $icon;
            }

            if ($request->hasFile('thumb')) {
                $thumb = $request->file('thumb')->getClientOriginalName();
                $request->file('thumb')->move(public_path('ecommerce/category/image/thumb'), $thumb);
                $category->thumb = $thumb;
            }

            if ($request->hasFile('cover')) {
                $cover = $request->file('cover')->getClientOriginalName();
                $request->file('cover')->move(public_path('ecommerce/category/image/cover'), $cover);
                $category->cover = $cover;
            }

            if ($request->hasFile('og_image')) {
                $oGImage = $request->file('og_image')->getClientOriginalName();
                $request->file('og_image')->move(public_path('ecommerce/category/image/og'), $oGImage);
                $category->og_image = $oGImage;
            }

            if ($request->hasFile('icon') || $request->hasFile('thumb') || $request->hasFile('cover') || $request->hasFile('og_image')) {
                $category->save();
            }

            Session::flash('message', __('New Category Successfully Added!'));
            
            return redirect(RouteServiceProvider::EcommerceCategories);

        } elseif ($request->routeIs('ecommerce.new-subcategory.store')) {
            
            $subcategory = EcommerceSubCategory::create([
                'category_name' => $request->category_name,
                'subcategory_name' => $request->subcategory_name,
                'slug' => $request->slug,
                'description' => $request->description,
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

            $subcategory->save();

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon')->getClientOriginalName();
                $request->file('icon')->move(public_path('ecommerce/category/subcategory/image/icon'), $icon);
                $subcategory->icon = $icon;
            }

            if ($request->hasFile('thumb')) {
                $thumb = $request->file('thumb')->getClientOriginalName();
                $request->file('thumb')->move(public_path('ecommerce/category/subcategory/image/thumb'), $thumb);
                $subcategory->thumb = $thumb;
            }

            if ($request->hasFile('cover')) {
                $cover = $request->file('cover')->getClientOriginalName();
                $request->file('cover')->move(public_path('ecommerce/category/subcategory/image/cover'), $cover);
                $subcategory->cover = $cover;
            }

            if ($request->hasFile('og_image')) {
                $oGImage = $request->file('og_image')->getClientOriginalName();
                $request->file('og_image')->move(public_path('ecommerce/category/subcategory/image/og'), $oGImage);
                $subcategory->og_image = $oGImage;
            }

            if ($request->hasFile('icon') || $request->hasFile('thumb') || $request->hasFile('cover') || $request->hasFile('og_image')) {
                $subcategory->save();
            }

            Session::flash('message', __('New Subcategory Successfully Added!'));
            
            return redirect(RouteServiceProvider::EcommerceSubCategories);

        } elseif ($request->routeIs('ecommerce.new-sub-subcategory.store')) {
            
            $subSubcategory = EcommerceSubSubCategory::create([
                'sub_subcategory_name' => $request->sub_subcategory_name,
                'subcategory_name' => $request->subcategory_name,
                'slug' => $request->slug,
                'description' => $request->description,
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

            $subSubcategory->save();

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon')->getClientOriginalName();
                $request->file('icon')->move(public_path('ecommerce/category/subcategory/sub-subcategory/image/icon'), $icon);
                $subSubcategory->icon = $icon;
            }

            if ($request->hasFile('thumb')) {
                $thumb = $request->file('thumb')->getClientOriginalName();
                $request->file('thumb')->move(public_path('ecommerce/category/subcategory/sub-subcategory/image/thumb'), $thumb);
                $subSubcategory->thumb = $thumb;
            }

            if ($request->hasFile('cover')) {
                $cover = $request->file('cover')->getClientOriginalName();
                $request->file('cover')->move(public_path('ecommerce/category/subcategory/sub-subcategory/image/cover'), $cover);
                $subSubcategory->cover = $cover;
            }

            if ($request->hasFile('og_image')) {
                $oGImage = $request->file('og_image')->getClientOriginalName();
                $request->file('og_image')->move(public_path('ecommerce/category/subcategory/sub-subcategory/image/og'), $oGImage);
                $subSubcategory->og_image = $oGImage;
            }

            if ($request->hasFile('icon') || $request->hasFile('thumb') || $request->hasFile('cover') || $request->hasFile('og_image')) {
                $subSubcategory->save();
            }

            Session::flash('message', __('New Sub Subcategory Successfully Added!'));
            
            return redirect(RouteServiceProvider::EcommerceSubSubCategories);

        }
        
        return view('backend.ecommerce.dashboard');
    }

    public function show(Request $request)
    {
        if ($request->routeIs('ecommerce.manage-categories')) {
            
            $categories = EcommerceCategory::all();
            
            return view('backend.ecommerce.categories.manage-categories', ['categories' => $categories]);

        } elseif ($request->routeIs('ecommerce.manage-subcategories')) {
            
            $subcategories = EcommerceSubcategory::all();
            
            return view('backend.ecommerce.categories.manage-subcategories', ['subcategories' => $subcategories]);

        } elseif ($request->routeIs('ecommerce.manage-sub-subcategories')) {
        
            $sub_subcategories = EcommerceSubSubcategory::all();
            
            return view('backend.ecommerce.categories.manage-sub-subcategories', ['sub_subcategories' => $sub_subcategories]);

        }
        
        return view('backend.ecommerce.dashboard');
    }

    public function edit(Request $request, $id)
    {
        if ($request->routeIs('ecommerce.category.edit')) {

            $category = EcommerceCategory::findOrFail($id);
            
            return view('backend.ecommerce.categories.edit-category', ['category' => $category]);

        } elseif ($request->routeIs('ecommerce.subcategory.edit')) {

            $categories = EcommerceCategory::select('category_name')->get();

            $subcategory = EcommerceSubcategory::findOrFail($id);
            
            return view('backend.ecommerce.categories.edit-subcategory', ['categories' => $categories, 'subcategory' => $subcategory]);

        } elseif ($request->routeIs('ecommerce.sub-subcategory.edit')) {

            $subcategories = EcommerceSubcategory::select('subcategory_name')->get();

            $sub_subcategory = EcommerceSubSubcategory::findOrFail($id);
            
            return view('backend.ecommerce.categories.edit-sub-subcategory', ['subcategories' => $subcategories, 'sub_subcategory' => $sub_subcategory]);

        }
        
        return view('backend.ecommerce.dashboard');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        if ($request->routeIs('ecommerce.category.update')) {

            $category = EcommerceCategory::find($id);

            if ($category) {
                $newIcon = $request->file('icon');

                if ($newIcon) {
                    $validatedData = $request->validate([
                        // 'icon' => 'icon|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newIconName = $request->icon->getClientOriginalName();
                    $request->icon->move(public_path('ecommerce/category/image/icon'), $newIconName);

                    $category->icon = $newIconName;
                }

                $newThumb = $request->file('thumb');

                if ($newThumb) {
                    $validatedData = $request->validate([
                        // 'thumb' => 'thumb|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newThumbName = $request->thumb->getClientOriginalName();
                    $request->thumb->move(public_path('ecommerce/category/image/thumb'), $newThumbName);

                    $category->thumb = $newThumbName;
                }

                $newCover = $request->file('cover');

                if ($newCover) {
                    $validatedData = $request->validate([
                        // 'cover' => 'cover|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newCoverName = $request->cover->getClientOriginalName();
                    $request->cover->move(public_path('ecommerce/category/image/cover'), $newCoverName);

                    $category->cover = $newCoverName;
                }

                $newOG = $request->file('og_image');

                if ($newOG) {
                    $validatedData = $request->validate([
                        // 'og_image' => 'og|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newOGName = $request->og_image->getClientOriginalName();
                    $request->og_image->move(public_path('ecommerce/category/image/og'), $newOGName);

                    $category->og_image = $newOGName;
                }

                $category->category_name = $request->input('category_name');
                $category->slug = $request->input('slug');
                $category->title = $request->input('title');
                $category->description = $request->input('description');
                $category->youtube_iframe = $request->input('youtube_iframe');
                $category->header_content = $request->input('header_content');
                $category->meta_title = $request->input('meta_title');
                $category->meta_description = $request->input('meta_description');
                $category->facebook_meta_title = $request->input('facebook_meta_title');
                $category->facebook_meta_description = $request->input('facebook_meta_description');
                $category->twitter_meta_title = $request->input('twitter_meta_title');
                $category->twitter_meta_description = $request->input('twitter_meta_description');
                $category->icon_alt_text = $request->input('icon_alt_text');
                $category->thumb_alt_text = $request->input('thumb_alt_text');
                $category->cover_alt_text = $request->input('cover_alt_text');
                $category->og_img_alt_text = $request->input('og_img_alt_text');
                $category->is_index = $request->input('is_index');
                $category->is_follow = $request->input('is_follow');
                $category->is_featured = $request->input('is_featured');

                if (!is_null($request->input('status'))) {
                    $category->status = $request->input('status');
                }
            
                $category->comment = $request->input('comment');

                $category->save();

            } else {
                Session::flash('message', __('Category Record does not exist!'));

                return back();
            }

            Session::flash('message', __('Category Successfully Updated!'));
            
            return back();

        } elseif ($request->routeIs('ecommerce.subcategory.update')) {

            $subcategory = EcommerceSubCategory::find($id);

            if ($subcategory) {
                $newIcon = $request->file('icon');

                if ($newIcon) {
                    $validatedData = $request->validate([
                        // 'icon' => 'icon|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newIconName = $request->icon->getClientOriginalName();
                    $request->icon->move(public_path('ecommerce/category/subcategory/image/icon'), $newIconName);

                    $subcategory->icon = $newIconName;
                }

                $newThumb = $request->file('thumb');

                if ($newThumb) {
                    $validatedData = $request->validate([
                        // 'thumb' => 'thumb|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newThumbName = $request->thumb->getClientOriginalName();
                    $request->thumb->move(public_path('ecommerce/category/subcategory/image/thumb'), $newThumbName);

                    $subcategory->thumb = $newThumbName;
                }

                $newCover = $request->file('cover');

                if ($newCover) {
                    $validatedData = $request->validate([
                        // 'cover' => 'cover|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newCoverName = $request->cover->getClientOriginalName();
                    $request->cover->move(public_path('ecommerce/category/subcategory/image/cover'), $newCoverName);

                    $subcategory->cover = $newCoverName;
                }

                $newOG = $request->file('og_image');

                if ($newOG) {
                    $validatedData = $request->validate([
                        // 'og_image' => 'og|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newOGName = $request->og_image->getClientOriginalName();
                    $request->og_image->move(public_path('ecommerce/category/subcategory/image/og'), $newOGName);

                    $subcategory->og_image = $newOGName;
                }

                $subcategory->category_name = $request->input('category_name');
                $subcategory->subcategory_name = $request->input('subcategory_name');
                $subcategory->slug = $request->input('slug');
                $subcategory->description = $request->input('description');
                $subcategory->youtube_iframe = $request->input('youtube_iframe');
                $subcategory->header_content = $request->input('header_content');
                $subcategory->meta_title = $request->input('meta_title');
                $subcategory->meta_description = $request->input('meta_description');
                $subcategory->facebook_meta_title = $request->input('facebook_meta_title');
                $subcategory->facebook_meta_description = $request->input('facebook_meta_description');
                $subcategory->twitter_meta_title = $request->input('twitter_meta_title');
                $subcategory->twitter_meta_description = $request->input('twitter_meta_description');
                $subcategory->icon_alt_text = $request->input('icon_alt_text');
                $subcategory->thumb_alt_text = $request->input('thumb_alt_text');
                $subcategory->cover_alt_text = $request->input('cover_alt_text');
                $subcategory->og_img_alt_text = $request->input('og_img_alt_text');
                $subcategory->is_index = $request->input('is_index');
                $subcategory->is_follow = $request->input('is_follow');
                $subcategory->is_featured = $request->input('is_featured');

                if (!is_null($request->input('status'))) {
                    $subcategory->status = $request->input('status');
                }

                $subcategory->save();

            } else {
                Session::flash('message', __('Subcategory Record does not exist!'));

                return back();
            }

            Session::flash('message', __('Subcategory Successfully Updated!'));
            
            return back();

        } elseif ($request->routeIs('ecommerce.sub-subcategory.update')) {

            $sub_subcategory = EcommerceSubSubcategory::find($id);

            if ($sub_subcategory) {
                $newIcon = $request->file('icon');

                if ($newIcon) {
                    $validatedData = $request->validate([
                        // 'icon' => 'icon|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newIconName = $request->icon->getClientOriginalName();
                    $request->icon->move(public_path('ecommerce/category/subcategory/sub-subcategory/image/icon'), $newIconName);

                    $sub_subcategory->icon = $newIconName;
                }

                $newThumb = $request->file('thumb');

                if ($newThumb) {
                    $validatedData = $request->validate([
                        // 'thumb' => 'thumb|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newThumbName = $request->thumb->getClientOriginalName();
                    $request->thumb->move(public_path('ecommerce/category/subcategory/sub-subcategory/image/thumb'), $newThumbName);

                    $sub_subcategory->thumb = $newThumbName;
                }

                $newCover = $request->file('cover');

                if ($newCover) {
                    $validatedData = $request->validate([
                        // 'cover' => 'cover|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newCoverName = $request->cover->getClientOriginalName();
                    $request->cover->move(public_path('ecommerce/category/subcategory/sub-subcategory/image/cover'), $newCoverName);

                    $sub_subcategory->cover = $newCoverName;
                }

                $newOG = $request->file('og_image');

                if ($newOG) {
                    $validatedData = $request->validate([
                        // 'og_image' => 'og|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newOGName = $request->og_image->getClientOriginalName();
                    $request->og_image->move(public_path('ecommerce/category/subcategory/sub-subcategory/image/og'), $newOGName);

                    $sub_subcategory->og_image = $newOGName;
                }

                $sub_subcategory->sub_subcategory_name = $request->input('sub_subcategory_name');
                $sub_subcategory->subcategory_name = $request->input('subcategory_name');
                $sub_subcategory->slug = $request->input('slug');
                $sub_subcategory->description = $request->input('description');
                $sub_subcategory->youtube_iframe = $request->input('youtube_iframe');
                $sub_subcategory->header_content = $request->input('header_content');
                $sub_subcategory->meta_title = $request->input('meta_title');
                $sub_subcategory->meta_description = $request->input('meta_description');
                $sub_subcategory->facebook_meta_title = $request->input('facebook_meta_title');
                $sub_subcategory->facebook_meta_description = $request->input('facebook_meta_description');
                $sub_subcategory->twitter_meta_title = $request->input('twitter_meta_title');
                $sub_subcategory->twitter_meta_description = $request->input('twitter_meta_description');
                $sub_subcategory->icon_alt_text = $request->input('icon_alt_text');
                $sub_subcategory->thumb_alt_text = $request->input('thumb_alt_text');
                $sub_subcategory->cover_alt_text = $request->input('cover_alt_text');
                $sub_subcategory->og_img_alt_text = $request->input('og_img_alt_text');
                $sub_subcategory->is_index = $request->input('is_index');
                $sub_subcategory->is_follow = $request->input('is_follow');
                $sub_subcategory->is_featured = $request->input('is_featured');

                if (!is_null($request->input('status'))) {
                    $sub_subcategory->status = $request->input('status');
                }

                $sub_subcategory->save();

            } else {
                Session::flash('message', __('Sub Subcategory Record does not exist!'));

                return back();
            }

            Session::flash('message', __('Sub Subcategory Successfully Updated!'));
            
            return back();
        }
        
        return view('backend.ecommerce.dashboard');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->routeIs('ecommerce.category.destroy')) {

            EcommerceCategory::where('id',$id)->delete();

            Session::flash('delete', __('Category Successfully Deleted!'));
            
            return back();

        } elseif ($request->routeIs('ecommerce.subcategory.destroy')) {
            
            EcommerceSubcategory::where('id',$id)->delete();

            Session::flash('delete', __('Subcategory Successfully Deleted!'));
            
            return back();

        } elseif ($request->routeIs('ecommerce.sub-subcategory.destroy')) {
            
            EcommerceSubSubcategory::where('id',$id)->delete();

            Session::flash('delete', __('Sub Subcategory Successfully Deleted!'));
            
            return back();
        }
        
        return view('backend.ecommerce.dashboard');
    }
}
