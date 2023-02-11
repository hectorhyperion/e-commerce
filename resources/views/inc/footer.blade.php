
<div class="clearfix"></div>
<!-- //footer -->
<div class="footer">
<div class="container">
<div class="w3_footer_grids">
<div class="col-md-3 w3_footer_grid">
    <h3>Contact</h3>

    <ul class="address">
        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:agimqwertyakomaye@gmail.com">agimqwertyakomaye@gmail.com</a></li>
        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="tel:2349038087108" > +234 9038087108</a></li>
    </ul>
</div>
<div class="col-md-3 w3_footer_grid">
    <h3>Information</h3>
    <ul class="info">

        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="/Contact">Contact Us</a></li>
        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Short Codes</a></li>
        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">FAQ's</a></li>
        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="/product">Special Products</a></li>
    </ul>
</div>
<div class="col-md-3 w3_footer_grid">
    <h3>Category</h3>
    <ul class="info">
        @if(count($data) > 0)
        @foreach ($data as $item)


        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{$item->category_name}}">{{$item->category_name}}</a></li>
@endforeach
@else
@endif
    </ul>
</div>
<div class="col-md-3 w3_footer_grid">
    <h3>Profile</h3>
    <ul class="info">
        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="/product">Store</a></li>
        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="/show/Cart">My Cart</a></li>
        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="/Login">Login</a></li>
        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="/Register">Create Account</a></li>
    </ul>
</div>
<div class="clearfix"> </div>
</div>
</div>

<div class="footer-copy">

<div class="container">
<p>© 2022 Super Market. All rights reserved | Design by <a href="/">E-commerce</a></p>
</div>
</div>

</div>
<div class="footer-botm">
<div class="container">
<div class="w3layouts-foot">
    <ul>
        <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
        <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
    </ul>
</div>
<div class="payment-w3ls">
    <img src="{{url('assets/images/card.png')}}" alt=" " class="img-responsive">
</div>
<div class="clearfix"> </div>
</div>
</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

<!-- top-header and slider -->
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
<script src="{{url('assets/js/minicart.min.js')}}"></script>
<script>
// Mini Cart
paypal.minicart.render({
action: '#'
});

if (~window.location.search.indexOf('reset=true')) {
paypal.minicart.reset();
}
</script>
<!-- main slider-banner -->
<script src="{{url('assets/js/skdslider.min.js')}}"></script>
<link href="{{url('assets/css/skdslider.css')}}" rel="stylesheet">
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

jQuery('#responsive').change(function(){
$('#responsive_wrapper').width(jQuery(this).val());
});

});
</script>
<!-- //main slider-banner -->
