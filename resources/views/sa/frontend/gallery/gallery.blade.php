@extends($websettings['cms_layout'].'.frontend.layouts.app')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="row">
            @foreach($contents as $item)    
                <div class="col-md-3 mb-3">
                    <a href="gallery/{{ $item->id }}">
                         <img src="{{ asset( $item->upload[0]['file']) }}" alt="Portfolio">
                    </a>
                </div>
            @endforeach
        </div> 
    </div>
@endsection