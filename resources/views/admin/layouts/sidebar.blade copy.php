<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
    <div class="logo-src"></div>
    <div class="header__pane ml-auto">
    <div>
    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
    <span class="hamburger-box">
    <span class="hamburger-inner"></span>
    </span>
    </button>
    </div>
    </div>
    </div>
    <div class="app-header__mobile-menu">
    <div>
    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
    <span class="hamburger-box">
    <span class="hamburger-inner"></span>
    </span>
    </button>
    </div>
    </div>
    <div class="app-header__menu">
    <span>
    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
    <span class="btn-icon-wrapper">
    <i class="fa fa-ellipsis-v fa-w-6"></i>
    </span>
    </button>
    </span>
    </div> <div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
    <li class="app-sidebar__heading">Dashboards</li>
    <li>
    <a href="{{ URL::to('/home') }}" class="mm-active">
    <i class="metismenu-icon pe-7s-rocket"></i>
    Dashboard
    </a>
    </li>
    <li class="app-sidebar__heading">Components</li>
        <li>
            <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            Welcome Text
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
            <li>
                <a href="{{URL::to('admin/welcome/create')}}">
                <i class="metismenu-icon"></i>
                Add
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/welcome')}}">
                <i class="metismenu-icon">
                </i>Manage
                </a>
            </li>
            </ul>
        </li>
        <li>
            <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            Slider
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
            <li>
                <a href="{{URL::to('admin/slider/create')}}">
                <i class="metismenu-icon"></i>
                Add
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/slider')}}">
                <i class="metismenu-icon">
                </i>Manage
                </a>
            </li>
            </ul>
        </li>
        <li>
            <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            Committee
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
            <li>
                <a href="{{URL::to('admin/committee/create')}}">
                <i class="metismenu-icon"></i>
                Add
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/committee')}}">
                <i class="metismenu-icon">
                </i>Manage
                </a>
            </li>
            </ul>
        </li>
        <li>
            <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            Blog
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
            <li>
                <a href="{{URL::to('admin/blog/create')}}">
                <i class="metismenu-icon"></i>
                Add
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/blog')}}">
                <i class="metismenu-icon">
                </i>Manage
                </a>
            </li>
            </ul>
        </li>
        <li>
            <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            Event
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
            <li>
                <a href="{{URL::to('admin/event/create')}}">
                <i class="metismenu-icon"></i>
                Add
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/event')}}">
                <i class="metismenu-icon">
                </i>Manage
                </a>
            </li>
            </ul>
        </li>
        <li>
            <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            Contact
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
            <li>
                <a href="{{URL::to('admin/contact/view')}}">
                <i class="metismenu-icon"></i>
                View Contact
                </a>
            </li>
            </ul>
        </li>

        <li>
            <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            Gallery
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
            <li>
                <a href="{{URL::to('admin/gallery')}}">
                <i class="metismenu-icon"></i>
                 Image
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/video/')}}">
                <i class="metismenu-icon">
                </i>Video
                </a>
            </li>
            </ul>
        </li>
        <li>
            <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            Notice
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
            <li>
                <a href="{{URL::to('admin/notice/create')}}">
                <i class="metismenu-icon"></i>
                Add
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/notice')}}">
                <i class="metismenu-icon">
                </i>Manage
                </a>
            </li>
            </ul>
        </li>
        <li>
          <a href="{{URL::to('admin/landing')}}">
            <i class="metismenu-icon pe-7s-diamond"></i> Landing <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
          </a>
          <ul>
            <li>
              <a href="{{URL::to('admin/landing/create')}}">
                <i class="metismenu-icon"></i> Add </a>
            </li>
            <li>
              <a href="{{URL::to('admin/landing')}}">
                <i class="metismenu-icon"></i>Manage </a>
            </li>
          </ul>
        </li>
        <li class="app-sidebar__heading">Settings</li>
        <li>
          <a href="{{URL::to('admin/siteoption')}}">
            <i class="metismenu-icon pe-7s-diamond"></i> Site Setting
          </a>
        </li>
        <li>
          <a href="{{URL::to('admin/pagesetting')}}">
            <i class="metismenu-icon pe-7s-diamond"></i> Page Setting
          </a>
        </li>
    </ul>
    </div>
    </div>
    </div> 