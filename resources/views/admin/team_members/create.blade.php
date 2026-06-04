@extends('admin.layout.app')
@section('title', 'Create Team Member')
@section('content')
<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
            <div class="admin-card-header">
                <div class="card-title">Add Team Members Record</div>
            </div>
            <form action="{{route('admin.team_members-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="admin-card-body">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1">
                            <label for="name">Name</label>
                            <span class="text-red-500">*</span>
                        </div>
                        <div class="md:col-span-3">
                            <input
                                type="text"
                                name="name"
                                class="admin-input @error('name') border-red-500 @enderror"
                                id="name"
                                placeholder="Enter Name"
                            />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            <small id="nameHelp" class="text-xs text-gray-500">
                                    This name your Team Members Person.
                            </small>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                        <div class="md:col-span-1">
                            <label for="designation">Designation</label>
                        </div>
                        <div class="md:col-span-3">
                            <input
                                type="text"
                                name="designation"
                                class="admin-input"
                                id="designation"
                                placeholder="Enter Designation"
                            />
                            <small id="designationHelp" class="text-xs text-gray-500">
                                    This designation your Team Members Person.
                            </small>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                        <div class="md:col-span-1">
                            <label for="image">Image</label>
                        </div>
                        <div class="md:col-span-3">
                            <x-file-upload name="image" label="Upload Image" />
                            <small id="image" class="text-xs text-gray-500">
                                    This Image is Team Members Image.
                            </small>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                        <div class="md:col-span-1">
                            <label>Social Media URL</label>
                        </div>
                        <div class="md:col-span-3">
                            <input type="checkbox" id="add_social"> <label for="add_social">Add Social Media Links</label>
                        </div>
                    </div>

                    <div id="social-fields" style="display:none;">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                            <div class="md:col-span-1">
                                <label for="instagram_url">Instagram Url</label>
                            </div>
                            <div class="md:col-span-3">
                                <input
                                    type="text"
                                    name="instagram_url"
                                    class="admin-input"
                                    id="instagram_url"
                                    placeholder="Paste Your Instagram Url"
                                />
                                <small id="instagram_urlHelp" class="text-xs text-gray-500">
                                        This Instagram Url your Team Members Person.
                                </small>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                            <div class="md:col-span-1">
                                <label for="facebook_url">Facebook Url</label>
                            </div>
                            <div class="md:col-span-3">
                                <input
                                    type="text"
                                    name="facebook_url"
                                    class="admin-input"
                                    id="facebook_url"
                                    placeholder="Paste Your Facebook Url"
                                />
                                <small id="facebook_urlHelp" class="text-xs text-gray-500">
                                        This Facebook Url your Team Members Person.
                                </small>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                            <div class="md:col-span-1">
                                <label for="twitter_url">Twitter-X Url</label>
                            </div>
                            <div class="md:col-span-3">
                                <input
                                    type="text"
                                    name="twitter_url"
                                    class="admin-input"
                                    id="twitter_url"
                                    placeholder="Paste Your Twitter-X Url"
                                />
                                <small id="twitter_urlHelp" class="text-xs text-gray-500">
                                        This Twitter-X Url your Team Members Person.
                                </small>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                            <div class="md:col-span-1">
                                <label for="linkedin_url">LinkedIn Url</label>
                            </div>
                            <div class="md:col-span-3">
                                <input
                                    type="text"
                                    name="linkedin_url"
                                    class="admin-input"
                                    id="linkedin_url"
                                    placeholder="Paste Your LinkedIn Url"
                                />
                                <small id="linkedin_urlHelp" class="text-xs text-gray-500">
                                        This LinkedIn Url your Team Members Person.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-100 text-center">
                    <button class="admin-btn-primary" type="submit">Submit</button>
                    <a href="{{route('admin.team_members')}}" class="admin-btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
