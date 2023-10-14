<div class="home-demo">
    <div class="owl-carousel owl-theme">
        @foreach($sliders as $slider)		
            <div class="item">
                @foreach ($slider->upload as $item)
                    <span class="w-100 cursor-pointer">
                        <picture>
                            @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$item,'folder_path'=>'large'])
                        </picture>				
                    </span> 
                @endforeach 
            </div>
        @endforeach
    </div>
</div>