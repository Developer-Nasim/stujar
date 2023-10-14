
@php
    $i=1;
    //dd($sliders);
@endphp

<!-- ================ Slider area ================ -->
<div class="slider" id="home">
  <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner"> 
        @foreach($sliders as $slider)
            <style>
            .slider .carousel-item.slider-{{ $i }} {background-image: url("{{ asset( 'images/uploads/large/'.$slider->upload[0]['file']) }}");}
            </style>
            <!-- slider item -->
            <div class="carousel-item slider-{{ $i }} {{ $i === 1 ? "active" : "" }} ">
                <div class="carousel-caption">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="slider-caption-box">
                            <h2 class="mb-15">{{ $slider->name }}</h2>
                            <p>{{ $slider->summary }}</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- slider item end --> 
            @php
                $i++;
            @endphp
        @endforeach
      
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> </a> </div>
</div>
<!-- ================ Slider area end ================ --> 