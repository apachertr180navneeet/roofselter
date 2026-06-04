@extends('admin.layout.app')
@section('title', 'Slider')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Slider Info</h3>
            <button
                class="admin-btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#addRowModal">
                <i class="fa fa-plus"></i>
                Add Slider
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Banner</th>
                        <th class="text-right">Title</th>
                        <th class="text-right">Short Desc</th>
                        <th class="text-right">Published</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                    <tr id="record-row-{{ $slider->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <p class="demo">
                            <div class="avatar">
                                <img src="{{asset($slider->banner ? 'img/'.$slider->banner : '../panel-assets/assets/img/placeholder-image-3.jpg')}}" alt="{{ $slider->title }}" class="avatar-img rounded">
                            </div>
                            </p>
                        </td>
                        <th scope="row" class="font-medium text-gray-900">
                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-green-100 text-green-600 text-xs me-2">
                                <i class="fa fa-check"></i>
                            </span>
                            {{ $slider->title ? $slider->title : 'N/A' }}
                        </th>
                        <td class="text-right">{{ $slider->short_desc }}</td>

                        <td class="text-right">
                            <label class="switch">
                              <input type="checkbox" class="toggle-status" data-id="{{ $slider->id }}" data-url="{{ route('admin.slider-status') }}" {{ $slider->status == 1 ? 'checked' : '' }}>
                              <span class="record-toggle"></span>
                            </label>
                        </td>
                        <td class="text-right">
                            <div class="form-button-action flex items-center justify-end gap-1">
                                <button
                                    type="button"
                                    onclick='admin_slider_update(@json($slider))'
                                    data-bs-toggle="modal"
                                    data-bs-target="#editRowModal"
                                    class="admin-btn-primary admin-btn-icon">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="javascript:void(0)"
                                   class="admin-btn-danger admin-btn-icon delete-record"
                                   data-id="{{ $slider->id }}"
                                   data-url="{{ route('admin.slider-destroy', $slider->id) }}">
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

<!-- Edit Modal -->
<div
    class="modal fade"
    id="editRowModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white rounded-xl shadow-lg border-0">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h5 class="text-lg font-semibold text-gray-900">
                    <span class="font-semibold">Edit</span>
                    <span class="font-normal text-gray-500">Slider</span>
                </h5>
                <button
                    type="button"
                    class="text-gray-400 hover:text-gray-600 text-2xl leading-none"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-6">
                <p class="text-sm text-gray-500 mb-4">
                    Update a existing slider using this form, make sure you
                    fill them all
                </p>
                <form action="{{ route('admin.slider-update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input
                                id="title"
                                type="text"
                                name="title"
                                class="admin-input"
                                placeholder="fill Title" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Short Desc</label>
                            <input
                                id="short_desc"
                                name="short_desc"
                                type="text"
                                class="admin-input"
                                placeholder="fill Short Description" />
                        </div>
                        <div id="banner_preview"
                            style="position:relative; width:120px; height:120px; border:1px solid #ddd; border-radius:8px; overflow:hidden;margin-left: 14px;display: none">
                        </div>

                        <input type="hidden" name="remove_image" id="remove_image" value="0">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Banner</label>
                            <input
                                id="banner_input"
                                type="file"
                                name="banner"
                                class="admin-input"
                                placeholder="fill Banner" />
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        <button
                            type="submit"
                            class="admin-btn-primary">
                            Edit
                        </button>
                        <button
                            type="button"
                            class="admin-btn-secondary"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')

<!-- Add Modal -->
<div
    class="modal fade"
    id="addRowModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white rounded-xl shadow-lg border-0">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h5 class="text-lg font-semibold text-gray-900">
                    <span class="font-semibold">Add</span>
                    <span class="font-normal text-gray-500">Slider</span>
                </h5>
                <button
                    type="button"
                    class="text-gray-400 hover:text-gray-600 text-2xl leading-none"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-6">
                <p class="text-sm text-gray-500 mb-4">
                    Create a new slider using this form, make sure you
                    fill them all
                </p>
                <form action="{{ route('admin.slider-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input
                                name="title"
                                type="text"
                                class="admin-input"
                                placeholder="fill Title" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Short Desc</label>
                            <input
                                name="short_desc"
                                type="text"
                                class="admin-input"
                                placeholder="fill Short Description" />
                        </div>

                        <div id="add_banner_preview"
                            style="position:relative; width:120px; height:120px; border:1px solid #ddd; border-radius:8px; overflow:hidden;margin-left: 14px;display: none">
                        </div>

                        <input type="hidden" name="add_remove_image" id="add_remove_image" value="0">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Banner</label>
                            <input
                                id="add_banner_input"
                                name="banner"
                                type="file"
                                class="admin-input"
                                placeholder="fill office" />
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        <button
                            type="submit"
                            class="admin-btn-primary">
                            Add
                        </button>
                        <button
                            type="button"
                            class="admin-btn-secondary"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="{{asset('panel-assets/assets/js/core/jquery-3.7.1.min.js')}}"></script>

<script>

function admin_slider_update(dr) {
    let baseUrl = "{{ asset('img') }}/";
    let placeholder = "{{ asset('panel-assets/assets/img/placeholder-image-3.jpg') }}";

    let banner = dr.banner ? baseUrl + dr.banner : placeholder;

    // form fill
    $('#id').val(dr.id);
    $('#title').val(dr.title ?? '');
    $('#short_desc').val(dr.short_desc ?? '');

    // reset remove_image
    $('#remove_image').val(0);

    $('#add_remove_image').val(0);

    // show existing image
    showPreview(banner);
    $('#banner_input').val('');

    addshowPreview(banner);
    $('#add_banner_input').val('');
}

// file select hone par preview
$(document).on('change', '#banner_input', function(event) {
    if (event.target.files.length > 0) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#remove_image').val(0);
            showPreview(e.target.result);
        }
        reader.readAsDataURL(event.target.files[0]);
    }
});

// remove image button
function removeImage() {
    $('#banner_preview').hide();
    $('#banner_input').val('');
    $('#remove_image').val(1);
}

// helper: show image
function showPreview(src) {
    $('#banner_preview').show().html(
        `<span onclick="removeImage()"
                style="position:absolute; top:5px; right:5px;
                       background:#1f1f1f; color:#fff; border-radius:50%;
                       width:22px; height:22px; display:flex;
                       align-items:center; justify-content:center;
                       font-size:14px; cursor:pointer; z-index:10;">
            &times;
         </span>
         <img src="` + src + `" style="width:100%; height:100%; object-fit:cover;" class="rounded">`
    );
}

// file select hone par preview
$(document).on('change', '#add_banner_input', function(event) {
    if (event.target.files.length > 0) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#add_remove_image').val(0);
            addshowPreview(e.target.result);
        }
        reader.readAsDataURL(event.target.files[0]);
    }
});

// remove image button
function addremoveImage() {
    $('#add_banner_preview').hide();
    $('#add_banner_input').val('');
    $('#add_remove_image').val(1);
}

// helper: show image
function addshowPreview(src) {
    $('#add_banner_preview').show().html(
        `<span onclick="addremoveImage()"
                style="position:absolute; top:5px; right:5px;
                       background:#1f1f1f; color:#fff; border-radius:50%;
                       width:22px; height:22px; display:flex;
                       align-items:center; justify-content:center;
                       font-size:14px; cursor:pointer; z-index:10;">
            &times;
         </span>
         <img src="` + src + `" style="width:100%; height:100%; object-fit:cover;" class="rounded">`
    );

}

</script>

