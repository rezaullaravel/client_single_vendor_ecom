@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Subcategory</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.subcategory.store') }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                            <label>Category Name<span class="text-danger">*</span></label>
                            <select name="category_id" class="form-control">
                                <option value="" selected disabled>Select</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>

                            @enderror
                      </div>

                      <div class="form-group">
                            <label>Subcategory name<span class="text-danger">*</span></label>
                            <input type="text"  class="form-control" name="subcategory_name" placeholder="Enter subcategory name">

                            @error('subcategory_name')
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
