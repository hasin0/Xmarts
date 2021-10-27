
<!-- Jquery -->
<script src="{{asset('Frontends/js/jquery.min.js')}}"></script>
<script src="{{asset('Frontends/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('Frontends/js/jquery-ui.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('Frontends/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('Frontends/js/bootstrap.min.js')}}"></script>
<!-- Color JS -->
<script src="{{asset('Frontends/js/colors.js')}}"></script>
<!-- Slicknav JS -->
<script src="{{asset('Frontends/js/slicknav.min.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{asset('Frontends/js/owl-carousel.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{asset('Frontends/js/magnific-popup.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{asset('Frontends/js/waypoints.min.js')}}"></script>
<!-- Countdown JS -->
<script src="{{asset('Frontends/js/finalcountdown.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{asset('Frontends/js/nicesellect.js')}}"></script>
<!-- Flex Slider JS -->
<script src="{{asset('Frontends/js/flex-slider.js')}}"></script>
<!-- ScrollUp JS -->
<script src="{{asset('Frontends/js/scrollup.js')}}"></script>
<!-- Onepage Nav JS -->
<script src="{{asset('Frontends/js/onepage-nav.min.js')}}"></script>
<!-- Easing JS -->
<script src="{{asset('Frontends/js/easing.js')}}"></script>
<!-- Active JS -->
<script src="{{asset('Frontends/js/active.js')}}"></script>

<script>
    setTimeout(function() => {
        $('#alert').slideUp();
        
    }, 4000);
</script>

@yield('scripts')