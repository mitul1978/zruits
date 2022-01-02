@extends('backend.layouts.master')

@section('main-content')
<style type="text/css">
  grid-item-products img{width: 100% !important;}
</style>
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />

    <div class="container-fluid">
        <div class="row">
                     <div class="col-md-12">
                <div class="card">

@if(!empty($color_palette->color_palette_design))
  @include('backend.color_palette_template.' . $color_palette->color_palette_design->design)
@endif
</div>
</div>
</div>
</div>
@endsection
@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){

          $(".pro-slider-img .pro-img-view").fancybox();
		$(".custom-grid-item-products").hover(function(event) {
        $(".custom-rel-product-title").css({top: event.clientY, left: event.clientX}).show();
    }, function() {
        $(".custom-rel-product-title").hide();
    });

/*------------color pallet button js starts-----*/
    $(document).ready(function(){
   if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $('.product-visuals').on('click',function() {
              $('.custom-rel-product-title').toggleClass('myClass');
              $('.grid-container').toggleClass('afterclass');
              $('.related-product-overlay').toggleClass('opacity1');
      });
    }

    $('.scrollTo').click(function(){
      $('html, body').animate({
          scrollTop: $( $(this).attr('href') ).offset().top
      }, 700);
      return false;
  });
});
});
</script>
@endsection
