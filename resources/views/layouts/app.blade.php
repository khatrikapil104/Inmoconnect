<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Include Head -->
@include('includes.head')

<body>
    @if(!empty(auth()->user()) && \Route::currentRouteName() != routeNamePrefix().'user.profileSetup' )
    <!-- Include Header -->
    @include('includes.header')
     <!-- Include Menu -->
     @include('includes.menu')
    @endif

    
    <!-- Include Content -->
    <!-- <div class="container" id="main"> -->
        
    @if(Session::has('error'))
        <script type="text/javascript">
            $(document).ready(function(e) {

                show_message("{{{ Session::get('error') }}}", 'error');
            });
        </script>
    @endif
    @if(Session::has('success'))
        <script type="text/javascript">
            $(document).ready(function(e) {
                show_message("{{{ Session::get('success') }}}", 'success');
            });
        </script>
    @endif
    @if(Session::has('flash_notice'))
        <script type="text/javascript">
            $(document).ready(function(e) {
                show_message("{{{ Session::get('flash_notice') }}}", 'success');
            });
        </script>
    @endif
    @if(Session::has('warning'))
        <script type="text/javascript">
            $(document).ready(function(e) {
                show_message("{{{ Session::get('warning') }}}", 'warning');
            });
        </script>
    @endif
    @yield('content')
        
    <!-- </div> -->

    <!-- Include Footer -->
    @include('includes.footer')
            
    @stack('scripts')
</body>

</html>
