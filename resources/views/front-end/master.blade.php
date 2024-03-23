
<!DOCTYPE html>
<html lang="eng">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- header -->

<title>@yield('title')</title>

@include('front-end.includes.header')
<!-- body -->
@yield('body')
<!-- footer -->
@include('front-end.includes.footer')

<!-- js -->
<script type="text/javascript" src="{{ asset('/') }}front-end/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="{{ asset('/') }}front-end/js/modernizr.custom.js"></script>

<script src="{{ asset('/') }}front-end/js/minicart.min.js"></script>
<script>
    // Mini Cart
    paypal.minicart.render({
        action: '#'
    });

    if (~window.location.search.indexOf('reset=true')) {
        paypal.minicart.reset();
    }
</script>

<!-- single -->
<script src="{{ asset('/') }}front-end/js/imagezoom.js"></script>
<!-- single -->
<!-- Custom-JavaScript-File-Links -->
<script src="{{ asset('/') }}front-end/js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
</script>
<!-- cart-js -->
<!-- FlexSlider -->
<script src="{{ asset('/') }}front-end/js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<!-- //FlexSlider-->
<!-- //cart-js -->
<script type="text/javascript" src="{{ asset('/') }}front-end/js/jquery-ui.js"></script>
<!-- script for responsive tabs -->
<script src="{{ asset('/') }}front-end/js/easy-responsive-tabs.js"></script>
<script>
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<!-- //script for responsive tabs -->
<!-- stats -->
<script src="{{ asset('/') }}front-end/js/jquery.waypoints.min.js"></script>
<script src="{{ asset('/') }}front-end/js/jquery.countup.js"></script>
<script>
    $('.counter').countUp();
</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('/') }}front-end/js/move-top.js"></script>
<script type="text/javascript" src="{{ asset('/') }}front-end/js/jquery.easing.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->


<!-- for bootstrap working -->
<script type="text/javascript" src="{{ asset('/') }}front-end/js/bootstrap.js"></script>

</html>
