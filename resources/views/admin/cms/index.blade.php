@extends('admin.layout.app')
@section('title', 'CMS Pages')
@section('content')

<div class="space-y-6 max-w-4xl mx-auto">
    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="text-lg font-semibold text-gray-900">CMS Pages</h5>
        </div>
        <form action="{{ route('admin.cms.update') }}" method="POST">
            @csrf
            <div class="admin-card-body">
                <div class="flex border-b border-gray-200 gap-0" id="cmsTabs">
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-brand-500 text-brand-600 cms-tab active" data-tab="home" role="tab">Home</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 cms-tab" data-tab="services" role="tab">Services</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 cms-tab" data-tab="gallery" role="tab">Gallery</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 cms-tab" data-tab="testimonials" role="tab">Testimonials</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 cms-tab" data-tab="contact" role="tab">Contact</a>
                    <a class="px-4 py-2.5 text-sm font-medium border-b-2 -mb-px border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 cms-tab" data-tab="faq" role="tab">FAQ</a>
                </div>
                <div class="mt-5">
                    <div class="cms-panel block" id="home" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Page Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_home_title" class="admin-input" value="{{ get_setting('cms_home_title', 'Home') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Heading</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_home_heading" class="admin-input" value="{{ get_setting('cms_home_heading', 'Welcome to RoofShelter') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Meta Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_home_meta_desc" class="admin-textarea" rows="3">{{ get_setting('cms_home_meta_desc') }}</textarea></div>
                        </div>
                    </div>
                    <div class="cms-panel hidden" id="services" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Page Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_services_title" class="admin-input" value="{{ get_setting('cms_services_title', 'Our Services') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Heading</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_services_heading" class="admin-input" value="{{ get_setting('cms_services_heading', 'Our Services') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_services_description" class="admin-textarea" rows="3">{{ get_setting('cms_services_description') }}</textarea></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Meta Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_services_meta_desc" class="admin-textarea" rows="3">{{ get_setting('cms_services_meta_desc') }}</textarea></div>
                        </div>
                    </div>
                    <div class="cms-panel hidden" id="gallery" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Page Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_gallery_title" class="admin-input" value="{{ get_setting('cms_gallery_title', 'Gallery') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Heading</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_gallery_heading" class="admin-input" value="{{ get_setting('cms_gallery_heading', 'Our Gallery') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_gallery_description" class="admin-textarea" rows="3">{{ get_setting('cms_gallery_description') }}</textarea></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Meta Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_gallery_meta_desc" class="admin-textarea" rows="3">{{ get_setting('cms_gallery_meta_desc') }}</textarea></div>
                        </div>
                    </div>
                    <div class="cms-panel hidden" id="testimonials" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Page Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_testimonials_title" class="admin-input" value="{{ get_setting('cms_testimonials_title', 'Testimonials') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Heading</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_testimonials_heading" class="admin-input" value="{{ get_setting('cms_testimonials_heading', 'What Our Clients Say') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_testimonials_description" class="admin-textarea" rows="3">{{ get_setting('cms_testimonials_description') }}</textarea></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Meta Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_testimonials_meta_desc" class="admin-textarea" rows="3">{{ get_setting('cms_testimonials_meta_desc') }}</textarea></div>
                        </div>
                    </div>
                    <div class="cms-panel hidden" id="contact" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Page Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_contact_title" class="admin-input" value="{{ get_setting('cms_contact_title', 'Contact Us') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Heading</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_contact_heading" class="admin-input" value="{{ get_setting('cms_contact_heading', 'Get In Touch') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_contact_description" class="admin-textarea" rows="3">{{ get_setting('cms_contact_description') }}</textarea></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Meta Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_contact_meta_desc" class="admin-textarea" rows="3">{{ get_setting('cms_contact_meta_desc') }}</textarea></div>
                        </div>
                    </div>
                    <div class="cms-panel hidden" id="faq" role="tabpanel">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Page Title</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_faq_title" class="admin-input" value="{{ get_setting('cms_faq_title', 'FAQ') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Heading</label></div>
                            <div class="md:col-span-3"><input type="text" name="cms_faq_heading" class="admin-input" value="{{ get_setting('cms_faq_heading', 'Frequently Asked Questions') }}"></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Banner Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_faq_description" class="admin-textarea" rows="3">{{ get_setting('cms_faq_description') }}</textarea></div>
                            <div class="md:col-span-1"><label class="block text-sm font-medium text-gray-700">Meta Description</label></div>
                            <div class="md:col-span-3"><textarea name="cms_faq_meta_desc" class="admin-textarea" rows="3">{{ get_setting('cms_faq_meta_desc') }}</textarea></div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="admin-btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
$(function () {
    $('.cms-tab').on('click', function () {
        var tab = $(this).data('tab');
        $('.cms-tab').removeClass('border-brand-500 text-brand-600').addClass('border-transparent text-gray-500');
        $(this).addClass('border-brand-500 text-brand-600').removeClass('border-transparent text-gray-500');
        $('.cms-panel').addClass('hidden').removeClass('block');
        $('#' + tab).removeClass('hidden').addClass('block');
    });
});
</script>
@endsection
