@extends('backend.layout.app')
@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="text-lg font-semibold text-gray-900">Website Settings</h5>
        </div>
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="admin-card-body">
                <div class="flex border-b border-gray-200 gap-0" id="settingsTabs" role="tablist">
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-brand-500 text-brand-600" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-selected="true">General</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-selected="false">Contact Info</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" id="social-tab" data-bs-toggle="tab" href="#social" role="tab" aria-selected="false">Social Media</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" id="content-tab" data-bs-toggle="tab" href="#content-sections" role="tab" aria-selected="false">Content Sections</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" id="counters-tab" data-bs-toggle="tab" href="#counters" role="tab" aria-selected="false">Counters</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" id="logos-tab" data-bs-toggle="tab" href="#logos" role="tab" aria-selected="false">Logos</a>
                </div>
                <div class="mt-5">
                    <div class="block" id="general" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Website Name</label></div>
                            <div class="md:col-span-3"><input type="text" name="website_name" class="admin-input" value="{{ get_setting('website_name') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Site Motto</label></div>
                            <div class="md:col-span-3"><input type="text" name="site_motto" class="admin-input" value="{{ get_setting('site_motto') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Google Maps Embed URL</label></div>
                            <div class="md:col-span-3"><textarea name="google_maps_embed" class="admin-textarea" rows="3">{{ get_setting('google_maps_embed') }}</textarea></div>
                        </div>
                    </div>
                    <div class="hidden" id="contact" role="tabpanel">
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
                    <div class="hidden" id="social" role="tabpanel">
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
                    <div class="hidden" id="content-sections" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">About Section Tagline</label></div>
                            <div class="md:col-span-3"><input type="text" name="about_section_tagline" class="admin-input" value="{{ get_setting('about_section_tagline', 'About Us') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">About Section Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="about_section_title" class="admin-input" value="{{ get_setting('about_section_title', 'About Our Company') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">About Page Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="about_title" class="admin-input" value="{{ get_setting('about_title', 'Welcome to RoofShelter') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">About Page Description</label></div>
                            <div class="md:col-span-3"><textarea name="about_description" class="admin-textarea" rows="4">{{ get_setting('about_description') }}</textarea></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Team Section Tagline</label></div>
                            <div class="md:col-span-3"><input type="text" name="team_section_tagline" class="admin-input" value="{{ get_setting('team_section_tagline', 'Our Team') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Team Section Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="team_section_title" class="admin-input" value="{{ get_setting('team_section_title', 'Meet Our Expert Team') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">FAQ Section Tagline</label></div>
                            <div class="md:col-span-3"><input type="text" name="faq_section_tagline" class="admin-input" value="{{ get_setting('faq_section_tagline', 'FAQ') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">FAQ Section Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="faq_section_title" class="admin-input" value="{{ get_setting('faq_section_title', 'Do You Have Any Question Please?') }}"></div>
                        </div>
                    </div>
                    <div class="hidden" id="counters" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Projects Completed</label></div>
                            <div class="md:col-span-3"><input type="number" name="counter_projects" class="admin-input" value="{{ get_setting('counter_projects', '450') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Satisfied Clients</label></div>
                            <div class="md:col-span-3"><input type="number" name="counter_clients" class="admin-input" value="{{ get_setting('counter_clients', '370') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Team Members</label></div>
                            <div class="md:col-span-3"><input type="number" name="counter_team" class="admin-input" value="{{ get_setting('counter_team', '100') }}"></div>

                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Years Experience</label></div>
                            <div class="md:col-span-3"><input type="number" name="counter_years" class="admin-input" value="{{ get_setting('counter_years', '10') }}"></div>
                        </div>
                    </div>
                    <div class="hidden" id="logos" role="tabpanel">
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
