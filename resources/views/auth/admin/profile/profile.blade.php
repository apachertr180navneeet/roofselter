@extends('admin.layout.app')
@section('title', 'Profile')
@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="admin-card overflow-hidden">
        <div class="bg-gradient-to-r from-brand-600 to-brand-800 px-6 py-8 text-center">
            <div class="relative inline-block">
                <img src="{{ asset('img/'.($profile->image ?? 'default-avatar.png')) }}"
                     alt="Profile"
                     class="w-16 h-16 rounded-full border-4 border-white/60 object-cover mx-auto shadow-lg">
            </div>
            <h2 class="text-xl font-bold text-white mt-3">{{ $profile->name }}</h2>
            <p class="text-brand-100 text-sm">{{ $profile->email }}</p>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-6 space-y-6">

                <div>
                    <h3 class="text-base font-semibold text-gray-900 border-b border-gray-200 pb-2 mb-4">
                        <i class="fas fa-user-circle text-brand-600 mr-2"></i>Personal Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div class="md:col-span-1 pt-2">
                            <label class="block text-sm font-medium text-gray-600">Full Name <span class="text-red-500">*</span></label>
                        </div>
                        <div class="md:col-span-4">
                            <input type="text" name="name" value="{{ old('name', $profile->name) }}"
                                class="admin-input @error('name') border-red-500 @enderror" placeholder="Enter your name">
                            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-1 pt-2">
                            <label class="block text-sm font-medium text-gray-600">Email <span class="text-red-500">*</span></label>
                        </div>
                        <div class="md:col-span-4">
                            <input type="email" name="email" value="{{ old('email', $profile->email) }}"
                                class="admin-input @error('email') border-red-500 @enderror" placeholder="Enter your email">
                            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-semibold text-gray-900 border-b border-gray-200 pb-2 mb-4">
                        <i class="fas fa-lock text-brand-600 mr-2"></i>Change Password
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div class="md:col-span-1 pt-2">
                            <label class="block text-sm font-medium text-gray-600">Current Password</label>
                        </div>
                        <div class="md:col-span-4">
                            <input type="password" name="old_password"
                                class="admin-input @error('old_password') border-red-500 @enderror"
                                placeholder="Enter current password">
                            @error('old_password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-1 pt-2">
                            <label class="block text-sm font-medium text-gray-600">New Password</label>
                        </div>
                        <div class="md:col-span-4">
                            <input type="password" name="new_password"
                                class="admin-input @error('new_password') border-red-500 @enderror"
                                placeholder="Enter new password (min 6 characters)">
                            @error('new_password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-1 pt-2">
                            <label class="block text-sm font-medium text-gray-600">Confirm Password</label>
                        </div>
                        <div class="md:col-span-4">
                            <input type="password" name="new_password_confirmation"
                                class="admin-input" placeholder="Re-enter new password">
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-semibold text-gray-900 border-b border-gray-200 pb-2 mb-4">
                        <i class="fas fa-camera text-brand-600 mr-2"></i>Profile Picture
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div class="md:col-span-1 pt-2">
                            <label class="block text-sm font-medium text-gray-600">Upload Photo</label>
                        </div>
                        <div class="md:col-span-4">
                            <x-file-upload name="image" label="Upload Image" :current="$profile->image"/>
                            @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                <p class="text-xs text-gray-400"><i class="fas fa-info-circle mr-1"></i>Leave password fields blank to keep current password</p>
                <button class="admin-btn-primary inline-flex items-center gap-2" type="submit">
                    <i class="fas fa-save"></i> Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    // Live avatar preview on file select
    $('input[name="image"]').on('change', function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.admin-card .bg-gradient-to-r img').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush
