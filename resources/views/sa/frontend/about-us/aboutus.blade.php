@extends($websettings['cms_layout'].'.frontend.layouts.app')

@section('content')
    
<section class="breadcrumb-area" style="background-image: url('assets/img/breadcrumb.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2>About Us</h2>
                    <ul>
                        <li><a href="{{ URL::to('/') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 align-self-center">
                <div class="row">
                    <div class="col-sm-6 mb-20">
                        <div class="about_item_box">
                            <div class="icon text-gradient">
                                <i class="fas fa-fighter-jet"></i>
                            </div>
                            <h4>Fully integrated</h4>
                            <p>We get insulted by others, lose trust for those We get back freezes</p>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-20">
                        <div class="about_item_box">
                            <div class="icon text-gradient">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <h4>Payments functionality</h4>
                            <p>We get insulted by others, lose trust for those We get back freezes</p>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-20">
                        <div class="about_item_box">
                            <div class="icon text-gradient">
                                <i class="fas fa-box"></i>
                            </div>
                            <h4>Prebuilt components</h4>
                            <p>We get insulted by others, lose trust for those We get back freezes</p>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-20">
                        <div class="about_item_box">
                            <div class="icon text-gradient">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <h4>Improved platform</h4>
                            <p>We get insulted by others, lose trust for those We get back freezes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="about-img-ab">
                    <div class="thumb">
                        <img src="assets/img/about.jpg" alt="about">
                    </div>
                    <div class="con">
                        <h4>Get insights on Search </h4>
                        <p> Website visitors today demand a frictionless user expericence — especially when using search. Because of the hight standards. </p>
                        <p> Only a quid victoria spong cack matie boy bum bag burke a blinding shot James bond pear. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="counter2-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="row">
                    <!-- Single -->
                    <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="counter2-item">
                            <div class="title">
                                <h2 class="counter text-gradient">255</h2>
                                <h3 class="text-gradient">K</h3>
                            </div>
                            <p>Customers</p>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="counter2-item">
                            <div class="title">
                                <h2 class="counter text-gradient">51</h2>
                                <h3 class="text-gradient">K</h3>
                            </div>
                            <p>Downloads</p>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="counter2-item">
                            <div class="title">
                                <h2 class="counter text-gradient">99</h2>
                                <h3 class="text-gradient">%</h3>
                            </div>
                            <p>Happy users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection