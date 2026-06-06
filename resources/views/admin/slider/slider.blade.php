@extends('admin.layout.app')
@section('title', 'Slider')
@section('content')

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-12">
            <div class="admin-card">
                <div class="admin-card-header">
                    <div class="card-title">Slider Info</div>
                    <a href="{{ route('admin.slider-create') }}" class="admin-btn-primary">
                        <i class="fa fa-plus"></i> Add Slider
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <div class="table-responsive">
                        <table class="admin-table" id="basic-datatables">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Banner</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Published</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                <tr id="record-row-{{ $slider->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="avatar">
                                            <img src="{{asset($slider->banner ? 'img/'.$slider->banner : 'panel-assets/assets/img/placeholder-image-3.jpg')}}" alt="{{ $slider->title }}" class="avatar-img rounded">
                                        </div>
                                    </td>
                                    <td class="font-medium text-gray-900">{{ $slider->title ?: 'N/A' }}</td>
                                    <td style="max-width:250px;"><div class="truncate-text">{{ $slider->short_desc ?: '--' }}</div></td>
                                    <td>
                                        <label class="switch">
                                          <input type="checkbox" class="toggle-status" data-id="{{ $slider->id }}" data-url="{{ route('admin.slider-status') }}" {{ $slider->status == 1 ? 'checked' : '' }}>
                                          <span class="record-toggle"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('admin.slider-edit', $slider->id) }}" class="admin-btn-primary admin-btn-icon mr-2">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="admin-btn-danger admin-btn-icon delete-record"
                                               data-id="{{ $slider->id }}" data-url="{{ route('admin.slider-destroy', $slider->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<style>
#basic-datatables tbody td {
    text-align: center !important;
    vertical-align: middle;
}
.truncate-text {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 250px;
}
</style>
@endpush
