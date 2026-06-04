<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('auth.admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $fields = [
            'website_name',
            'site_motto',
            'site_logo',
            'system_logo_white',
            'system_logo_black',
            'login_page_image',
            'login_bg_image',
            'contact_phone',
            'contact_email',
            'contact_address',
            'contact_hours',
            'contact_abn',
            'social_facebook',
            'social_instagram',
            'social_twitter',
            'social_linkedin',
            'google_maps_embed',
        ];

        foreach ($fields as $field) {
            if ($request->input('remove_' . $field) == "1") {
                $old = Setting::where('key', $field)->first();
                if ($old && $old->value && file_exists(public_path($old->value))) {
                    unlink(public_path($old->value));
                }
                Setting::updateOrCreate(
                    ['key' => $field],
                    ['value' => null]
                );
                continue;
            }

            if ($request->hasFile($field)) {
                $old = Setting::where('key', $field)->first();
                if ($old && $old->value && file_exists(public_path($old->value))) {
                    unlink(public_path($old->value));
                }
                $file = $request->file($field);
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/'), $filename);
                Setting::updateOrCreate(
                    ['key' => $field],
                    ['value' =>  $filename]
                );
            } elseif ($request->filled($field)) {
                Setting::updateOrCreate(
                    ['key' => $field],
                    ['value' => $request->$field]
                );
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    public function cms()
    {
        return view('admin.cms.index');
    }

    public function cmsUpdate(Request $request)
    {
        $fields = [
            'cms_home_title', 'cms_home_heading', 'cms_home_meta_desc', 'cms_home_meta_title', 'cms_home_meta_keywords',
            'cms_services_title', 'cms_services_heading', 'cms_services_description', 'cms_services_meta_desc', 'cms_services_meta_title', 'cms_services_meta_keywords',
            'cms_gallery_title', 'cms_gallery_heading', 'cms_gallery_description', 'cms_gallery_meta_desc', 'cms_gallery_meta_title', 'cms_gallery_meta_keywords',
            'cms_testimonials_title', 'cms_testimonials_heading', 'cms_testimonials_description', 'cms_testimonials_meta_desc', 'cms_testimonials_meta_title', 'cms_testimonials_meta_keywords',
            'cms_contact_title', 'cms_contact_heading', 'cms_contact_description', 'cms_contact_meta_desc', 'cms_contact_meta_title', 'cms_contact_meta_keywords',
            'cms_faq_title', 'cms_faq_heading', 'cms_faq_description', 'cms_faq_meta_desc', 'cms_faq_meta_title', 'cms_faq_meta_keywords',
        ];

        foreach ($fields as $field) {
            if ($request->filled($field)) {
                Setting::updateOrCreate(
                    ['key' => $field],
                    ['value' => $request->$field]
                );
            }
        }

        return redirect()->back()->with('success', 'CMS pages updated successfully!');
    }
}
