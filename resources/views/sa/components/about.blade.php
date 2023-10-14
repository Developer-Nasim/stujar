<!-- ================ About area ================ -->

<div class="about-area pt-80 pb-50 bg-main-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="about-img-wrapper">
          <div class="row align-items-center">
            <div class="col-lg-5 mb-30">
              <div class="about-images-1">@include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$home_about->upload[0],'folder_path'=>'small'])</div>
            </div>
            <div class="col-lg-7 mb-30">
              <div class="about-images-2">@include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$home_about->upload[1],'folder_path'=>'small'])</div>
              <div class="about-images-3 mt-30">@include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$home_about->upload[2],'folder_path'=>'small'])</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 offset-lg-1 mb-30">
        <div class="about-content">
          <div class="about-content-text">
            <h6>{{ $home_about->name }}</h6>
            <h2>{{ $home_about->summary }}</h2>
            <div class="fs-6">{!!Str::limit(strip_tags($home_about->description), 400, $end='...')!!}</div>
            <a href="about-us" class="btn-style-1 mt-20">Read More</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ================ About area end ================ --> 

