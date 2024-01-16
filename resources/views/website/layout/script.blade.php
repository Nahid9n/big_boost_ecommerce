
<!-- latest jquery-->
<script src="{{asset('/')}}website/assets/js/jquery-3.3.1.min.js" ></script>

<!-- menu js-->
<script src="{{asset('/')}}website/assets/js/menu.js"></script>

<!-- slick js-->
<script  src="{{asset('/')}}website/assets/js/slick.js"></script>

<!-- Bootstrap js-->
<script src="{{asset('/')}}website/assets/js/bootstrap.bundle.min.js" ></script>

<!-- Timer js-->
<script src="{{asset('/')}}website/assets/js/timer.js" ></script>

<!-- Zoom js-->
<script src="{{asset('/')}}website/assets/js/jquery.elevatezoom.js"></script>

<!-- Theme js-->
<script src="{{asset('/')}}website/assets/js/script.js" ></script>

<!-- modal js-->
<script src="{{asset('/')}}website/assets/js/modal.js" ></script>

<script>
    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });
</script>

<!-- modal js-->
<script src="{{asset('/')}}website/assets/js/modal.js" ></script>

<script>
    $(document).ready(function() {
        $('.color-choose input').on('click', function() {
            var watchsColor = $(this).attr('data-image');

            $('.active').removeClass('active');
            $('.left-column img[data-image = ' + watchsColor + ']').addClass('active');
            $(this).addClass('active');
        });

    });
</script>

<script>
    $( ".size" ).click(function() {
        $( ".size" ).css('background-color', 'yellow');
    });
</script>
<!-- facebook chat section start -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = '../../../connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
{{--<!-- Vendor JS-->--}}
{{--<script src="{{asset('/')}}website/assets/js/vendor/modernizr-3.6.0.min.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/vendor/jquery-3.6.0.min.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/vendor/bootstrap.bundle.min.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/slick.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/jquery.syotimer.min.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/wow.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/jquery-ui.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/perfect-scrollbar.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/magnific-popup.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/select2.min.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/waypoints.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/counterup.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/jquery.countdown.min.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/images-loaded.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/isotope.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/scrollup.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/jquery.vticker-min.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/jquery.theia.sticky.js"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/plugins/jquery.elevatezoom.js"></script>--}}
<!-- Template  JS -->
{{--<script src="{{asset('/')}}website/assets/js/maind134.js?v=3.4"></script>--}}
{{--<script src="{{asset('/')}}website/assets/js/shopd134.js?v=3.4"></script>--}}

{{-- Success or fail message--}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>


{{-- toastr js  --}}
{{--<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>--}}

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}


@stack('js')

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

