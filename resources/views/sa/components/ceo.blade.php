<!-- ================ About CEO area ================ -->
<div class="about-area pt-20 pb-20">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-3">
        <div class="about-img-wrapper shadow">
            @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$home_ceo->upload[0],'folder_path'=>'small'])
        </div>
      </div>
      <div class="col-md-9 mb-30 mt-4 sm-md-0">
        <div class="about-content">
          <div class="about-content-text ">
            <h2>{{ $home_ceo->summary }}</h2>
            <div class="fs-6 text-dark">{!!Str::limit(strip_tags($home_ceo->description), 400, $end='...')!!}</div>
            <a href="{{ $home_ceo->slug }}" class="btn-style-1 mt-20">Read More</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ================ About CEO area end ================ --> 

