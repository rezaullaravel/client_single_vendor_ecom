@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3>Create Faq
                        <a href="{{ route('admin.faq.index') }}" class="btn btn-dark" style="float: right;">Back</a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.faq.store') }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Question<span class="text-danger">*</span></label>
                        <input type="text" name="question" class="form-control"  placeholder="Enter  question">
                        @error('question')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Answer<span class="text-danger">*</span></label>
                        <textarea  class="form-control" name="answer" placeholder="Enter answer" rows="5"></textarea>
                        @error('answer')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>{{-- end row --}}
      </div>
</section>
@endsection
