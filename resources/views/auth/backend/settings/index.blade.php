@extends('backend.layout.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Website Settings</div>
                    </div>
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general">General</a></li>
                                <li class="nav-item"><a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact">Contact Info</a></li>
                                <li class="nav-item"><a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social">Social Media</a></li>
                                <li class="nav-item"><a class="nav-link" id="content-tab" data-bs-toggle="tab" href="#content-sections">Content Sections</a></li>
                                <li class="nav-item"><a class="nav-link" id="counters-tab" data-bs-toggle="tab" href="#counters">Counters</a></li>
                                <li class="nav-item"><a class="nav-link" id="logos-tab" data-bs-toggle="tab" href="#logos">Logos</a></li>
                            </ul>
                            <div class="tab-content mt-3">
                                <div class="tab-pane fade show active" id="general">
                                    <div class="form-group row">
                                        <div class="col-md-3"><label>Website Name</label></div>
                                        <div class="col-md-9"><input type="text" name="website_name" class="form-control" value="{{ get_setting('website_name') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Site Motto</label></div>
                                        <div class="col-md-9"><input type="text" name="site_motto" class="form-control" value="{{ get_setting('site_motto') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Google Maps Embed URL</label></div>
                                        <div class="col-md-9"><textarea name="google_maps_embed" class="form-control" rows="3">{{ get_setting('google_maps_embed') }}</textarea></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact">
                                    <div class="form-group row">
                                        <div class="col-md-3"><label>Phone Number</label></div>
                                        <div class="col-md-9"><input type="text" name="contact_phone" class="form-control" value="{{ get_setting('contact_phone') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Email Address</label></div>
                                        <div class="col-md-9"><input type="email" name="contact_email" class="form-control" value="{{ get_setting('contact_email') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Address</label></div>
                                        <div class="col-md-9"><textarea name="contact_address" class="form-control" rows="2">{{ get_setting('contact_address') }}</textarea></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Working Hours</label></div>
                                        <div class="col-md-9"><input type="text" name="contact_hours" class="form-control" value="{{ get_setting('contact_hours') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>ABN Number</label></div>
                                        <div class="col-md-9"><input type="text" name="contact_abn" class="form-control" value="{{ get_setting('contact_abn') }}"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="social">
                                    <div class="form-group row">
                                        <div class="col-md-3"><label>Facebook URL</label></div>
                                        <div class="col-md-9"><input type="url" name="social_facebook" class="form-control" value="{{ get_setting('social_facebook') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Instagram URL</label></div>
                                        <div class="col-md-9"><input type="url" name="social_instagram" class="form-control" value="{{ get_setting('social_instagram') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Twitter URL</label></div>
                                        <div class="col-md-9"><input type="url" name="social_twitter" class="form-control" value="{{ get_setting('social_twitter') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>LinkedIn URL</label></div>
                                        <div class="col-md-9"><input type="url" name="social_linkedin" class="form-control" value="{{ get_setting('social_linkedin') }}"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="content-sections">
                                    <div class="form-group row">
                                        <div class="col-md-3"><label>About Section Tagline</label></div>
                                        <div class="col-md-9"><input type="text" name="about_section_tagline" class="form-control" value="{{ get_setting('about_section_tagline', 'About Us') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>About Section Title</label></div>
                                        <div class="col-md-9"><input type="text" name="about_section_title" class="form-control" value="{{ get_setting('about_section_title', 'About Our Company') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>About Page Title</label></div>
                                        <div class="col-md-9"><input type="text" name="about_title" class="form-control" value="{{ get_setting('about_title', 'Welcome to RoofShelter') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>About Page Description</label></div>
                                        <div class="col-md-9"><textarea name="about_description" class="form-control" rows="4">{{ get_setting('about_description') }}</textarea></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Team Section Tagline</label></div>
                                        <div class="col-md-9"><input type="text" name="team_section_tagline" class="form-control" value="{{ get_setting('team_section_tagline', 'Our Team') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Team Section Title</label></div>
                                        <div class="col-md-9"><input type="text" name="team_section_title" class="form-control" value="{{ get_setting('team_section_title', 'Meet Our Expert Team') }}"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="counters">
                                    <div class="form-group row">
                                        <div class="col-md-3"><label>Projects Completed</label></div>
                                        <div class="col-md-9"><input type="number" name="counter_projects" class="form-control" value="{{ get_setting('counter_projects', '450') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Satisfied Clients</label></div>
                                        <div class="col-md-9"><input type="number" name="counter_clients" class="form-control" value="{{ get_setting('counter_clients', '370') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Team Members</label></div>
                                        <div class="col-md-9"><input type="number" name="counter_team" class="form-control" value="{{ get_setting('counter_team', '100') }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Years Experience</label></div>
                                        <div class="col-md-9"><input type="number" name="counter_years" class="form-control" value="{{ get_setting('counter_years', '10') }}"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="logos">
                                    <div class="form-group row">
                                        <div class="col-md-3"><label>Site Logo</label></div>
                                        <div class="col-md-9"><x-file-upload name="site_logo" label="Upload Logo" :current="get_setting('site_logo')" /></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Logo (White)</label></div>
                                        <div class="col-md-9"><x-file-upload name="system_logo_white" label="Upload Logo (White)" :current="get_setting('system_logo_white')" /></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Logo (Black)</label></div>
                                        <div class="col-md-9"><x-file-upload name="system_logo_black" label="Upload Logo (Black)" :current="get_setting('system_logo_black')" /></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Login Page Image</label></div>
                                        <div class="col-md-9"><x-file-upload name="login_page_image" label="Upload Image" :current="get_setting('login_page_image')" /></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Login Background</label></div>
                                        <div class="col-md-9"><x-file-upload name="login_bg_image" label="Upload Background" :current="get_setting('login_bg_image')" /></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-success">Save Settings</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
