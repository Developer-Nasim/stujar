@extends($websettings['cms_layout'].'.frontend.layouts.app')
@section('social')
    @include('meta_content_details')
@endsection

@section('schema')
    @include('schema_menu')
@endsection

@section('content')
<style>
  .cta{
    padding: 20px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  }
  .wrap {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button {
  min-width: 300px;
  min-height: 60px;
  font-family: 'Nunito', sans-serif;
  font-size: 22px;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: #fff;
  background: linear-gradient(90deg, rgb(3 145 71) 0%, rgb(107 201 152) 100%);
  border: none;
  border-radius: 1000px;
  box-shadow: 6px 6px 12px #71d4a1;
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  }

.button::before {
content: '';
  border-radius: 1000px;
  min-width: calc(300px + 12px);
  min-height: calc(60px + 12px);
  border: 6px solid #59bf8a;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all .3s ease-in-out 0s;
}

.button:hover, .button:focus {
  color: #fff;
  transform: translateY(-6px);
}

.button:hover::before, .button:focus::before {
  opacity: 1;
}

.button::after {
  content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  border: 4px solid #59bf8a;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ring 1.5s infinite;
}

.button:hover::after, .button:focus::after {
  animation: none;
  display: none;
}

@keyframes ring {
  0% {
    width: 30px;
    height: 30px;
    opacity: 1;
  }
  100% {
    width: 300px;
    height: 300px;
    opacity: 0;
  }
}
</style>
<div class="inner-page-title-area">
  <div class="container"> 
    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ $websettings['cms_url'] }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $content->name }}</li>
    </ol>
    <!-- breadcrumb end -->
    <div class="row">
      <div class="col-lg-6 offset-lg-3"> 
        <!-- title & des -->
        <h1><span>{{ $content->name }}</span></h1>
        <!-- title & des end --> 
      </div>
    </div>
  </div>
</div>
<div class="service-details-page pt-80 pb-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-3"> 
        <!-- sidebar -->
        <aside> 
          <!-- sidebar item box -->
          <div class="sidebar-item-box mb-30"> 
            <!-- sidebar list -->
            <ul class="sidebar-list">
              <li><b>All</b></li>
              @forelse ($contents as $product)
                <li><a href="{{ $product->slug }}">{{ $product->name }}<i class="fas fa-caret-right"></i></a></li>  
              @empty
              @endforelse
            </ul>
            <!-- sidebar list end --> 
          </div>
          <!-- sidebar item box end --> 
          
        </aside>
        <!-- sidebar end --> 
      </div>
      <div class="col-lg-9"> 
        <!-- service content -->
        <div class="service-content mb-5">
            <div class="mb-4">
                @if(!empty($content->upload[0]))
                    @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$content->upload[0],'folder_path'=>'large','caption'=>1])
                @endif
            </div>
            <p>{!! $content->description !!}</p>
        </div>
        <!-- service content end --> 
        <div class="cta">
          <div class="wrap">
            <button class="button">Order Now</button>
          </div>
        </div>
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
              <div class="col-lg-12 col-md-12 mb-30"> 
                <!-- contact form box -->
                <div class="contact-form-box contact-item-box">
                  <h3 class="p-4 border-bottom">Get A Quotation</h3>
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
  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection