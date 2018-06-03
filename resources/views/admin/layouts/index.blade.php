@include('admin.layouts.head')
@include('admin.layouts.nav')
@include('admin.layouts.side')
@include('admin.layouts.errors')
<div class="content-wrapper">
    @yield('content')
    @include('admin.modals.AddNewTaskModal')
</div>
@include('admin.layouts.footer')
@include('admin.layouts.js')
@yield('js')