<div class="banner-w3">
    <div class="demo-1">
        <div id="example1" class="core-slider core-slider__carousel example_1">
            <div class="core-slider_viewport">
                <div class="core-slider_list">
                    @php
                        $sliders = DB::table('sliders')->get();
                    @endphp

                    @foreach ($sliders as $slider)
                        <div class="core-slider_item">
                            <img src="{{asset($slider->image)}}" class="img-responsive" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="core-slider_nav">
                <div class="core-slider_arrow core-slider_arrow__right"></div>
                <div class="core-slider_arrow core-slider_arrow__left"></div>
            </div>
            <div class="core-slider_control-nav"></div>
        </div>
    </div>
    <link href="{{ asset('/') }}frontend/css/coreSlider.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('/') }}frontend/js/coreSlider.js"></script>
    <script>
    $('#example1').coreSlider({
      pauseOnHover: false,
      interval: 3000,
      controlNavEnabled: true
    });

    </script>

</div>
