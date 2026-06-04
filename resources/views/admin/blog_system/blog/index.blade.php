@extends('admin.layout.app')

@section('title', 'Projects')

@section('content')

<div class="space-y-6">
    <div class="admin-card">

        {{-- Header --}}
        <div class="admin-card-header flex items-center justify-between">
            <h3 class="text-base font-semibold text-gray-900">
                Projects Information
            </h3>

            <a href="{{ route('admin.blog-create') }}" class="admin-btn-primary">
                <i class="fa fa-plus"></i> Add Project
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="admin-table min-w-full" id="basic-datatables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Project Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($blogs as $blog)
                        <tr id="record-row-{{ $blog->id }}">

                            {{-- Serial Number --}}
                            <td>
                                @if(method_exists($blogs, 'firstItem'))
                                    {{ $blogs->firstItem() + $loop->index }}
                                @else
                                    {{ $loop->iteration }}
                                @endif
                            </td>

                            {{-- Image --}}
                            <td>
                                <div class="w-12 h-12 rounded-lg overflow-hidden border">
                                    <img
                                        src="{{ $blog->image
                                            ? asset('img/' . $blog->image)
                                            : asset('panel-assets/assets/img/placeholder-image-3.jpg') }}"
                                        alt="{{ $blog->title }}"
                                        class="w-full h-full object-cover"
                                    >
                                </div>
                            </td>

                            {{-- Title --}}
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="font-medium">
                                        {{ $blog->title ?? '--' }}
                                    </span>
                                </div>
                            </td>

                            {{-- Category --}}
                            <td>
                                {{ optional($blog->category)->category_name ?? '--' }}
                            </td>

                            {{-- Status --}}
                            <td>
                                <label class="switch">
                                    <input
                                        type="checkbox"
                                        class="toggle-status"
                                        data-id="{{ $blog->id }}"
                                        data-url="{{ route('admin.blog-status') }}"
                                        {{ $blog->status == 1 ? 'checked' : '' }}
                                    >
                                    <span class="record-toggle"></span>
                                </label>
                            </td>

                            {{-- Actions --}}
                            <td class="text-center">
                                <div class="flex items-center justify-end gap-2">

                                    {{-- Edit --}}
                                    <a href="{{ route('admin.blog-edit', $blog->id) }}"
                                       class="admin-btn-primary admin-btn-icon"
                                       title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <a href="javascript:void(0)"
                                       class="admin-btn-danger admin-btn-icon delete-record"
                                       data-id="{{ $blog->id }}"
                                       data-url="{{ route('admin.blog-destroy', $blog->id) }}"
                                       title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                No Projects Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- Pagination --}}
        @if(method_exists($blogs, 'links'))
            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
        @endif

    </div>
</div>

@endsection