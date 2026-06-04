@extends('admin.layout.app')
@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="text-lg font-semibold text-gray-900">Website Settings</h5>
        </div>
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="admin-card-body">
                <div class="flex border-b border-gray-200 gap-0" id="settingsTabs">
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-brand-500 text-brand-600 settings-tab active" data-tab="general" role="tab" aria-selected="true">General</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 settings-tab" data-tab="contact" role="tab" aria-selected="false">Contact Info</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 settings-tab" data-tab="social" role="tab" aria-selected="false">Social Media</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 settings-tab" data-tab="logos" role="tab" aria-selected="false">Logos</a>
                </div>
                <div class="mt-5">
                    <div class="settings-panel block" id="general" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Website Name</label></div>
                            <div class="md:col-span-3"><input type="text" name="website_name" class="admin-input" value="{{ get_setting('website_name') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Site Motto</label></div>
                            <div class="md:col-span-3"><input type="text" name="site_motto" class="admin-input" value="{{ get_setting('site_motto') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Google Maps Embed URL</label></div>
                            <div class="md:col-span-3"><textarea name="google_maps_embed" class="admin-textarea" rows="3">{{ get_setting('google_maps_embed') }}</textarea></div>
                        </div>
                    </div>
                    <div class="settings-panel hidden" id="contact" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Phone Number</label></div>
                            <div class="md:col-span-3"><input type="text" name="contact_phone" class="admin-input" value="{{ get_setting('contact_phone') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Email Address</label></div>
                            <div class="md:col-span-3"><input type="email" name="contact_email" class="admin-input" value="{{ get_setting('contact_email') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Address</label></div>
                            <div class="md:col-span-3"><textarea name="contact_address" class="admin-textarea" rows="2">{{ get_setting('contact_address') }}</textarea></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Working Hours</label></div>
                            <div class="md:col-span-3"><input type="text" name="contact_hours" class="admin-input" value="{{ get_setting('contact_hours') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">ABN Number</label></div>
                            <div class="md:col-span-3"><input type="text" name="contact_abn" class="admin-input" value="{{ get_setting('contact_abn') }}"></div>
                        </div>
                    </div>
                    <div class="settings-panel hidden" id="social" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Facebook URL</label></div>
                            <div class="md:col-span-3"><input type="url" name="social_facebook" class="admin-input" value="{{ get_setting('social_facebook') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Instagram URL</label></div>
                            <div class="md:col-span-3"><input type="url" name="social_instagram" class="admin-input" value="{{ get_setting('social_instagram') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Twitter URL</label></div>
                            <div class="md:col-span-3"><input type="url" name="social_twitter" class="admin-input" value="{{ get_setting('social_twitter') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">LinkedIn URL</label></div>
                            <div class="md:col-span-3"><input type="url" name="social_linkedin" class="admin-input" value="{{ get_setting('social_linkedin') }}"></div>
                        </div>
                    </div>

                    <div class="settings-panel hidden" id="logos" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Site Logo</label></div>
                            <div class="md:col-span-3"><x-file-upload name="site_logo" label="Upload Logo" :current="get_setting('site_logo')" /></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Logo (White)</label></div>
                            <div class="md:col-span-3"><x-file-upload name="system_logo_white" label="Upload Logo (White)" :current="get_setting('system_logo_white')" /></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Logo (Black)</label></div>
                            <div class="md:col-span-3"><x-file-upload name="system_logo_black" label="Upload Logo (Black)" :current="get_setting('system_logo_black')" /></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Login Page Image</label></div>
                            <div class="md:col-span-3"><x-file-upload name="login_page_image" label="Upload Image" :current="get_setting('login_page_image')" /></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Login Background</label></div>
                            <div class="md:col-span-3"><x-file-upload name="login_bg_image" label="Upload Background" :current="get_setting('login_bg_image')" /></div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="admin-btn-primary">Save Settings</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
$(function () {
    $('.settings-tab').on('click', function () {
        var tab = $(this).data('tab');
        $('.settings-tab').removeClass('border-brand-500 text-brand-600').addClass('border-transparent text-gray-500');
        $(this).addClass('border-brand-500 text-brand-600').removeClass('border-transparent text-gray-500');
        $('.settings-panel').addClass('hidden').removeClass('block');
        $('#' + tab).removeClass('hidden').addClass('block');
    });
});
</script>
@endsection
