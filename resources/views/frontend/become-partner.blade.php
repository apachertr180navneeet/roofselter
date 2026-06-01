@extends('frontend.layout.app')
@section('meta_title', 'Become a Partner | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Partner with us to grow your roofing business.')
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 50% 50%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">Become a Partner</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">Become a Partner</span>
        </div>
    </div>
</section>

<section class="section-padding bg-gray-50">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-10 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Partner With Us //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">Partner Registration</h2>
            <p class="text-gray-500 mt-3">Fill out the form below to apply as a partner. We'll review your application and get back to you.</p>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 animate-on-scroll">
            <form id="partnerForm">
                @csrf
                <div style="position:absolute;left:-9999px;"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
                <input type="hidden" name="_form_token" value="{{ encrypt(time()) }}">
                <div class="space-y-4">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-navy-800 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="fullname" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-navy-800 mb-1.5">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all" required>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-navy-800 mb-1.5">Phone <span class="text-red-500">*</span></label>
                            <input type="text" name="phone" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-navy-800 mb-1.5">Website</label>
                            <input type="url" name="website" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all" placeholder="https://">
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-navy-800 mb-1.5">Designation <span class="text-red-500">*</span></label>
                            <input type="text" name="designation" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-navy-800 mb-1.5">State <span class="text-red-500">*</span></label>
                            <input type="text" name="state" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-navy-800 mb-1.5">City <span class="text-red-500">*</span></label>
                        <input type="text" name="city" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all" required>
                    </div>
                    <div class="flex items-start gap-2">
                        <input type="checkbox" name="agree" id="agreeCheck" class="mt-1 rounded border-gray-300 text-brand-500 focus:ring-brand-500" required>
                        <label for="agreeCheck" class="text-sm text-gray-600">I agree to the terms and conditions <span class="text-red-500">*</span></label>
                    </div>
                    <button type="submit" class="w-full px-6 py-3 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-xl transition-all duration-300">Submit Application</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('script')
<script>
    $('#partnerForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $(this).find('button[type="submit"]');
        btn.prop('disabled', true).text('Submitting...');
        $.ajax({
            url: '{{ route("become-partner.store") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(res) {
                alert(res.message);
                $('#partnerForm')[0].reset();
            },
            error: function(xhr) {
                var errs = xhr.responseJSON.errors;
                var msg = '';
                $.each(errs, function(k, v) { msg += v[0] + '\n'; });
                alert(msg);
            },
            complete: function() {
                btn.prop('disabled', false).text('Submit Application');
            }
        });
    });
</script>
@endpush
