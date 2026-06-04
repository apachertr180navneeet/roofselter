@extends('admin.layout.app')
@section('content')
<div class="space-y-6 max-w-3xl mx-auto">
    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="text-lg font-semibold text-gray-900">Your Profile Here</h5>
        </div>
        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="admin-card-body">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <span class="text-red-500 text-sm">*</span>
                    </div>
                    <div class="md:col-span-3">
                        <input type="text"
                            name="name"
                            value="{{ old('name', $profile->name) }}"
                            class="admin-input @error('name') border-red-500 @enderror"
                            id="name"
                            placeholder="Enter Name" />
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <span class="text-red-500 text-sm">*</span>
                    </div>
                    <div class="md:col-span-3">
                        <input type="email"
                            class="admin-input @error('email') border-red-500 @enderror"
                            name="email"
                            id="email"
                            value="{{ old('email', $profile->email) }}"
                            placeholder="sam@gmail.com" />
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-1">
                        <label for="old_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    </div>
                    <div class="md:col-span-3">
                        <input type="password"
                            class="admin-input @error('old_password') border-red-500 @enderror"
                            name="old_password"
                            id="old_password"
                            placeholder="Enter Your Current Password" />
                        @error('old_password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-1">
                        <label for="new_password" class="block text-sm font-medium text-gray-700">Set New Password</label>
                    </div>
                    <div class="md:col-span-3">
                        <input type="password"
                            class="admin-input @error('new_password') border-red-500 @enderror"
                            name="new_password"
                            id="new_password"
                            placeholder="Enter Your New Password" />
                        @error('new_password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-1">
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Re-enter Password</label>
                    </div>
                    <div class="md:col-span-3">
                        <input type="password"
                            class="admin-input"
                            name="new_password_confirmation"
                            id="new_password_confirmation"
                            placeholder="Re-enter Your New Password" />
                    </div>

                    <div class="md:col-span-1">
                        <label for="image" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    </div>
                    <div class="md:col-span-3">
                        <x-file-upload name="image" label="Upload Image" :current="$profile->image"/>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 text-right">
                <button class="admin-btn-primary" type="submit">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection
