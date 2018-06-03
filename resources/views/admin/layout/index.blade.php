@include('admin.layouts.header')
<!-- END: Header -->
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        @include('admin.layouts.side')
        @yield('content')
        {{--@include('admin.layouts.add')--}}
        {{--@include('admin.layouts.content')--}}
    </div>
    <!-- end:: Body -->
    <!-- begin::Footer -->
@include('admin.layouts.footer')

@yield('js')