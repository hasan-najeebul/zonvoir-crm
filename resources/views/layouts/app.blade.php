@include("layouts.header");
@include("layouts.sidebar");

<div class="main-content-area">
<div class="container-fluid">
    @yield('content')

 </div>
</div>

@include("layouts.footer");

@yield('script')




