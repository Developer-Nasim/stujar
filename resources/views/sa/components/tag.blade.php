@if (!empty($content->tag))
    <div class="col-lg-12 mb-30">
        <div class="d-flex">
            <span><b>Tags:&nbsp; &nbsp;</b></span>    
            @foreach($content->tag as $tag)
                @if($tag->tag_type == 4)
                {{-- <span href="#">{{ $tag->title }}</span> --}}
                <ul class="tags">
                    <li><span class="tag">{{ $tag->title }}</span></li>
                  </ul>
                @endif
            @endforeach
        </div>
    </div>
@endif