<!-- ================ Products area ================ -->
<div class="services-area pt-80 pb-50">
  <div class="container"> 
    <!-- section title -->
    <div class="section-title text-center mb-40">
      <h2>Our Products</h2>
      <span class="border-title"></span> </div>
    <!-- section title end -->
    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-1">
      @forelse ($products as $product)
      <div class="col mb-30"> 
        <!-- service item -->
        <div class="service-item">
          <div class="ser-img mb-25">
            <a href="{{ $product->slug }}">
                @foreach ($product->upload as $item)
                    @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$item,'folder_path'=>'small'])
                @endforeach 
            </a>
          </div>
          <div class="description">
            <h6><a class="text-main" href="{{ $product->slug }}">{{ $product->name }}</a></h6>
            <p>{!!Str::limit(strip_tags($product->description), 100, $end='...')!!}</p>
            <a href="{{ $product->slug }}" class="btn-style-3">Read More <i class="fas fa-caret-right"></i></a> </div>
        </div>
        <!-- service item --> 
      </div>
      @empty
      @endforelse
    </div>
  </div>
</div>
<!-- ================ Services area end ================ --> 