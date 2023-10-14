@if(!empty($item['file']))
    <img src="{{ asset( 'images/uploads/'.$folder_path.'/'.$item['file']) }}" alt="{{ $item['name'] }}" height="{{ $height ?? '' }}">  
@else  
    @if(!empty($item['url']))
        <img src="{{ asset( $item['url']) }}"  alt="{{ $item['name'] }}" height="{{ $height ?? 100 }}">
    @endif
@endif