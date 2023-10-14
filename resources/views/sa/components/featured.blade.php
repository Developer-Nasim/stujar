<!-- ================ Features area ================ -->


<div class="features-area">
  <div class="container-fluid">
    <div class="row">
        @foreach($home_buy_from_us->upload as $upload)
            <div class=" col-6 col-lg-3 col-md-6 border-bottom"> 
                <!-- feature item -->
                <div class="feature-item"> 
                  <img width="50px" src="{{ asset( 'images/uploads/thumb/'.$upload['file']) }}" alt="{{$upload['name']}}">
                    <h4 class="mt-2">{{$upload['name']}}</h4>
                    <p class="mb-0 text-white">{{$upload['caption']}}</p>
                </div>
                <!-- feature item end --> 
            </div>
        @endforeach
    </div>
  </div>
</div>
<!-- ================ Features area end ================ --> 