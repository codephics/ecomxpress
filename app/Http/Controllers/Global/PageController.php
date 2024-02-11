<?php

namespace App\Http\Controllers\Blog;
namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;


use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogSubcategory;
use App\Models\Blog\BlogSubSubcategory;

use App\Models\Global\Page;
use App\Models\Global\Setting;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;

class PageController extends Controller
{
    public function index($slug)
    {
        // $page = Page::all();
        // $setting = Setting::all();
        // $pageContent = Page::where('slug', $slug)->firstOrFail();

        // return view('frontend.blog.skeleton.body', [
        //     'page' => $page,
        //     'setting' => $setting,
        //     'pageContent' => $pageContent
        // ]);

        Session::flash('message', __('Something Wrong!'));
    }
    
    public function homepage()
    {
        $page = Page::where('slug', 'homepage')->firstOrFail();
        $setting = Setting::first();
        $blogs = Blog::take(36)->get();

        return view('frontend.skeleton.content', [
            'page' => $page,
            'setting' => $setting,
            'blogs' => $blogs
        ]);
    }

    public function blogs()
    {
        $page = Page::where('slug', 'more-blogs')->firstOrFail();
        $setting = Setting::first();
        $blogs = Blog::all();

        return view('frontend.blog.more', [
            'page' => $page,
            'setting' => $setting,
            'blogs' => $blogs
        ]);
    }

    public function detail($slug)
    {
        $page = Blog::where('slug', $slug)->firstOrFail();
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $setting = Setting::first();
        $relatedBlog = Blog::take(4)->get();

        return view('frontend.blog.detail', [
            'page' => $page,
            'blog' => $blog,
            'setting' => $setting,
            'relatedBlog' => $relatedBlog
        ]);
    }
    
    public function privacy()
    {
        $page = Page::where('slug', 'privacy-policy')->firstOrFail();
        $setting = Setting::first();
        
        return view('frontend.global.privacy-policy', [
            'page' => $page,
            'setting' => $setting,
        ]);
    }
    
    public function terms()
    {
        $page = Page::where('slug', 'terms-of-service')->firstOrFail();
        $setting = Setting::first();
        
        return view('frontend.global.terms-of-service', [
            'page' => $page,
            'setting' => $setting,
        ]);
    }
    
    public function license()
    {
        $page = Page::where('slug', 'license')->firstOrFail();
        $setting = Setting::first();
        
        return view('frontend.global.license', [
            'page' => $page,
            'setting' => $setting,
        ]);
    }
    
    public function error404()
    {
        $page = Page::where('slug', '404')->firstOrFail();
        $setting = Setting::first();
        
        return view('frontend.global.404', [
            'page' => $page,
            'setting' => $setting,
        ]);
    }

    public function create(Request $request)
    {
        return view('backend.global.page.new-page');
    }

    public function store(Request $request): RedirectResponse
    {
        $keywords = implode(', ', $request->keywords);
        
        $page = Page::create([
            'name' => $request->name,
            'title' => $request->title,
            'slug' => $request->slug,
            'keywords' => $keywords,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
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

        $page->save();

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('global/page/image/icon'), $icon);
            $page->icon = $icon;
        }

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb')->getClientOriginalName();
            $request->file('thumb')->move(public_path('global/page/image/thumb'), $thumb);
            $page->thumb = $thumb;
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('global/page/image/cover'), $cover);
            $page->cover = $cover;
        }

        if ($request->hasFile('og_image')) {
            $oGImage = $request->file('og_image')->getClientOriginalName();
            $request->file('og_image')->move(public_path('global/page/image/og'), $oGImage);
            $page->og_image = $oGImage;
        }

        if ($request->hasFile('icon') || $request->hasFile('thumb') || $request->hasFile('cover') || $request->hasFile('og_image')) {
            $page->save();
        }

        Session::flash('message', __('New Page Successfully Created!'));
        
        return redirect(RouteServiceProvider::ManagePages);
    }

    public function show(Request $request)
    {            
        $pages = Page::all();
        
        return view('backend.global.page.manage-pages', ['pages' => $pages]);
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $categories = BlogCategory::all();
        $subcategories = BlogSubcategory::all();
        $sub_subcategories = BlogSubSubcategory::all();
        
        return view('backend.global.page.edit-page', [
            'page' => $page,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sub_subcategories' => $sub_subcategories,
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $page = Page::find($id);

        if ($page) {

            $newIcon = $request->file('icon');

            if ($newIcon) {
                $validatedData = $request->validate([
                    // 'icon' => 'icon|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newIconName = $request->icon->getClientOriginalName();
                $request->icon->move(public_path('global/page/image/icon'), $newIconName);

                $page->icon = $newIconName;
            }

            $newThumb = $request->file('thumb');

            if ($newThumb) {
                $validatedData = $request->validate([
                    // 'thumb' => 'thumb|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newThumbName = $request->thumb->getClientOriginalName();
                $request->thumb->move(public_path('global/page/image/thumb'), $newThumbName);

                $page->thumb = $newThumbName;
            }

            $newCover = $request->file('cover');

            if ($newCover) {
                $validatedData = $request->validate([
                    // 'cover' => 'cover|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newCoverName = $request->cover->getClientOriginalName();
                $request->cover->move(public_path('global/page/image/cover'), $newCoverName);

                $page->cover = $newCoverName;
            }

            $newOG = $request->file('og_image');

            if ($newOG) {
                $validatedData = $request->validate([
                    // 'og_image' => 'og|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $newOGName = $request->og_image->getClientOriginalName();
                $request->og_image->move(public_path('global/page/image/og'), $newOGName);

                $page->og_image = $newOGName;
            }

            $keywords = implode(', ', (array) $request->keywords);

            $page->name = $request->input('name');
            $page->title = $request->input('title');
            $page->slug = $request->input('slug');            
            $page->keywords = $keywords;
            $page->short_description = $request->input('short_description');
            $page->long_description = $request->input('long_description');
            $page->youtube_iframe = $request->input('youtube_iframe');
            $page->header_content = $request->input('header_content');
            $page->meta_title = $request->input('meta_title');
            $page->meta_description = $request->input('meta_description');
            $page->facebook_meta_title = $request->input('facebook_meta_title');
            $page->facebook_meta_description = $request->input('facebook_meta_description');
            $page->twitter_meta_title = $request->input('twitter_meta_title');
            $page->twitter_meta_description = $request->input('twitter_meta_description');
            $page->icon_alt_text = $request->input('icon_alt_text');
            $page->thumb_alt_text = $request->input('thumb_alt_text');
            $page->cover_alt_text = $request->input('cover_alt_text');
            $page->og_img_alt_text = $request->input('og_img_alt_text');
            $page->is_index = $request->input('is_index');
            $page->is_follow = $request->input('is_follow');
            $page->is_featured = $request->input('is_featured');

            if (!is_null($request->input('status'))) {
                $page->status = $request->input('status');
            }
            
            $page->comment = $request->input('comment');

            $page->save();

        } else {
            
            Session::flash('update', __('There is a problem!'));

            return redirect()->back();
        }

        Session::flash('update', __('Page Successfully Updated!'));
        
        return redirect(RouteServiceProvider::ManagePages);
    }

    public function destroy(Request $request, $id)
    {
        Page::where('id',$id)->delete();

        Session::flash('delete', __('Congratulations! The page deletion operation has been successfully executed.'));
        
        return back();
    }
}
