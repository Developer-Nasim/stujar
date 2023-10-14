@if (sizeof($currentEvents) > 0 || sizeof($upcomingEvents) || sizeof($pastEvents) > 0)
    <section class="section-padding-2 pt-0">
        <div class="container">
            <!-- Section Headding -->
            <div class="row mb-40 mt-40">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="analytics-toll-content">
                        <h2 class="text-gradient text-center pt-3 pb-3">Events You Can Participate</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pricing-table-tab  text-center">						
                        <ul class="nav nav-tabs" id="myTabPricing" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthly" role="tab" aria-controls="monthly" aria-selected="true">Current</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="yearly-tab" data-bs-toggle="tab" data-bs-target="#yearly" role="tab" aria-controls="yearly" aria-selected="false">Upcoming</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="yearly-tab1" data-bs-toggle="tab" data-bs-target="#yearly1" role="tab" aria-controls="yearly1" aria-selected="false">Past</button>
                                </li>
                        </ul>
                    </div>
                    <div class="tab-content mt-40" id="myTabPricingContent">
                            <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                                <div class="row">                     
                                        @foreach($currentEvents as $event)
                                            <div class="col-lg-6 col-md-6 mb-30">
                                                <div class="pricing-item h-100">
                                                    <div class="event-image mb-4 text-center">
                                                        <a href="{{ $event->slug }}">
                                                            <img src="{{$websettings['cms_assets']}}/images/event/large/{{ $event->logo }}" alt="">
                                                        </a>
                                                    </div>	
                                                    <a href="{{ $event->slug }}"">								
                                                        <h2 class="mb-4">{{ $event->title }}</h2>
                                                    </a>	
                                                        {!!Str::limit(strip_tags($event->description), 55, $end='...')!!}
                                                </div>
                                            </div> 
                                        @endforeach                                                         
                                </div>
                            </div>
                            <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                                <div class="row">
                                    @if (!empty($upcomingEvents))
                                        @foreach ($upcomingEvents as $upcomingevent)
                                        <div class="col-lg-6 col-md-6 mb-30">
                                            <div class="pricing-item  h-100">
                                                <div class="event-image mb-4 text-center">
                                                    <a href="{{ $upcomingevent->slug }}">
                                                        <img src="{{$websettings['cms_assets']}}/images/event/large/{{ $upcomingevent->logo }}" alt="">
                                                    </a>
                                                </div>	
                                                <a href="{{ $upcomingevent->slug }}">
                                                    <h2 class="mb-4">{{ $upcomingevent->title }}</h2>
                                                </a>									
                                                {!!Str::limit(strip_tags($upcomingevent->description), 55, $end='...')!!}
                                            </div>
                                        </div> 
                                        @endforeach                                 
                                    @endif                       
                                </div>
                            </div>
                            <div class="tab-pane fade" id="yearly1" role="tabpanel" aria-labelledby="yearly-tab1">
                                <div class="row">
                                    @if (!empty($pastEvents))
                                        @foreach ($pastEvents as $pastEvent)
                                            <div class="col-lg-6 col-md-6 mb-30">
                                                <div class="pricing-item  h-100">
                                                    <div class="event-image mb-4 text-center">
                                                        <a href="{{ $pastEvent->slug }}">
                                                            <img src="{{$websettings['cms_assets']}}/images/event/large/{{ $pastEvent->logo }}" alt="">
                                                        </a>
                                                    </div>	
                                                    <a href="{{ $pastEvent->slug }}">
                                                        <h2 class="mb-4">{{ $pastEvent->title }}</h2>
                                                    </a>									
                                                    {!!Str::limit(strip_tags($pastEvent->description), 55, $end='...')!!}
                                                </div>
                                            </div> 
                                        @endforeach                                 
                                    @endif      
                                </div>
                            </div>
                        <div class="text-center">
                            <a class="button-2" href="events">SEE ALL EVENTS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif 