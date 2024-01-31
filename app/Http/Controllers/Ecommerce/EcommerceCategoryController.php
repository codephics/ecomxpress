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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.ecommerce.categories.manage-category');
    }

    /**
     * Show the form for creating a new resource.
     */
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
        
        // Default view if none of the routes match
        return view('backend.ecommerce.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        if ($request->routeIs('ecommerce.new-category.store')) {

            // $request->validate([
            //     'name' => ['required', 'string', 'max:255'],
            //     'slug' => ['required', 'regex:/^[a-z]+$/'],
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ], [
            //     'slug.regex' => 'The :attribute field must contain only lowercase letters.'
            // ]);

            // dd($request);

            $category = EcommerceCategory::create([
                'category_name' => $request->category_name,
                'slug' => $request->slug,
                'title' => $request->title,
                'description' => $request->description,
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
            ]);

            $category->save();

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon')->getClientOriginalName();
                $request->file('icon')->move(public_path('ecommerce/image/category/icon'), $icon);
                $category->icon = $icon;
            }

            if ($request->hasFile('thumb')) {
                $thumb = $request->file('thumb')->getClientOriginalName();
                $request->file('thumb')->move(public_path('ecommerce/image/category/thumb'), $thumb);
                $category->thumb = $thumb;
            }

            if ($request->hasFile('cover')) {
                $cover = $request->file('cover')->getClientOriginalName();
                $request->file('cover')->move(public_path('ecommerce/image/category/cover'), $cover);
                $category->cover = $cover;
            }

            if ($request->hasFile('og_image')) {
                $oGImage = $request->file('og_image')->getClientOriginalName();
                $request->file('og_image')->move(public_path('ecommerce/image/category/og'), $oGImage);
                $category->og_image = $oGImage;
            }

            if ($request->hasFile('icon') || $request->hasFile('thumb') || $request->hasFile('cover') || $request->hasFile('og_image')) {
                $category->save();
            }

            Session::flash('message', __('New Category Successfully Added!'));
            
            return redirect(RouteServiceProvider::EcommerceCategories);

        } elseif ($request->routeIs('ecommerce.new-subcategory.store')) {
            
            // $request->validate([
            //     'name' => ['required', 'string', 'max:255'],
            //     'slug' => ['required', 'regex:/^[a-z]+$/'],
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ], [
            //     'slug.regex' => 'The :attribute field must contain only lowercase letters.'
            // ]);

            $subcategory = EcommerceSubCategory::create([
                'category_name' => $request->category_name,
                'subcategory_name' => $request->subcategory_name,
                'slug' => $request->slug,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ]);

            $subcategory->save();

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon')->getClientOriginalName();
                $request->file('icon')->move(public_path('ecommerce/image/category/subcategory/icon'), $icon);
                $subcategory->icon = $icon;
            }

            if ($request->hasFile('thumb')) {
                $thumb = $request->file('thumb')->getClientOriginalName();
                $request->file('thumb')->move(public_path('ecommerce/image/category/subcategory/thumb'), $thumb);
                $subcategory->thumb = $thumb;
            }

            if ($request->hasFile('cover')) {
                $cover = $request->file('cover')->getClientOriginalName();
                $request->file('cover')->move(public_path('ecommerce/image/category/subcategory/cover'), $cover);
                $subcategory->cover = $cover;
            }

            if ($request->hasFile('og_image')) {
                $oGImage = $request->file('og_image')->getClientOriginalName();
                $request->file('og_image')->move(public_path('ecommerce/image/category/subcategory/og'), $oGImage);
                $subcategory->og_image = $oGImage;
            }

            if ($request->hasFile('icon') || $request->hasFile('thumb') || $request->hasFile('cover') || $request->hasFile('og_image')) {
                $subcategory->save();
            }

            Session::flash('message', __('New Subcategory Successfully Added!'));
            
            return redirect(RouteServiceProvider::EcommerceSubCategories);

        } elseif ($request->routeIs('ecommerce.new-sub-subcategory.store')) {
            
            // $request->validate([
            //     'name' => ['required', 'string', 'max:255'],
            //     'slug' => ['required', 'regex:/^[a-z]+$/'],
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ], [
            //     'slug.regex' => 'The :attribute field must contain only lowercase letters.'
            // ]);

            $subSubcategory = EcommerceSubSubCategory::create([
                'sub_subcategory_name' => $request->sub_subcategory_name,
                'subcategory_name' => $request->subcategory_name,
                'slug' => $request->slug,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ]);

            $subSubcategory->save();

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon')->getClientOriginalName();
                $request->file('icon')->move(public_path('ecommerce/image/category/subcategory/sub-subcategory/icon'), $icon);
                $subSubcategory->icon = $icon;
            }

            if ($request->hasFile('thumb')) {
                $thumb = $request->file('thumb')->getClientOriginalName();
                $request->file('thumb')->move(public_path('ecommerce/image/category/subcategory/sub-subcategory/thumb'), $thumb);
                $subSubcategory->thumb = $thumb;
            }

            if ($request->hasFile('cover')) {
                $cover = $request->file('cover')->getClientOriginalName();
                $request->file('cover')->move(public_path('ecommerce/image/category/subcategory/sub-subcategory/cover'), $cover);
                $subSubcategory->cover = $cover;
            }

            if ($request->hasFile('og_image')) {
                $oGImage = $request->file('og_image')->getClientOriginalName();
                $request->file('og_image')->move(public_path('ecommerce/image/category/subcategory/sub-subcategory/og'), $oGImage);
                $subSubcategory->og_image = $oGImage;
            }

            if ($request->hasFile('icon') || $request->hasFile('thumb') || $request->hasFile('cover') || $request->hasFile('og_image')) {
                $subSubcategory->save();
            }

            Session::flash('message', __('New Sub Subcategory Successfully Added!'));
            
            return redirect(RouteServiceProvider::EcommerceSubSubCategories);

        }
        
        // Default view if none of the routes match
        return view('backend.ecommerce.dashboard');
    }

    /**
     * Display the specified resource.
     */
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
        
        // Default view if none of the routes match
        return view('backend.ecommerce.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
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
        
        // Default view if none of the routes match
        return view('backend.ecommerce.dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
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
                    $request->icon->move(public_path('ecommerce/image/category/icon'), $newIconName);

                    $category->icon = $newIconName;
                }

                $newThumb = $request->file('thumb');

                if ($newThumb) {
                    $validatedData = $request->validate([
                        // 'thumb' => 'thumb|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newThumbName = $request->thumb->getClientOriginalName();
                    $request->thumb->move(public_path('ecommerce/image/category/thumb'), $newThumbName);

                    $category->thumb = $newThumbName;
                }

                $newCover = $request->file('cover');

                if ($newCover) {
                    $validatedData = $request->validate([
                        // 'cover' => 'cover|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newCoverName = $request->cover->getClientOriginalName();
                    $request->cover->move(public_path('ecommerce/image/category/cover'), $newCoverName);

                    $category->cover = $newCoverName;
                }

                $newOG = $request->file('og_image');

                if ($newOG) {
                    $validatedData = $request->validate([
                        // 'og_image' => 'og|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newOGName = $request->og_image->getClientOriginalName();
                    $request->og_image->move(public_path('ecommerce/image/category/og'), $newOGName);

                    $category->og_image = $newOGName;
                }

                $category->category_name = $request->input('category_name');
                $category->slug = $request->input('slug');
                $category->title = $request->input('title');
                $category->description = $request->input('description');
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
                    $request->icon->move(public_path('ecommerce/image/category/subcategory/icon'), $newIconName);

                    $subcategory->icon = $newIconName;
                }

                $newThumb = $request->file('thumb');

                if ($newThumb) {
                    $validatedData = $request->validate([
                        // 'thumb' => 'thumb|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newThumbName = $request->thumb->getClientOriginalName();
                    $request->thumb->move(public_path('ecommerce/image/category/subcategory/thumb'), $newThumbName);

                    $subcategory->thumb = $newThumbName;
                }

                $newCover = $request->file('cover');

                if ($newCover) {
                    $validatedData = $request->validate([
                        // 'cover' => 'cover|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newCoverName = $request->cover->getClientOriginalName();
                    $request->cover->move(public_path('ecommerce/image/category/subcategory/cover'), $newCoverName);

                    $subcategory->cover = $newCoverName;
                }

                $newOG = $request->file('og_image');

                if ($newOG) {
                    $validatedData = $request->validate([
                        // 'og_image' => 'og|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newOGName = $request->og_image->getClientOriginalName();
                    $request->og_image->move(public_path('ecommerce/image/category/subcategory/og'), $newOGName);

                    $subcategory->og_image = $newOGName;
                }

                $subcategory->category_name = $request->input('category_name');
                $subcategory->subcategory_name = $request->input('subcategory_name');
                $subcategory->slug = $request->input('slug');
                $subcategory->description = $request->input('description');
                $subcategory->meta_title = $request->input('meta_title');
                $subcategory->meta_description = $request->input('meta_description');

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
                    $request->icon->move(public_path('ecommerce/image/category/subcategory/sub-subcategory/icon'), $newIconName);

                    $sub_subcategory->icon = $newIconName;
                }

                $newThumb = $request->file('thumb');

                if ($newThumb) {
                    $validatedData = $request->validate([
                        // 'thumb' => 'thumb|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newThumbName = $request->thumb->getClientOriginalName();
                    $request->thumb->move(public_path('ecommerce/image/category/subcategory/sub-subcategory/thumb'), $newThumbName);

                    $sub_subcategory->thumb = $newThumbName;
                }

                $newCover = $request->file('cover');

                if ($newCover) {
                    $validatedData = $request->validate([
                        // 'cover' => 'cover|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newCoverName = $request->cover->getClientOriginalName();
                    $request->cover->move(public_path('ecommerce/image/category/subcategory/sub-subcategory/cover'), $newCoverName);

                    $sub_subcategory->cover = $newCoverName;
                }

                $newOG = $request->file('og_image');

                if ($newOG) {
                    $validatedData = $request->validate([
                        // 'og_image' => 'og|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $newOGName = $request->og_image->getClientOriginalName();
                    $request->og_image->move(public_path('ecommerce/image/category/subcategory/sub-subcategory/og'), $newOGName);

                    $sub_subcategory->og_image = $newOGName;
                }

                $sub_subcategory->sub_subcategory_name = $request->input('sub_subcategory_name');
                $sub_subcategory->subcategory_name = $request->input('subcategory_name');
                $sub_subcategory->slug = $request->input('slug');
                $sub_subcategory->description = $request->input('description');
                $sub_subcategory->meta_title = $request->input('meta_title');
                $sub_subcategory->meta_description = $request->input('meta_description');

                $sub_subcategory->save();

            } else {
                Session::flash('message', __('Sub Subcategory Record does not exist!'));

                return back();
            }

            Session::flash('message', __('Sub Subcategory Successfully Updated!'));
            
            return back();
        }
        
        // Default view if none of the routes match
        return view('backend.ecommerce.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
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
        
        // Default view if none of the routes match
        return view('backend.ecommerce.dashboard');
    }
}
