<!-- Plugins JS File -->
<script src="{{asset('/')}}assets/js/jquery.min.js"></script>

<script src="{{asset('/')}}assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery.hoverIntent.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery.waypoints.min.js"></script>
<script src="{{asset('/')}}assets/js/superfish.min.js"></script>
<script src="{{asset('/')}}assets/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}assets/js/bootstrap-input-spinner.js"></script>
<script src="{{asset('/')}}assets/js/jquery.plugin.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery.countdown.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery.elevateZoom.min.js"></script>
<script src="{{'/'}}assets/js/wNumb.js"></script>
<script src="{{'/'}}assets/js/bootstrap-input-spinner.js"></script>
<script src="{{'/'}}assets/js/nouislider.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.6.0.js"></script>--}}
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>



<!-- Main JS File -->
<script src="{{asset('/')}}assets/js/main.js"></script>
<script src="{{asset('/')}}assets/bootstrap-notify.min.js"></script>
<script src="{{asset('/')}}assets/js/demos/demo-4.js"></script>

@yield('scripts')
<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))

    $.notify("Success: {{\Illuminate\Support\Facades\Session::get('success')}}", {
        animate: {
            enter: 'animated fadeInRight',
            exit: 'animated fadeOutRight'
        }
    });
    @endif
    @php
        \Illuminate\Support\Facades\Session::forget('success')
    @endphp

    @if(\Illuminate\Support\Facades\Session::has('errors'))

    $.notify("Sorry:  {{\Illuminate\Support\Facades\Session::get('errors')}}", {
        animate: {
            enter: 'animated fadeInRight',
            exit: 'animated fadeOutRight'
        }
    });
    @endif
    @php
        \Illuminate\Support\Facades\Session::forget('errors')
    @endphp
</script>
<script>
    setTimeout(function () {
        $('#alert').slideUp();
    },4000);
</script>


