@extends('backend.layout.app')
@section('title', 'Edit FAQ')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit FAQ</h3>
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
            <div class="col-md-8 mx-auto">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Update FAQ</div>
                  </div>
                  <form action="{{route('admin.faqs-update',$faq->id)}}" method="post">
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
                                  value="{{old('question',$faq->question)}}"
                                  placeholder="Enter Question"
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
                                  placeholder="Enter Answer">{{old('answer',$faq->answer)}}</textarea>
                              @error('answer')
                                <p class="invalid-feedback">{{$message}}</p>
                              @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-action text-center">
                      <button class="btn btn-success" type="submit">Submit</button>
                      <a href="{{route('admin.faqs')}}" class="btn btn-danger">Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
