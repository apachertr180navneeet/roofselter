@extends('admin.layout.app')
@section('title', 'Industry FAQs')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Industry FAQ Info</h3>
            <a href="{{route('admin.industry-faq-create')}}" class="admin-btn-primary ml-auto"><i class="fa fa-plus"></i> Add Industry FAQ</a>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" class="text-center">Questions</th>
                        <th scope="col" class="text-center">Industry Name</th>
                        <th scope="col" class="text-center">Published</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($industry_faq as $faq)
                    <tr id="record-row-{{ $faq->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <th scope="row">
                            <button
                                class="admin-btn-success admin-btn-sm admin-btn-icon mr-2">
                                <i class="fa fa-check"></i>
                            </button>
                            {{ $faq->question ? $faq->question : '--' }}
                        </th>
                        <td class="text-center">
                            @if($faq->industry != null)
                                {{ $faq->industry->title }}
                            @else
                                --
                            @endif
                        </td>

                        <td class="text-center">
                            <label class="switch">
                              <input type="checkbox" class="toggle-status" data-id="{{ $faq->id }}" data-url="{{ route('admin.industry-faq-status') }}" {{ $faq->status == 1 ? 'checked' : '' }}>
                              <span class="record-toggle"></span>
                            </label>
                        </td>
                        <td class="text-center">
                            <div class="form-button-action">

                                <a href="{{route('admin.industry-faq-edit',$faq->id)}}"
                                   class="admin-btn-primary admin-btn-icon mr-3">
                                   <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)"
                                   class="admin-btn-danger admin-btn-icon delete-record"
                                   data-id="{{ $faq->id }}"
                                   data-url="{{ route('admin.industry-faq-destroy', $faq->id) }}">
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


@endsection
