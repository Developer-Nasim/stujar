@if(!empty($pagesetting))
    @if(!empty($pagesetting->meta_heading))
    <h1 class="mt-4 ">{{$pagesetting->meta_heading}}</h1>
    @endif
    <div class="mt-4 details mb-4">
        {!! $pagesetting->page_description ?? '' !!}
    </div>
@endif