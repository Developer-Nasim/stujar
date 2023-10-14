<div class="p-2">
    <div class="d-flex justify-content-between bd-highlight mb-2 border-bottom pb-2">
        <div>
            <h5 class="card-title">{{$title}}</h5>
            <p>{{$info}}</p>
        </div>  
        <div>
            @if(!empty($links))
                @foreach($links as $key => $value)
                <a class="{{$value['class'] ?? 'btn btn-info mb-2'}}" href="{{$value['link']}}">{{$value['text']}}</a>
                @endforeach
            @endif
            @include('admin/button_back')
        </div>
    </div>
</div>