<!-- home slider section start-->
<div class="slider-bg slider-bg-2 ">
    <div class="container">
        <div class="row">
            <div class="col-12 slider-part">
                <div class="slide-1 home-slider">
                    @foreach($slider1 as $slider)
                    <div>
                        <div class="home text-start p-left">
                            <img src="{{asset($slider->image)}}" class="bg-img " alt="">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="slider-contain">
                                            <div>
                                                <h5>{{$slider->title}}</h5>
                                                <h1>{{$slider->slogan}}</h1>
                                                <h4>save up to 50%</h4>
                                                <a href="{{route('product')}}" class="btn btn-solid">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- home slider section end-->

