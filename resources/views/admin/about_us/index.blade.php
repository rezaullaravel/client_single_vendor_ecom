@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">About Us</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.aboutus.update') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" onchange="aboutImgUrl(this)">
                        @error('image')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror

                        <img src="{{ $aboutus->image ? asset($aboutus->image) : '' }}" id="aboutImage" style="margin-top: 5px;" width="200" height="200">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Description <span class="text-danger">*</span></label>
                        <textarea  class="form-control" name="description"  rows="5">{{ $aboutus->description }}</textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>{{-- end row --}}
      </div>
</section>

 {{-- javascript for  image preview   --}}
 <script type="text/javascript">
    function aboutImgUrl(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
        $('#aboutImage').attr('src',e.target.result).width(300).height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
    }
</script>
{{-- javascript for  image preview end --}}
@endsection
