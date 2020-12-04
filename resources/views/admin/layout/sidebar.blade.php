<div class="sidebar bg-dark">
    <nav class="sidebar-nav">
        <ul class="nav">
            @php
            $home = false;
            if(url()->current() == url('admin')){
            $home = true;
            }
            @endphp
            <li class="nav-item">
                <a class="nav-link @if($home) active @endif" href="{{ url('admin') }}">
                    <i class="nav-icon icon-home"></i> {{ trans('admin.dashboard.title') }}
                </a>
            </li>

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/schools') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.school.title') }}</a></li> --}}
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/students') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.student.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/attendancies') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.attendancy.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/devices') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.device.title') }}</a></li>
            {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
