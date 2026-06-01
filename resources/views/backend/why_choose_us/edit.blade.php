@extends('backend.layout.app')
@section('title', 'Edit Why Choose Us')
@section('content')
<div class="space-y-6">
    <div class="max-w-2xl mx-auto">
        <div class="admin-card">
            <div class="admin-card-header"><div class="card-title">Edit Item</div></div>
            <form action="{{ route('admin.why-choose-us-update', $item->id) }}" method="POST">
                @csrf
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label>Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" class="admin-input" value="{{ $item->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="admin-textarea" rows="3">{{ $item->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Icon Class</label>
                        <input type="text" name="icon" class="admin-input" value="{{ $item->icon }}">
                    </div>
                    <div class="mb-3">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" class="admin-input" value="{{ $item->sort_order }}">
                    </div>
                    <div class="mb-3">
                        <label><input type="checkbox" name="status" value="1" {{ $item->status == 1 ? 'checked' : '' }}> Active</label>
                    </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-100 text-center">
                    <button type="submit" class="admin-btn-primary">Update</button>
                    <a href="{{ route('admin.why-choose-us') }}" class="admin-btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
