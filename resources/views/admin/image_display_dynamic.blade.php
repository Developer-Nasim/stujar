@if(!empty($item['file']))
    <img style="max-width:100%" src="{{ asset( 'images/uploads/'.$folder_path.'/'.$item['file']) }}" alt="{{ $item['name'] }}" height="{{ $height ?? 100 }}">  
@else  
    @if(!empty($item['url']))
        <img style="max-width:100%" src="{{ asset( $item['url']) }}"  alt="{{ $item['name'] }}" height="{{ $height ?? 100 }}">
    @endif
@endif