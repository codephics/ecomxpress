<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;

use App\Models\Global\Page;
use App\Models\Global\Blog;
use App\Models\Global\Seller;

use App\Models\Ecommerce\EcommerceItem;
use App\Models\Ecommerce\EcommerceCategory;
use App\Models\Ecommerce\EcommerceSubcategory;
use App\Models\Ecommerce\EcommerceSubSubcategory;

use App\Providers\RouteServiceProvider;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Session;

class EcommerceItemsController extends Controller
{
    public function index()
    {
        $page = EcommercePage::where('slug', 'solution')->firstOrFail();
        $breadcrumbs = $this->generateBreadcrumbs(request()->getPathInfo());
        
        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        $items = EcommerceItem::take(60)->get();

        return view('frontend.ecommerce.ecommerce-store', [
            'page' => $page,
            'breadcrumbs' => $breadcrumbs,
            'items' => $items,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sub_subcategories' => $sub_subcategories,
        ]);
    }

    public function detail($slug)
    {
        $page = EcommerceItem::where('slug', $slug)->firstOrFail();
        $relatedItems = EcommerceItem::take(4)->get();
        $relatedBlog = EcommerceBlog::take(4)->get();

        return view('frontend.ecommerce.item-detail', [
                'page' => $page,
                'relatedItems' => $relatedItems,
                'relatedBlog' => $relatedBlog
            ]);
    }

    public function generateBreadcrumbs($url)
    {
        $breadcrumbs = [];

        $segments = explode('/', $url);

        // Remove empty segments
        $segments = array_filter($segments);

        $currentUrl = '';

        foreach ($segments as $segment) {
            $currentUrl .= '/' . $segment;

            // Get the category, subcategory, or sub-subcategory based on the URL segment
            $category = EcommerceCategory::where('slug', $segment)->first();
            $subcategory = EcommerceSubcategory::where('slug', $segment)->first();
            $subSubcategory = EcommerceSubSubcategory::where('slug', $segment)->first();

            if ($category) {
                $breadcrumbs[] = [
                    'name' => $category->category_name,
                    'url' => url($currentUrl),
                ];
            } elseif ($subcategory) {
                $breadcrumbs[] = [
                    'name' => $subcategory->subcategory_name,
                    'url' => url($currentUrl),
                ];
            } elseif ($subSubcategory) {
                $breadcrumbs[] = [
                    'name' => $subSubcategory->sub_subcategory_name,
                    'url' => url($currentUrl),
                ];
            }
        }

        return $breadcrumbs;
    }

    public function showByCategory(EcommerceCategory $category)
    {
        $page = EcommerceCategory::where('slug', $category->slug)->firstOrFail();
        $breadcrumbs = $this->generateBreadcrumbs(request()->getPathInfo());

        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        // Retrieve ecommerces with related category
        $item = EcommerceItem::with('category')
            ->whereHas('category', function ($query) {
                $query->where('slug', request()->segment(4)); // Assuming the slug is the second URL segment
            })
            ->take(60)
            ->get();

        return view('frontend.ecommerce.ecommerce-store', [
            'page' => $page,
            'breadcrumbs' => $breadcrumbs,
            'item' => $item,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sub_subcategories' => $sub_subcategories,
        ]);
    }

    public function showBySubcategory(EcommerceCategory $category, EcommerceSubcategory $subcategory)
    {
        $page = EcommerceSubcategory::where('slug', $subcategory->slug)->firstOrFail();
        $breadcrumbs = $this->generateBreadcrumbs(request()->getPathInfo());

        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        $item = EcommerceItem::with(['category', 'subcategory'])
            ->where('category_name', $category->category_name)
            ->where('subcategory_name', $subcategory->subcategory_name)
            ->take(60)
            ->get();

        return view('frontend.ecommerce.ecommerce-store', [
            'page' => $page,
            'breadcrumbs' => $breadcrumbs,
            'item' => $item,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sub_subcategories' => $sub_subcategories,
        ]);
    }

    public function showBySubSubcategory(EcommerceCategory $category, EcommerceSubcategory $subcategory, EcommerceSubSubcategory $subSubcategory)
    {
        $page = EcommerceSubSubcategory::where('slug', $subSubcategory->slug)->firstOrFail();
        $breadcrumbs = $this->generateBreadcrumbs(request()->getPathInfo());

        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        $item = EcommerceItem::with(['category', 'subcategory', 'subSubcategory'])
            ->where('category_name', $category->category_name)
            ->where('subcategory_name', $subcategory->subcategory_name)
            ->where('sub_subcategory_name', $subSubcategory->sub_subcategory_name)
            ->take(60)
            ->get();

        return view('frontend.ecommerce.ecommerce-store', [
            'page' => $page,
            'breadcrumbs' => $breadcrumbs,
            'item' => $item,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sub_subcategories' => $sub_subcategories,
        ]);
    }

    public function create()
    {
        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        return view('backend.ecommerce.new-item', ['categories' => $categories, 'subcategories' => $subcategories, 'sub_subcategories' => $sub_subcategories]);
    }

    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'slug' => ['required', 'regex:/^[a-z]+$/'],
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ], [
        //     'slug.regex' => 'The :attribute field must contain only lowercase letters.'
        // ]);

        // dd($request);

        $item = EcommerceItem::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_name' => $request->category_name,
            'subcategory_name' => $request->subcategory_name,
            'sub_subcategory_name' => $request->sub_subcategory_name,
            'sku' => $request->sku,
            'sale_price' => $request->sale_price,
            'regular_price' => $request->regular_price,
            'commission' => $request->commission,
            'bootstrap_v' => $request->bootstrap_v,
            'released' => $request->released,
            'updated' => $request->updated,
            'version' => $request->version,
            'seller_name' => $request->seller_name,
            'seller_email' => $request->seller_email,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'change_log' => $request->change_log,
            'youtube_iframe' => $request->youtube_iframe,
            'header_content' => $request->header_content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'facebook_meta_title' => $request->facebook_meta_title,
            'facebook_meta_description' => $request->facebook_meta_description,
            'twitter_meta_title' => $request->twitter_meta_title,
            'twitter_meta_description' => $request->twitter_meta_description,
            'img_alt_text' => $request->img_alt_text,
            'og_img_alt_text' => $request->og_img_alt_text,
            'is_index' => $request->is_index,
            'is_follow' => $request->is_follow,
            'order_type' => $request->order_type,
            'is_featured' => $request->input('is_featured', 0),
            'live_preview_link' => $request->live_preview_link,
            'admin_link' => $request->admin_link,
            'downloadable_link' => $request->downloadable_link,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $item->save();

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('ecommerce/image'), $imageName);
            $item->image = $imageName;
        }

        if ($request->hasFile('og')) {
            $og = $request->file('og')->getClientOriginalName();
            $request->file('og')->move(public_path('ecommerce/image/og'), $og);
            $item->og = $og;
        }

        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('ecommerce/file'), $fileName);
            $item->file = $fileName;
        }

        if ($request->hasFile('image') || $request->hasFile('og') || $request->hasFile('file')) {
            $item->save();
        }

        Session::flash('message', __('New Item Successfully Added!'));
        
        return redirect(RouteServiceProvider::Item);
    }

    public function show(Request $itemDetail)
    {
        $items = EcommerceItem::all();

        return view('backend.ecommerce.manage-item', ['items' => $items]);
    }

    public function edit($id)
    {
        $items = EcommerceItem::findOrFail($id);     
        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        return view('backend.ecommerce.edit-ecommerce', ['items' => $items, 'categories' => $categories,'subcategories' => $subcategories, 'sub_subcategories' => $sub_subcategories]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request);
        // Retrieve the existing record from the database
        $item = EcommerceItem::find($id);

        // Make sure the record exists
        if ($item) {
            // Validate and process the new image
            $newImage = $request->file('image');

            if ($newImage) {
                // Validate the new image file
                $validatedData = $request->validate([
                    // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                // Process the new image file (e.g., move to a specific directory, assign a new filename)
                $newImageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('ecommerce/image'), $newImageName);

                // Update the image data in the model
                $item->image = $newImageName;
            }

            $newImage = $request->file('og_image');

            if ($newImage) {
                // Validate the new OG file
                $validatedData = $request->validate([
                    // 'og' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                // Process the new OG file (e.g., move to a specific directory, assign a new filename)
                $newImageName = $request->og_image->getClientOriginalName();
                $request->og_image->move(public_path('ecommerce/image/og'), $newImageName);

                // Update the og data in the model
                $item->og_image = $newImageName;
            }

            // Validate and process the new image
            $newFile = $request->file('file');

            if ($newFile) {
                // Validate the new file file
                $validatedData = $request->validate([
                    // 'file' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                // Process the new file file (e.g., move to a specific directory, assign a new filename)
                $newFileName = $request->file->getClientOriginalName();
                $request->file->move(public_path('ecommerce/file'), $newFileName);

                // Update the file data in the model
                $item->file = $newFileName;
            }

            // Update other fields of the request
            $item->name = $request->input('name');
            $item->slug = $request->input('slug');
            $item->category_name = $request->input('category_name');
            $item->subcategory_name = $request->input('subcategory_name');
            $item->sub_subcategory_name = $request->input('sub_subcategory_name');
            $item->sale_price = $request->input('sale_price');
            $item->regular_price = $request->input('regular_price');
            $item->commission = $request->input('commission');
            $item->bootstrap_v = $request->input('bootstrap_v');
            $item->released = $request->input('released');
            $item->updated = $request->input('updated');
            $item->version = $request->input('version');
            $item->seller_name = $request->input('seller_name');
            $item->seller_email = $request->input('seller_email');
            $item->short_description = $request->input('short_description');
            $item->long_description = $request->input('long_description');
            $item->change_log = $request->input('change_log');
            $item->youtube_iframe = $request->input('youtube_iframe');
            $item->header_content = $request->input('header_content');
            $item->meta_title = $request->input('meta_title');
            $item->meta_description = $request->input('meta_description');
            $item->facebook_meta_title = $request->input('facebook_meta_title');
            $item->facebook_meta_description = $request->input('facebook_meta_description');
            $item->twitter_meta_title = $request->input('twitter_meta_title');
            $item->twitter_meta_description = $request->input('twitter_meta_description');
            $item->img_alt_text = $request->input('img_alt_text');
            $item->og_img_alt_text = $request->input('og_img_alt_text');
            $item->is_index = $request->input('is_index');
            $item->is_follow = $request->input('is_follow');
            $item->order_type = $request->input('order_type');
            $item->is_featured = $request->input('is_featured');
            $item->live_preview_link = $request->input('live_preview_link');
            $item->admin_link = $request->input('admin_link');
            $item->downloadable_link = $request->input('downloadable_link');

            if (!is_null($request->input('status'))) {
                $item->status = $request->input('status');
            }
            
            $item->comment = $request->input('comment');

            // Save the changes
            $item->save();

            // Perform any additional actions or redirect as needed
        } else {
            // Handle the case when the record doesn't exist
            dd();
        }

        Session::flash('update', __('Item Successfully Updated!'));
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        EcommerceItem::where('id',$id)->delete();

        Session::flash('delete', __('Item Successfully Deleted!'));
        
        return back();
    }
}
