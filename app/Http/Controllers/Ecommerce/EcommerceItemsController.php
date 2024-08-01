<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;

use App\Models\Global\Page;
use App\Models\Global\Setting;
use App\Models\Blog\Blog;

use App\Models\Ecommerce\EcommerceItem;
use App\Models\Ecommerce\EcommerceSeller;
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
        $page = Page::where('slug', 'shop')->firstOrFail();
        $setting = Setting::first();
        $breadcrumbs = $this->generateBreadcrumbs(request()->getPathInfo());
        
        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        $items = EcommerceItem::take(60)->get();

        return view('frontend.ecommerce.shop', [
            'page' => $page,
            'setting' => $setting,
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
        $setting = Setting::first();
        $relatedItems = EcommerceItem::take(4)->get();
        $seller = EcommerceSeller::first();
        $relatedBlog = Blog::take(4)->get();

        return view('frontend.ecommerce.item-detail', [
            'page' => $page,
            'setting' => $setting,
            'relatedItems' => $relatedItems,
            'seller' => $seller,
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
        $setting = Setting::first();
        $breadcrumbs = $this->generateBreadcrumbs(request()->getPathInfo());

        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        // Retrieve ecommerces with related category
        $items = EcommerceItem::with('category')
            ->whereHas('category', function ($query) {
                $query->where('slug', request()->segment(2)); // Assuming the slug is the second URL segment
            })
            ->take(60)
            ->get();

        return view('frontend.ecommerce.shop', [
            'page' => $page,
            'setting' => $setting,
            'breadcrumbs' => $breadcrumbs,
            'items' => $items,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sub_subcategories' => $sub_subcategories,
        ]);
    }

    public function showBySubcategory(EcommerceCategory $category, EcommerceSubcategory $subcategory)
    {
        $page = EcommerceSubcategory::where('slug', $subcategory->slug)->firstOrFail();
        $setting = Setting::first();
        $breadcrumbs = $this->generateBreadcrumbs(request()->getPathInfo());

        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        $items = EcommerceItem::with(['category', 'subcategory'])
            ->where('category_name', $category->category_name)
            ->where('subcategory_name', $subcategory->subcategory_name)
            ->whereHas('subcategory', function ($query) use ($subcategory) {
                $query->where('slug', request()->segment(3)); // Assuming the slug is the second URL segment
            })
            ->take(60)
            ->get();

        return view('frontend.ecommerce.shop', [
            'page' => $page,
            'setting' => $setting,
            'breadcrumbs' => $breadcrumbs,
            'items' => $items,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sub_subcategories' => $sub_subcategories,
        ]);
    }

    public function showBySubSubcategory(EcommerceCategory $category, EcommerceSubcategory $subcategory, EcommerceSubSubcategory $subSubcategory)
    {
        $page = EcommerceSubSubcategory::where('slug', $subSubcategory->slug)->firstOrFail();
        $setting = Setting::first();
        $breadcrumbs = $this->generateBreadcrumbs(request()->getPathInfo());

        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();

        // $items = EcommerceItem::with(['category', 'subcategory', 'subSubcategory'])
        //     ->where('category_name', $category->category_name)
        //     ->where('subcategory_name', $subcategory->subcategory_name)
        //     ->where('sub_subcategory_name', $subSubcategory->sub_subcategory_name)
        //     ->take(60)
        //     ->get();

        // Retrieve ecommerces with related category
        $items = EcommerceItem::with(['category', 'subcategory', 'subSubcategory'])
                ->where('category_name', $category->category_name)
                ->where('subcategory_name', $subcategory->subcategory_name)
                ->whereHas('subSubcategory', function ($query) use ($subSubcategory) {
                    $query->where('slug', request()->segment(4)); // Assuming the slug is the second URL segment
                })
                ->take(60)
                ->get();


        return view('frontend.ecommerce.shop', [
            'page' => $page,
            'setting' => $setting,
            'breadcrumbs' => $breadcrumbs,
            'items' => $items,
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
        $sellers = EcommerceSeller::all();

        return view('backend.ecommerce.new-item', [
            'categories' => $categories, 
            'subcategories' => $subcategories, 
            'sub_subcategories' => $sub_subcategories,
            'sellers' => $sellers            
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
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
            'img_alt_text' => $request->img_alt_text,
            'icon_alt_text' => $request->icon_alt_text,
            'thumb_alt_text' => $request->thumb_alt_text,
            'cover_alt_text' => $request->cover_alt_text,
            'og_img_alt_text' => $request->og_img_alt_text,
            'youtube_iframe' => $request->youtube_iframe,
            'header_content' => $request->header_content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'facebook_meta_title' => $request->facebook_meta_title,
            'facebook_meta_description' => $request->facebook_meta_description,
            'twitter_meta_title' => $request->twitter_meta_title,
            'twitter_meta_description' => $request->twitter_meta_description,
            'live_preview_link' => $request->live_preview_link,
            'admin_link' => $request->admin_link,
            'downloadable_link' => $request->downloadable_link,
            'order_type' => $request->order_type,
            'is_featured' => $request->is_featured,
            'is_index' => $request->is_index,
            'is_follow' => $request->is_follow,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $item->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('ecommerce/item/file'), $file);
            $item->file = $file;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('ecommerce/item/image'), $image);
            $item->image = $image;
        }

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('ecommerce/item/image/icon'), $icon);
            $item->icon = $icon;
        }

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb')->getClientOriginalName();
            $request->file('thumb')->move(public_path('ecommerce/item/image/thumb'), $thumb);
            $item->thumb = $thumb;
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('ecommerce/item/image/cover'), $cover);
            $item->cover = $cover;
        }

        if ($request->hasFile('og_image')) {
            $oGImage = $request->file('og_image')->getClientOriginalName();
            $request->file('og_image')->move(public_path('ecommerce/item/image/og'), $oGImage);
            $item->og_image = $oGImage;
        }

        if ($request->hasFile('image') || $request->hasFile('file') || $request->hasFile('icon') || $request->hasFile('thumb') || $request->hasFile('cover') || $request->hasFile('og_image')) {
            $item->save();
        }

        Session::flash('message', __('New Item Successfully Added!'));
        
        return redirect(RouteServiceProvider::EcommerceItem);
    }

    public function show(Request $itemDetail)
    {
        $items = EcommerceItem::all();

        return view('backend.ecommerce.manage-item', ['items' => $items]);
    }

    public function edit($id)
    {
        $item = EcommerceItem::findOrFail($id);
        $categories = EcommerceCategory::all();
        $subcategories = EcommerceSubcategory::all();
        $sub_subcategories = EcommerceSubSubcategory::all();
        $sellers = EcommerceSeller::all();

        return view('backend.ecommerce.edit-item', [
            'item' => $item,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sub_subcategories' => $sub_subcategories,
            'sellers' => $sellers,
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $item = EcommerceItem::find($id);

        if ($item) {

            $newImage = $request->file('image');

            if ($newImage) {
                $validatedData = $request->validate([
                    // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newImageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('ecommerce/item/image'), $newImageName);

                $item->image = $newImageName;
            }

            $newFile = $request->file('file');

            if ($newFile) {
                $validatedData = $request->validate([
                    // 'file' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newFileName = $request->file->getClientOriginalName();
                $request->file->move(public_path('ecommerce/item/file'), $newFileName);

                $item->file = $newFileName;
            }

            $newIcon = $request->file('icon');

            if ($newIcon) {
                $validatedData = $request->validate([
                    // 'icon' => 'icon|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newIconName = $request->icon->getClientOriginalName();
                $request->icon->move(public_path('ecommerce/item/image/icon'), $newIconName);

                $item->icon = $newIconName;
            }

            $newThumb = $request->file('thumb');

            if ($newThumb) {
                $validatedData = $request->validate([
                    // 'thumb' => 'thumb|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newThumbName = $request->thumb->getClientOriginalName();
                $request->thumb->move(public_path('ecommerce/item/image/thumb'), $newThumbName);

                $item->thumb = $newThumbName;
            }

            $newCover = $request->file('cover');

            if ($newCover) {
                $validatedData = $request->validate([
                    // 'cover' => 'cover|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newCoverName = $request->cover->getClientOriginalName();
                $request->cover->move(public_path('ecommerce/item/image/cover'), $newCoverName);

                $item->cover = $newCoverName;
            }

            $newOG = $request->file('og_image');

            if ($newOG) {
                $validatedData = $request->validate([
                    // 'og_image' => 'og|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newOGName = $request->og_image->getClientOriginalName();
                $request->og_image->move(public_path('ecommerce/item/image/og'), $newOGName);

                $item->og_image = $newOGName;
            }

            $item->name = $request->input('name');
            $item->slug = $request->input('slug');
            $item->category_name = $request->input('category_name');
            $item->subcategory_name = $request->input('subcategory_name');
            $item->sub_subcategory_name = $request->input('sub_subcategory_name');
            $item->sku = $request->input('sku');
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
            $item->img_alt_text = $request->input('img_alt_text');
            $item->icon_alt_text = $request->input('icon_alt_text');
            $item->thumb_alt_text = $request->input('thumb_alt_text');
            $item->cover_alt_text = $request->input('cover_alt_text');
            $item->og_img_alt_text = $request->input('og_img_alt_text');
            $item->youtube_iframe = $request->input('youtube_iframe');
            $item->header_content = $request->input('header_content');
            $item->meta_title = $request->input('meta_title');
            $item->meta_description = $request->input('meta_description');
            $item->facebook_meta_title = $request->input('facebook_meta_title');
            $item->facebook_meta_description = $request->input('facebook_meta_description');
            $item->twitter_meta_title = $request->input('twitter_meta_title');
            $item->twitter_meta_description = $request->input('twitter_meta_description');
            $item->live_preview_link = $request->input('live_preview_link');
            $item->admin_link = $request->input('admin_link');
            $item->downloadable_link = $request->input('downloadable_link');
            $item->order_type = $request->input('order_type');
            $item->is_featured = $request->input('is_featured');
            $item->is_index = $request->input('is_index');
            $item->is_follow = $request->input('is_follow');

            if (!is_null($request->input('status'))) {
                $item->status = $request->input('status');
            }
        
            $item->comment = $request->input('comment');

            $item->save();

        } else {
            dd();
        }

        Session::flash('update', __('Item Successfully Updated!'));
        
        return back();
    }

    public function destroy($id)
    {
        EcommerceItem::where('id',$id)->delete();

        Session::flash('delete', __('Item Successfully Deleted!'));
        
        return back();
    }
}
