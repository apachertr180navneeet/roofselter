@extends('backend.layout.app')
@section('title', 'FAQs')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">FAQs</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">FAQs</div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="basic-datatables">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Question</th>
                                        <th scope="col" class="text-center">Published</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($faqs as $faq)
                                    <tr id="record-row-{{ $faq->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td class="text-center">
                                            <label class="switch">
                                              <input type="checkbox" class="toggle-status" data-id="{{ $faq->id }}" data-url="{{ route('admin.faqs-status') }}" {{ $faq->status == 1 ? 'checked' : '' }}>
                                              <span class="record-toggle"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a href="{{route('admin.faqs-edit',$faq->id)}}"
                                                   class="btn btn-link btn-primary btn-lg me-2">
                                                   <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0)"
                                                   class="btn btn-link btn-danger btn-lg delete-record"
                                                   data-id="{{ $faq->id }}"
                                                   data-url="{{ route('admin.faqs-destroy', $faq->id) }}">
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
            <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Add FAQ</div>
                  </div>
                  <form action="{{route('admin.faqs-store')}}" method="post">
                    @csrf
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <div class="form-group">
                              <label for="question">Question</label>
                              <span class="text-danger">*</span>
                              <input
                                  type="text"
                                  name="question"
                                  class="form-control @error('question') is-invalid @enderror"
                                  id="question"
                                  placeholder="Enter Question"
                                  value="{{old('question')}}"
                              />
                              @error('question')
                                <p class="invalid-feedback">{{$message}}</p>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label for="answer">Answer</label>
                              <span class="text-danger">*</span>
                              <textarea
                                  name="answer"
                                  class="form-control @error('answer') is-invalid @enderror"
                                  id="answer"
                                  rows="4"
                                  placeholder="Enter Answer">{{old('answer')}}</textarea>
                              @error('answer')
                                <p class="invalid-feedback">{{$message}}</p>
                              @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-action text-center">
                      <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
