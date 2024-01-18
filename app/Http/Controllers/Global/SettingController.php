<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;

use App\Models\Global\Setting;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;

class SettingController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $setting = Setting::create([
            'title' => $request->title,
            'tagline' => $request->tagline,
            'about_in_short' => $request->about_in_short,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'instagram_url' => $request->instagram_url,
            'linkedIn_url' => $request->linkedIn_url,
            'pinterest_url' => $request->pinterest_url,
            'reddit_url' => $request->reddit_url,
            'tiktok_url' => $request->tiktok_url,
            'whatsapp_url' => $request->whatsapp_url,
            'youtube_url' => $request->youtube_url,
            'quora_url' => $request->quora_url,
            'snapchat_url' => $request->snapchat_url,
            'telegram_url' => $request->telegram_url,
            'tumblr_url' => $request->tumblr_url,
            'wechat_url' => $request->wechat_url,
            'favicon_alt_text' => $request->favicon_alt_text,
            'favicon_apple_alt_text' => $request->favicon_apple_alt_text,
            'favicon_32_alt_text' => $request->favicon_32_alt_text,
            'favicon_16_alt_text' => $request->favicon_16_alt_text,
            'logo_alt_text' => $request->logo_alt_text,
            'og_img_alt_text' => $request->og_img_alt_text,
            'is_index' => $request->is_index,
            'is_follow' => $request->is_follow,
            'comment' => $request->comment,
        ]);

        $setting->save();

        if ($request->hasFile('favicon')) {
            $faviconName = $request->file('favicon')->getClientOriginalName();
            $request->file('favicon')->move(public_path('blog/image/setting'), $faviconName);
            $setting->favicon = $faviconName;
        }

        if ($request->hasFile('favicon_apple')) {
            $faviconAppleName = $request->file('favicon_apple')->getClientOriginalName();
            $request->file('favicon_apple')->move(public_path('blog/image/setting'), $faviconAppleName);
            $setting->favicon_apple = $faviconAppleName;
        }

        if ($request->hasFile('favicon_32')) {
            $favicon32Name = $request->file('favicon_32')->getClientOriginalName();
            $request->file('favicon_32')->move(public_path('blog/image/setting'), $favicon32Name);
            $setting->favicon_32 = $favicon32Name;
        }

        if ($request->hasFile('favicon_16')) {
            $favicon16Name = $request->file('favicon_16')->getClientOriginalName();
            $request->file('favicon_16')->move(public_path('blog/image/setting'), $favicon16Name);
            $setting->favicon_16 = $favicon16Name;
        }

        if ($request->hasFile('logo')) {
            $logoName = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('blog/image/setting'), $logoName);
            $setting->logo = $logoName;
        }

        if ($request->hasFile('og_image')) {
            $oGImage = $request->file('og_image')->getClientOriginalName();
            $request->file('og_image')->move(public_path('blog/image/setting'), $oGImage);
            $setting->og_image = $oGImage;
        }

        if ($request->hasFile('favicon') || $request->hasFile('favicon_apple') || $request->hasFile('favicon_32') || $request->hasFile('favicon_16') || $request->hasFile('logo') || $request->hasFile('cover_image') || $request->hasFile('og_image')) {
            $setting->save();
        }

        Session::flash('message', __('Setting Successfully Updated!'));
        
        return redirect(RouteServiceProvider::Setting);
    }

    public function edit()
    {
        $page = Setting::first();

        return view('backend.blog.setting.edit', ['page' => $page]);
    }

    public function update(Request $request): RedirectResponse
    {
        $setting = Setting::first();

        if ($setting) {
            $favicon = $request->file('favicon');

            if ($favicon) {

                $faviconName = $request->favicon->getClientOriginalName();
                $request->favicon->move(public_path('blog/image/setting'), $faviconName);

                $setting->favicon = $faviconName;
            }

            $favicon_apple = $request->file('favicon_apple');

            if ($favicon_apple) {

                $faviconAppleName = $request->favicon_apple->getClientOriginalName();
                $request->favicon_apple->move(public_path('blog/image/setting'), $faviconAppleName);

                $setting->favicon_apple = $faviconAppleName;
            }

            $favicon_32 = $request->file('favicon_32');

            if ($favicon_32) {

                $favicon32Name = $request->favicon_32->getClientOriginalName();
                $request->favicon_32->move(public_path('blog/image/setting'), $favicon32Name);

                $setting->favicon_32 = $favicon32Name;
            }

            $favicon_16 = $request->file('favicon_16');

            if ($favicon_16) {

                $favicon16Name = $request->favicon_16->getClientOriginalName();
                $request->favicon_16->move(public_path('blog/image/setting'), $favicon16Name);

                $setting->favicon_16 = $favicon16Name;
            }

            $logo = $request->file('logo');

            if ($logo) {

                $logoName = $request->logo->getClientOriginalName();
                $request->logo->move(public_path('blog/image/setting'), $logoName);

                $setting->logo = $logoName;
            }

            $og = $request->file('og_image');

            if ($og) {

                $ogImageName = $request->og_image->getClientOriginalName();
                $request->og_image->move(public_path('blog/image/setting'), $ogImageName);

                $setting->og_image = $ogImageName;
            }

            $setting->title = $request->input('title');
            $setting->tagline = $request->input('tagline');
            $setting->about_in_short = $request->input('about_in_short');
            $setting->facebook_url = $request->input('facebook_url');
            $setting->twitter_url = $request->input('twitter_url');
            $setting->instagram_url = $request->input('instagram_url');
            $setting->linkedIn_url = $request->input('linkedIn_url');
            $setting->pinterest_url = $request->input('pinterest_url');
            $setting->reddit_url = $request->input('reddit_url');
            $setting->tiktok_url = $request->input('tiktok_url');
            $setting->whatsapp_url = $request->input('whatsapp_url');
            $setting->youtube_url = $request->input('youtube_url');
            $setting->quora_url = $request->input('quora_url');
            $setting->snapchat_url = $request->input('snapchat_url');
            $setting->telegram_url = $request->input('telegram_url');
            $setting->tumblr_url = $request->input('tumblr_url');
            $setting->wechat_url = $request->input('wechat_url');
            $setting->favicon_alt_text = $request->input('favicon_alt_text');
            $setting->favicon_apple_alt_text = $request->input('favicon_apple_alt_text');
            $setting->favicon_32_alt_text = $request->input('favicon_32_alt_text');
            $setting->favicon_16_alt_text = $request->input('favicon_16_alt_text');
            $setting->logo_alt_text = $request->input('logo_alt_text');
            $setting->og_img_alt_text = $request->input('og_img_alt_text');
            $setting->is_index = $request->input('is_index');
            $setting->is_follow = $request->input('is_follow');
            
            $setting->comment = $request->input('comment');

            $setting->save();

        } else {

            Session::flash('update', __('There is a problem!'));

            return redirect()->back();
        }

        Session::flash('update', __('Settings Successfully Updated!'));
        
        return redirect(RouteServiceProvider::Setting);
    }
}
