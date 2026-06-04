@extends('admin.layout.app')
@section('title', 'Edit Team Member')
@section('content')
<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
            <div class="admin-card-header">
                <div class="card-title">Update Team Members Record</div>
            </div>
            <form action="{{route('admin.team_members-update',$team_members->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="id">
                <div class="admin-card-body">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1">
                            <label for="name">Name</label>
                            <span class="text-red-500">*</span>
                        </div>
                        <div class="md:col-span-3">
                            <input
                                type="text"
                                class="admin-input @error('name') border-red-500 @enderror"
                                id="name"
                                name="name"
                                value="{{old('name',$team_members->name)}}"
                                placeholder="Enter Name"
                            />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            <small id="nameHelp2" class="text-xs text-gray-500">
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
                                value="{{ $team_members->designation }}"
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
                            <x-file-upload name="image" label="Upload Image" :current="$team_members->image" />
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
                            <input type="checkbox" id="add_social"
                                @if(!empty($team_members->instagram_url) || !empty($team_members->facebook_url) || !empty($team_members->twitter_url) || !empty($team_members->linkedin_url)) checked @endif> <label for="add_social"> Add Social Media Links</label><br>
                             <small id="social_urlHelp" class="text-xs text-gray-500">
                                     if you unchecked your checkbox so your all social media url save as null
                             </small>
                        </div>
                    </div>

                    <div id="social-fields"
                         style="display: {{ (!empty($team_members->instagram_url) || !empty($team_members->facebook_url) || !empty($team_members->twitter_url) || !empty($team_members->linkedin_url)) ? 'block' : 'none' }};">

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                            <div class="md:col-span-1">
                                <label for="instagram_url">Instagram Url</label>
                            </div>
                            <div class="md:col-span-3">
                                <input type="text" name="instagram_url" class="admin-input" id="instagram_url"
                                       placeholder="Paste Your Instagram Url"
                                       value="{{ old('instagram_url', $team_members->instagram_url ?? '') }}"/>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                            <div class="md:col-span-1">
                                <label for="facebook_url">Facebook Url</label>
                            </div>
                            <div class="md:col-span-3">
                                <input type="text" name="facebook_url" class="admin-input" id="facebook_url"
                                       placeholder="Paste Your Facebook Url"
                                       value="{{ old('facebook_url', $team_members->facebook_url ?? '') }}"/>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                            <div class="md:col-span-1">
                                <label for="twitter_url">Twitter-X Url</label>
                            </div>
                            <div class="md:col-span-3">
                                <input type="text" name="twitter_url" class="admin-input" id="twitter_url"
                                       placeholder="Paste Your Twitter-X Url"
                                       value="{{ old('twitter_url', $team_members->twitter_url ?? '') }}"/>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                            <div class="md:col-span-1">
                                <label for="linkedin_url">LinkedIn Url</label>
                            </div>
                            <div class="md:col-span-3">
                                <input type="text" name="linkedin_url" class="admin-input" id="linkedin_url"
                                       placeholder="Paste Your LinkedIn Url"
                                       value="{{ old('linkedin_url', $team_members->linkedin_url ?? '') }}"/>
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

@section('script')
<script>
    function makeSlug(val) {
        let str = val;
        let output = str.replace(/\s+/g, '-').toLowerCase();
        $('#slug').val(output);
    }
</script>
@endsection
