<!-- ================ Contact area ================ -->
<div class="contact-us-page pt-80 pb-50">
  <div class="container">
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
    @endif
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-30"> 
        <!-- contact item box -->
        <div class="contact-item-box">
          <h3 class="p-4 border-bottom">USA Office</h3>
          <div class="contact-item-grid">
            <h4>Address</h4>
            <p class="mb-0 address-box">{{ $websettings['cms_contactaddress'] }}</p>
          </div>
          <div class="contact-item-grid">
            <h4>Phone</h4>
            <p class="mb-0"><a href="tel:{{ $websettings['cms_phone'] }}">{{ $websettings['cms_phone'] }}</a></p>
          </div>
          <div class="contact-item-grid">
            <h4>Email</h4>
            <p class="mb-0"><a href="mailto:{{ $websettings['cms_email'] }}?subject=Contact%20us">{{ $websettings['cms_email'] }}</a></p>
          </div>
          <div class="contact-item-grid">
          <a target="_blank" href="{{ $websettings['cms_maplink'] }}">  
            <img src="{{ $websettings['cms_assets'] }}/images/map.webp" alt="Map Location">
          </a>
          </div>
        </div>
        <!-- contact item box end --> 
      </div>
      <div class="col-lg-4 col-md-6 mb-30"> 
        <!-- contact item box -->
        <div class="contact-item-box">
          <h3 class="p-4 border-bottom">Bangladesh Office</h3>
          <div class="contact-item-grid">
            <h4>Address</h4>
            <p class="mb-0 address-box">{{ $websettings['cms_contactaddress2'] }}</p>
          </div>
          <div class="contact-item-grid">
            <h4>Phone</h4>
            <p class="mb-0"><a href="tel:{{ $websettings['cms_phone2'] }}">{{ $websettings['cms_phone2'] }}</a></p>
          </div>
          <div class="contact-item-grid">
            <h4>Email</h4>
            <p class="mb-0"><a href="mailto:{{ $websettings['cms_email'] }}?subject=Contact%20us">{{ $websettings['cms_email'] }}</a></p>
          </div>
          <div class="contact-item-grid">
          <a target="_blank" href="{{ $websettings['cms_maplink2'] }}">  
            <img src="{{ $websettings['cms_assets'] }}/images/map-dhaka.webp" alt="Map Location">
          </a>
          </div>
        </div>
        <!-- contact item box end -->
      </div>
      <div class="col-lg-4 col-md-12 mb-30"> 
        <!-- contact form box -->
        <div class="contact-form-box contact-item-box">
          <h3 class="p-4 border-bottom">Contact Form</h3>
          <form class="contact-form p-4" id="contact-form" method="post" action="{{ route('contact.store') }}">
            @csrf
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="name" placeholder="Name" required="required" data-error="Name is required">
              <label for="floatingInput1">Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" placeholder="E-mail" data-error="E-mail is required">
              <label for="floatingInput2">E-mail</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="phone" placeholder="Phone" data-error="Phone is required">
              <label for="floatingInput3">Phone</label>        
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" name="message" placeholder="Your Message" required="required" data-error="Message is required"></textarea>
              <label for="floatingTextarea">Your Message</label>
            </div>
            <button type="submit" class="btn-style-1">Send</button>
            <div class="messages"></div>
          </form>
        </div>
        <!-- contact form box end --> 
      </div>
    </div>
    <!-- map box --> 
    <!-- map box end --> 
  </div>
</div>
<!-- ================ Contact area end ================ --> 