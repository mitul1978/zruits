$(document).ready(function(){

            var selected_count1 = $('.selectedcat').length;
              var total_count1 = $('.category').length;
              if(selected_count1 == total_count1)
                 {
                   $('#category').addClass('selectAll');
                     $('#selectedcat').html('Deselect All');
                 }
                 else
                 {
                   $('#category').removeClass('selectAll');
                    $('#selectedcat').html('Select All');
                 }

             var selected_count2 = $('.selectdiv').length;
              var total_count2 = $('.division').length;
              if(selected_count2 == total_count2)
                 {
                   $('#division').addClass('selectAll');
                     $('#selectdiv').html('Deselect All');
                 }
                 else
                 {
                   $('#division').removeClass('selectAll');
                    $('#selectdiv').html('Select All');
                 }

            var selected_count3 = $('.selectedattr').length;
              var total_count3 = $('.attribute').length;
              if(selected_count3 == total_count3)
                 {
                   $('#attribute').addClass('selectAll');
                   $('#selectedattr').html('Deselect All');
                 }
                 else
                 {
                   $('#attribute').removeClass('selectAll');
                    $('#selectedattr').html('Select All');
                 }

             $(".grid-item").on('mouseover',function(){
               var id = $(this).attr('id');
                $("#name_"+id).css('color','#1e849e');
                $("#names_"+id).css('background','#1e849e');
             }).mouseout(function() {
                  $(".grid-item__name").css('color','#4D4D4D');
                  $(".grid-item__color").css('background','#4D4D4D');
              });
             var baseUrl = window.location.protocol;




             $('.division').on('click',function(){
              var paras = [];
              var para = '';

              $(this).toggleClass('selectdiv');
                $(this).toggleClass('active');
              var selected_count = $('.selectdiv').length;
              var total_count = $('.division').length;
              if(selected_count == total_count)
                 {
                   $('#division').addClass('selectAll');
                  $('#selectdiv').html('Deselect All');
                 }
                 else
                 {
                   $('#division').removeClass('selectAll');
                   $('#selectdiv').html('Select All');
                 }
                 var selected_count = $('.selectdiv').length +  $('.selectedcat').length  +  $('.selectedattr').length;
                          console.log(selected_count);
                        if( selected_count > 0){
                          $(".sidebar-right-valid").addClass('active');
                        }else{
                          $(".sidebar-right-valid").removeClass('active');
                        }
              //var division = $(this).data('division');

   });


            // $('.attribute').on('click',function(){
                $(document).on('click',".attribute",function () {
               $(this).toggleClass('selectedattr')
               $(this).toggleClass('active');
                var selected_count = $('.selectedattr').length;
              var total_count = $('.attribute').length;
              if(selected_count == total_count)
                 {
                   $('#attribute').addClass('selectAll');
                    $('#selectedattr').html('Deselect All');
                 }
                 else
                 {
                   $('#attribute').removeClass('selectAll');
                   $('#selectedattr').html('Select All');
                 }
                 var selected_count = $('.selectdiv').length +  $('.selectedcat').length  +  $('.selectedattr').length;
                          console.log(selected_count);
                        if( selected_count > 0){
                          $(".sidebar-right-valid").addClass('active');
                        }else{
                          $(".sidebar-right-valid").removeClass('active');
                        }
   });


             // $('.category').on('click',function(){
                $(document).on('click',".category",function () {
               $(this).toggleClass('selectedcat')
               $(this).toggleClass('active');
                var selected_count = $('.selectedcat').length;
              var total_count = $('.category').length;
              if(selected_count == total_count)
                 {
                   $('#category').addClass('selectAll');
                   $('#selectedcat').html('Deselect All');

                 }
                 else
                 {
                   $('#category').removeClass('selectAll');
                   $('#selectedcat').html('Select All');

                 }
                 var selected_count = $('.selectdiv').length +  $('.selectedcat').length  +  $('.selectedattr').length;
                          console.log(selected_count);
                        if( selected_count > 0){
                          $(".sidebar-right-valid").addClass('active');
                        }else{
                          $(".sidebar-right-valid").removeClass('active');
                        }
   });

                      $(document).on('click',".select-all",function () {
                        var id=$(this).attr('id')
                        console.log(id);
                        var sel='';
                        if(id=='division'){
                           sel="selectdiv";
                            var selected_count1 = $('.selectdiv').length;
                        var total_count1 = $('.division').length;
                     }
                     if(id=='category'){
                         sel="selectedcat";
                         var selected_count1 = $('.selectedcat').length;
                        var total_count1 = $('.category').length;
                     }
                     if(id=='attribute'){
                         sel="selectedattr";
                         var selected_count1 = $('.selectedattr').length;
                        var total_count1 = $('.attribute').length;
                     }
                     console.log(sel,selected_count1,total_count1);
                  if(selected_count1 == total_count1)
                 {

                   $('#'+id).removeClass('selectAll');
                   $('#'+sel).html('Select All');
                   $('.'+id).removeClass(sel);
                    $('.'+id).removeClass('active');
                 }
                 else
                 {

                   $('#'+id).addClass('selectAll');
                   $('#'+sel).html('Deselect All');
                   $('.'+id).addClass(sel);
                   $('.'+id).addClass('active');

                 }

                   var selected_count = $('.selectdiv').length +  $('.selectedcat').length  +  $('.selectedattr').length;
                          console.log(selected_count);
                        if( selected_count > 0){
                          $(".sidebar-right-valid").addClass('active');
                        }else{
                          $(".sidebar-right-valid").removeClass('active');
                        }


   });


                      $(".sidebar-right-valid").on('click',function(){
                        var button=$(this).attr('id');
                        console.log(button);
                        if($('#'+button).hasClass('active')){
                         $("."+button).click();
                        }else{
                          $('#sidebaropen').removeClass('open');
                        }
                      });






             // $('.apply-btn').on('click',function () {
   $(document).on('click',".apply-btn",function () {
      var loc = window.location;
    var baseURL = loc.protocol + "//" + loc.hostname;
    var baseURL = $(this).data('base_url');
var url_para;
var url_para1;
var url_para2;
var category;
var division;
var prefer;
var paras = [];
       var para;
       var paras1 = [];
       var para1;
       var paras2 = [];
       var para2;
       var url_para2,url_para1,url_para;
     if($('.selectdiv').length > 0)
     {
       var paras = [];
       var para;
       var paras1 = [];
       var para1;
       var paras2 = [];
       var para2;
       var url_para2,url_para1,url_para;

       $('.selectdiv').each(function(){
         para = '';
         para = $(this).attr('data-division');

         paras.push(para);

       });

       url_para = paras.toString();

       // var division = getParameterByName(url_para);
       // console.log(division);
     }else{

       $('.division').each(function(){
         para = '';
         para = $(this).attr('data-division');

         paras.push(para);
         // console.log(paras);
       });

       url_para = paras.toString();

     }
     if($('.selectedattr').length > 0)
     {
       $('.selectedattr').each(function(){
         para1 = '';
         para1 = $(this).attr('data-attribute');

         paras1.push(para1);

       });

        url_para1 = paras1.toString();
       // var prefer = getParameterByName(url_para1);

     }else{
       $('.attribute').each(function(){
         para1 = '';
         para1 = $(this).attr('data-attribute');

         paras1.push(para1);

       });

        url_para1 = paras1.toString();
       // var prefer = getParameterByName(url_para1);

     }
     if($('.selectedcat').length > 0)
     {

       $('.selectedcat').each(function(){
         para2 = '';
         para2 = $(this).attr('data-category');

         paras2.push(para2);

       });

       url_para2 = paras2.toString();

       // var category = getParameterByName(url_para2);

     }else{

       $('.category').each(function(){
         para2 = '';
         para2 = $(this).attr('data-category');

         paras2.push(para2);

       });

       url_para2 = paras2.toString();
     }


     if(url_para2 == undefined)
     {
       url_para2 = '';
     }
     if(url_para == undefined)
     {
       url_para = '';
     }
     if(url_para1 == undefined)
     {
       url_para1 = '';
     }
        var utm_source = sessionStorage.getItem('utm_source');
        var utm_medium = sessionStorage.getItem('utm_medium');
        var utm_campaign = sessionStorage.getItem('utm_campaign');
      if (utm_campaign && utm_source && utm_medium){
       window.location.href = baseURL+'/products?laminates='+url_para2+'&applications='+url_para+'&textures='+url_para1+'&utm_source='+utm_medium+'&utm_medium='+utm_medium+'&utm_campaign='+utm_campaign;
      }else{
      window.location.href = baseURL+'/products?laminates='+url_para2+'&applications='+url_para+'&textures='+url_para1;
      }


   });


   /*mobile product listing sidebar js*/

   $(".sidebar-right-filters").on('click',function(){
         $(".sldm-toggle").css('right','0');
   });
   $(".close").on('click',function(){
      $(".sldm-toggle").css('right','-48px');
   });



  $(document).on('change', '.divs input', function(e) {
    var $this = $(this),
      value = $this.val();
     $(this).parent().toggleClass('filterli');
    // Get values of checked checkboxes
    var value_array = $('.divs input').filter(':checked').map(function() {
      return this.value;
    }).get();
    $('#out').html(value_array.join());
     var divcount = $(".division").length;
      var count = $("input[name=division]:checkbox:checked").length;
     console.log(divcount,count)
      if(divcount == count){
        $(".select-alldiv").attr('checked','true');
        $(".select-alldiv").parent().removeClass('filterli');
        $("#divlabel").html('Deselect All');
      }
      else{
         $(".select-alldiv").attr('checked','false');
         $(".select-alldiv").removeAttr('checked');
          $(".select-alldiv").parent().addClass('filterli');
            $("#divlabel").html('Select All');
      }
  });
 var divcount = $(".division").length;
      var count = $("input[name=division]:checkbox:checked").length;
     console.log(divcount,count)
      if(divcount == count){
        $(".select-alldiv").attr('checked','true');
          $("#divlabel").html('Deselect All');
      }
      else{
         $(".select-alldiv").attr('checked','false');
         $(".select-alldiv").removeAttr('checked');
           $("#divlabel").html('Select All');
      }
  $(document).on('change', '.cats input', function(e) {
    var $this = $(this),
      value = $this.val();
        $(this).parent().toggleClass('filterli');
    // Get values of checked checkboxes
    var value_array = $('.cats input').filter(':checked').map(function() {
      return this.value;
    }).get();
    $('#out1').html(value_array.join());
      var catcount = $(".category").length;
      var count1 = $("input[name=category]:checkbox:checked").length;
      //console.log(divcount,count);
      if(catcount == count1){
        $(".select-allcat").attr('checked','true');
         $(".select-allcat").parent().removeClass('filterli');
          $("#catlabel").html('Deselect All');
      }
      else{
         $(".select-allcat").attr('checked','false');
          $(".select-allcat").parent().addClass('filterli');
         $(".select-allcat").removeAttr('checked');
          $("#catlabel").html('Select All');
      }
  });

  var catcount = $(".category").length;
      var count1 = $("input[name=category]:checkbox:checked").length;
      //console.log(divcount,count);
      if(catcount == count1){
        $(".select-allcat").attr('checked','true');
        $("#catlabel").html('Deselect All');
      }
      else{
         $(".select-allcat").attr('checked','false');
         $(".select-allcat").removeAttr('checked');
         $("#catlabel").html('Select All');
      }

  $(document).on('click', '.attrs input', function(e) {
    var $this = $(this),
      value = $this.val();
       $(this).parent().toggleClass('filterli');
    // Get values of checked checkboxes
    var value_array = $('.attrs input').filter(':checked').map(function() {
      return this.value;
    }).get();
    $('#out2').html(value_array.join());
    var attcount = $(".attribute").length;
      var count2 = $("input[name=attribute]:checkbox:checked").length;
      //console.log(divcount,count);
      if(attcount == count2){
        $(".select-allattr").attr('checked','true');
       $('.select-allattr').parent().removeClass('filterli');
       $("#atrlable").html('Deselect All');
      }
      else{
        $(".select-allattr").attr('checked','false');
        $('.select-allattr').removeAttr('checked');
        $('.select-allattr').parent().addClass('filterli');
        $("#atrlable").html('Select All');
      }
  });
   var attcount = $(".attribute").length;
      var count2 = $("input[name=attribute]:checkbox:checked").length;
      //console.log(divcount,count);
      if(attcount == count2){
        $(".select-allattr").attr('checked','true');
        $("#atrlable").html('Deselect All');
      }
      else{
        $(".select-allattr").attr('checked','false');
        $('.select-allattr').removeAttr('checked');
        $("#atrlable").html('Select All');
      }
  $('.select-alldiv').on('click',function(){

      if($(this).is(":checked") ) {
            $("input[name=division]:checkbox").attr("checked", true);
              $("#divlabel").html('Deselect All');
            $(".division1").parent().removeClass('filterli');
            $(".select-alldiv").removeClass('filterli');
      }
      else{
        $("input[name=division]:checkbox").attr("checked", false);
        $(".division1").parent().addClass('filterli');
        $(".select-alldiv").addClass('filterli');
          $("#divlabel").html('Select All');
      }
  });



  $('.select-allcat').click(function(){ //".checkbox" change
      if( $(this).is(":checked") ) {
            $("input[name=category]:checkbox").attr("checked", true);
           $(".category1").parent().removeClass('filterli');
        $(".select-allcat").removeClass('filterli');
        $("#catlabel").html('Deselect All');
      }
      else{
        $("input[name=category]:checkbox").attr("checked", false);
          $(".category1").parent().addClass('filterli');
         $(".select-allcat").addClass('filterli');
         $("#catlabel").html('Select All');
      }
  });



  $('.select-allattr').click(function(){ //".checkbox" change
      if( $(this).is(":checked") ) {
            $("input[name=attribute]:checkbox").attr("checked", true);
             $(".attribute1").parent().removeClass('filterli');
            $(".select-allattr").removeClass('filterli');
            $("#atrlable").html('Deselect All');
      }
      else{
        $("input[name=attribute]:checkbox").attr("checked", false);
        $(".attribute1").parent().addClass('filterli');
            $(".select-allattr").addClass('filterli');
            $("#atrlable").html('Select All');
      }
  });



   $(".cat_items").on('click',function(){
                        var numberOfChecked = $('input:checkbox:checked').length;
                        console.log(numberOfChecked);
                        if(numberOfChecked > 0){
                          $(".sidebar-right-valid").addClass('active');
                        }else{
                            $(".sidebar-right-valid").removeClass('active');
                        }
                      });



$(document).on('click',".apply-btn-mobile",function () {
  var loc = window.location;
  var baseURL = loc.protocol + "//" + loc.hostname;
  var baseURL = $(this).data('base_url');
  var parat = $("#out").html();
  // var parat = '';
  if(parat != ''){
    var para = parat.replace(",select-all", "");
  }else{
    var para=$("#appout").html();
  }

  var parat1 = $("#out1").html();
  //var parat1 = '';
  if(parat1 != ''){
     var para1 = parat1.replace(",select-all", "");
  }else{
    var para1=$("#lamout1").html();
  }

  var parat2 = $("#out2").html();
  //var parat2 = '';
   if(parat2 != ''){
      var para2 = parat2.replace(",select-all", "");
  }else{
    var para2=$("#textout2").html();
  }

    var utm_source = sessionStorage.getItem('utm_source');
        var utm_medium = sessionStorage.getItem('utm_medium');
        var utm_campaign = sessionStorage.getItem('utm_campaign');
      if (utm_campaign && utm_source && utm_medium){
       window.location.href = baseURL+'/products?laminates='+para1+'&applications='+para+'&textures='+para2+'&utm_source='+utm_medium+'&utm_medium='+utm_medium+'&utm_campaign='+utm_campaign;
      }else{
      window.location.href = baseURL+'/products?laminates='+para1+'&applications='+para+'&textures='+para2;
      }


});






   /*end js */




          // $(".sidebar-right-filters-item").click(function(){
          //     $(".sidebar").addClass("open");
          //   });
          //   $(".sidebar-right-valid").click(function(){
          //     $(".sidebar").removeClass("open");
          //   });
            $("body").on('click','.wish1',function(){
                var id = $(this).data('id');

                $("#prod_id").val(id);
            });

            // $("body").on('click','.wish1',function(){

            //      var loc =  window.location;
            //      var baseURL = loc.protocol + "//" + loc.hostname;
            //     var product_id = $(this).data('id');

            //     var data = {'product_id':product_id};
            //     $.ajax({
            //           url: baseURL+"/wishlist",
            //           type: 'post',
            //           data:data,
            //           success: function(result) {
            //             if(result == 'success'){

            //               var imgs = baseURL+'/frontend/images/redwishlist.png';
            //               document.getElementById("wishlist"+product_id).src = imgs;
            //                //    setTimeout(function(){
            //                //      location.reload();
            //                // }, 1000);
            //             }

            //           }
            //     });
            // });

    

            $("body").on('click','.wish2',function(){

                 var loc =  window.location;
                 var baseURL = loc.protocol + "//" + loc.hostname;
                var product_id = $(this).data('id');
                var data = {'product_id':product_id};
                $.ajax({
                      url: baseURL+"/wishlistprod",
                      type: 'post',
                      data:data,
                      success: function(result) {
                         if(result == 'success'){
                          var imgs = baseURL+'/frontend/images/redwishlist.png';
                          document.getElementById("wishlist"+product_id).src = imgs;
                         }
                           //    setTimeout(function(){
                           //      location.reload();
                           // }, 1000);

                      }
                });
            });

                  $("#abcd").on('click',function(){console.log("#abcd");
                   var product_id = $("#prod_id").val();
                    var name = $("#name1").val();
                    var mobile1 = $("#mobile1").val();
                   var email = $("#email").val();
                   var utm_source = $(".utm_source").val();
                   var utm_medium = $(".utm_medium").val();
                   var utm_campaign = $(".utm_campaign").val();
                   var loc = window.location;
                   var baseURL = loc.protocol + "//" + loc.hostname;
                   var data = {'product_id':product_id,'name':name,'mobile':mobile1,'email':email,'utm_source':utm_source,'utm_campaign':utm_campaign,'utm_medium':utm_medium};
                   $.ajax({
                      url: baseURL+"/wishlist",
                      type: 'post',
                      data:data,
                      success: function(result) {
                        if(result == 'success'){
                             //$("#abcd")[0].reset();
                             $("#msg").html("We will save your wishlist");
                              setTimeout(function(){
                                $(".alert-success").html('');
                           }, 4000);
                             $("#wishlist").attr('src',baseURL+'/frontend/images/redwishlist.png');
                              setTimeout(function(){
                                $("#msg").html("");
                                $(".close").click();
                           }, 2000);

                        }
                        else{
                           $("#msg").html("We will not save your wishlist");
                        }
                      }
                  });

            });
         });



 function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp(regexS);
            var results = regex.exec(window.location.search);
            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }
