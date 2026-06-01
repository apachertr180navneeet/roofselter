@extends('backend.layout.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Why Choose Us Item</h3>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header"><div class="card-title">Edit Item</div></div>
                    <form action="{{ route('admin.why-choose-us-update', $item->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $item->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Icon Class</label>
                                <input type="text" name="icon" class="form-control" value="{{ $item->icon }}">
                            </div>
                            <div class="mb-3">
                                <label>Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ $item->sort_order }}">
                            </div>
                            <div class="mb-3">
                                <label><input type="checkbox" name="status" value="1" {{ $item->status == 1 ? 'checked' : '' }}> Active</label>
                            </div>
                        </div>
                        <div class="card-action text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('admin.why-choose-us') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
