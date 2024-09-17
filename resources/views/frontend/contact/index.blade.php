@extends('frontend.frontend_master')
@section('title')
Contact Us
@endsection

@section('content')

  <div class="container" style="margin-top: 20px;">
     <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-header" style="margin-top:7px;">
                    <h4 class="text-center">Contact Us</h4>
                </div>

                <div class="panel-body">
                    <form action="{{ route('insert.message') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Enter your name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <textarea name="message" placeholder="Enter your message" class="form-control" required rows="7"></textarea>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-info">

                    </form>


                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
     </div>
  </div>
@endsection

{{-- js for keep scrol position and page refresh --}}
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
