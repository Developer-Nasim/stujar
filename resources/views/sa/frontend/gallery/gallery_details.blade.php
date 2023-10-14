@extends($websettings['cms_layout'].'.frontend.layouts.app')
@section('content')
<div class="container">
<section class="section-padding-2">
     <h2 class="mt-5 text-center"> {{ $content->name }}</h2>
   
        @foreach ($content->upload as $image)
             <img src="{{ asset( $image['file']) }}" alt=""  width="400"> 
         @endforeach 
         <p>
            {!! $content->description !!}
        </p>
   
</section>
</div>
@endsection

