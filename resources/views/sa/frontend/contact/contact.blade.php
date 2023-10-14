@extends($websettings['cms_layout'].'.frontend.layouts.app')
@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row mb-20">
            <!-- Single -->
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="about_item_box text-center">
                    <div class="icon text-gradient">
                        <i class="bi bi-envelope-open-fill"></i>
                    </div>
                    <h4>Email</h4>
                    <a href="#">bcs.city@gmail.com</a>
                    <a href="#">bcs.city@gmail.com</a>
                </div>
            </div>
            <!-- Single -->
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="about_item_box text-center">
                    <div class="icon text-gradient">
                        <i class="bi bi-telephone-inbound-fill"></i>
                    </div>
                    <h4>Phone</h4>
                    <a href="#">01928-028742</a>   
                    <a href="#">01928-028742</a>   
                </div>
            </div>
            <!-- Single -->
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="about_item_box text-center">
                    <div class="icon text-gradient">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h4>Location</h4>
                    <a href="https://goo.gl/maps/SDks3t4HfnFaRTpMA" target="_blank">BCS Computer CIty, IDB Bhaban, 8-A Rokeya Sharani, Dhaka 1207</a>
                </div>
            </div>
        </div>
        <div class="row mb-40">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-headding">
                    <h2>Get In Touch.</h2>
                    <p>The powerful and flexible theme for all kinds of businesses</p>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-7 offset-lg-2">
                <div class="contact-form">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-input">
                                    <input type="text" name="name" placeholder="Your Name" required>
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input">
                                    <input type="email" name="email" placeholder="Your Email">
                                    <i class="far fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input">
                                    <input type="text" name="phone" placeholder="Your Phone">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input">
                                    <input type="text" name="subject" placeholder="Your Subjects">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input">
                                    <textarea name="message" placeholder="Write Message" spellcheck="false"></textarea>
                                    <i class="fas fa-pen"></i>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mb-40 mt-60">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-headding">
                    <h2>Find Us On Google Map.</h2>
                </div>
            </div>
        </div>
        <div class="google-map mt-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.1314840234636!2d90.37721151498188!3d23.778331784575677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c74c27ce53d1%3A0x6d020b31062ad1f2!2sBCS%20Computer%20City!5e0!3m2!1sen!2sbd!4v1679567912689!5m2!1sen!2sbd" width="1200" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
        </div>
       
    </div>
</section>

@endsection
