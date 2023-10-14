<section class="border-bottom border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="analytics-toll-content">
                    @if(!empty($home_buy_from_us->upload[0]))
                    <a href="{{ $home_buy_from_us->slug }}" class="w-100">
                        <picture>
                        <img src="{{ asset( 'images/uploads/small/'.$home_buy_from_us->upload[0]['url']) }}" alt="{{ $home_buy_from_us->upload[0]['name'] ?? $home_buy_from_us->upload[0]['url'] }}">  
                        </picture>				
                    </a> 
                    @endif
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="analytics-toll-content">
                    <h2 class="text-gradient">{{ $home_buy_from_us->name }}</h2>								
                    <p class="content">{!!Str::limit(strip_tags($home_buy_from_us->description), 200, $end='...')!!}</p>							
                    <a class="button-1 mt-5 mb-5" href="{{ $home_buy_from_us->slug }}">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>	