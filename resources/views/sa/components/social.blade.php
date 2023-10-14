@if(!empty($isList))
    @if(!empty($websettings['cms_facebook']))
    <li><a href="{{$websettings['cms_facebook']}}" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
    </li>
    @endif
    @if(!empty($websettings['cms_twitter']))
    <li><a href="{{$websettings['cms_twitter']}}" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
    </li>
    @endif
    @if(!empty($websettings['cms_linkedin']))
    <li><a href="{{$websettings['cms_linkedin']}}" target="_blank">
            <i class="fab fa-linkedin"></i>
        </a>
    </li>
    @endif
@else
    @if(!empty($websettings['cms_facebook']))
    <a href="{{$websettings['cms_facebook']}}" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
    @endif
    @if(!empty($websettings['cms_twitter']))
    <a href="{{$websettings['cms_twitter']}}" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
    @endif
    @if(!empty($websettings['cms_linkedin']))
    <a href="{{$websettings['cms_linkedin']}}" target="_blank">
            <i class="fab fa-linkedin"></i>
        </a>
    @endif
@endif
