<!-- ================ Products area ================ -->
<div class="services-area pt-80 pb-50">
  <div class="container"> 
    <!-- section title -->
    <div class="section-title text-center mb-40">
      <h2>Our Products</h2>
      <span class="border-title"></span> </div>
    <!-- section title end -->
    <div class="row">
      @forelse ($products as $product)
      <div class="col-lg-3 col-md-3 mb-30"> 
        <!-- service item -->
        <div class="service-item">
          <div class="ser-img mb-25">
            <a href="{{ $product->slug }}" class="product-item-img">
                @foreach ($product->upload as $item)
                    @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$item,'folder_path'=>'small'])
                @endforeach 
            </a>
            <h6><a class="text-main d-block p-4 bg-main text-center text-white" href="{{ $product->slug }}">{{ $product->name }}</a></h6>
          </div>
          
        </div>
        <!-- service item --> 
      </div>
      @empty
      @endforelse
    </div>
  </div>
</div>
<!-- ================ Services area end ================ --> 