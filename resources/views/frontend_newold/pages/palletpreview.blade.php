@extends('layouts.appproduct')
@section('content')

<style>
  h3.custom-rel-product-title{
    position: absolute;
    opacity: 1!important;
        left: 50%;
  }
  .related-product-overlay{
    opacity: 1!important;
    top: 0%;
    left: 12%;
  }
  @media (max-width: 1366px){
    .pallets_9 .custom-elements img.d4-camera{
          top: 34%!important;
       }
       .pallets_9 .custom-elements img.d4-flower2{
        left: 76%!important;
        top: 61%!important;
       }
  }

</style>
    <div class="container-fluid">
        <div class="row">
                     <div class="col-md-12">
                <div class="card">
@if(!empty($colorpallete_design->design))
  @include('colorpallete_template1.' . $colorpallete_design->design)
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
		// $(".custom-grid-item-products").hover(function(event) {
  //       $(".custom-rel-product-title").css({top: event.clientY, left: event.clientX}).show();
  //   }, function() {
  //       $(".custom-rel-product-title").hide();
  //   });

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