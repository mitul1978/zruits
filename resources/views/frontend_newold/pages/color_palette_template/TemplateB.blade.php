<style type="text/css">
    .hide{
        display: none !important;
      }
      button.slick-next.slick-arrow, button.slick-prev.slick-arrow {
        display: none !important;
    }
    body.product_page.modal-open{
      padding-right: 0px !important;
    }
      /* .smooth-scroll-block{
          position: fixed;
       }*/
       .error{border-bottom: 1px solid red !important;}
     /*  #main-container.smoothScroll{
           position: fixed;
       }*/

    .grid-item-products img{
      height: 100%;
      object-fit: cover;
    }

    /*.product-assets{
      position: fixed;
    }*/
    /*product animation----------------------------------------------- */
    .grid-item-products:hover img{
      opacity: 0.9;
    }
    /*.grid-item-products{
      box-shadow: 0px 0px 6px #000;
    }*/
    .grid-item-products{
      /*box-shadow: 0px 15px 15px -1px #010101;*/
      /*box-shadow: 0px 15px 15px -1px #000000;*/
      /*box-shadow: -5px 15px 15px -4px #000000;*/
      /*box-shadow: 5px 5px 25px #000000;*/
      /*box-shadow: -15px 24px 30px #1f1f1f;*/
      /*box-shadow:  0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);*/
      box-shadow:  0 19px 38px rgba(0,0,0,0.50), 0 15px 12px rgba(0,0,0,0.52);
    }
    .product-mainContent{
      /*background: linear-gradient(284deg, rgba(212,212,212,1) 0%, rgba(169,169,169,1) 100%), url(../img/bgs/texture-bg.jpg) repeat!important;*/
    }

    @if(!empty($color_palette_products) && count($color_palette_products) > 0)
    #colorpalletid.template2-bg{{count($color_palette_products)}}{
        background: url(/frontend/images/pallete-icons/t2/bg/{{count($color_palette_products)}}-palletbg.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }

    #colorpalletid.Pallete_Design_{{count($color_palette_products)}}{
        background: url(/frontend/images/pallete-icons/t2/bg/{{count($color_palette_products)}}-palletbg.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }
    @if(count($color_palette_products) <= 7)
    .grid-container {
        display: grid;
        width: 60%!important;
        margin: 0px auto;
        grid-template-columns: repeat(20, 35px);
        grid-template-rows: repeat(29, 13px);
        grid-gap: 6px;
    }

    @media screen and (min-width: 1300px){
    .grid-container{
        grid-template-columns: repeat(20, 40px);
        grid-template-rows: repeat(29, 15px);
      }
    }

    @media screen and (min-width: 1440px){
    .grid-container{
      grid-template-columns: repeat(20, 60px);
      grid-template-rows: repeat(29, 23px);
    }
    }
    .item0{
       grid-column: 1 / 4;
      grid-row: 5/27;
    }
    .item1{

       grid-column: 7 / 15;
      grid-row: 7/23;
    }
    .item2{
      grid-column: 12 / 18;
        grid-row: 1/11;
    }
    .item3{

       grid-column: 2 / 10;
        grid-row: 1/16;
    }

    .item4{
        grid-column: 13 /19;
        grid-row: 15/28;
    }

    .item5{
        grid-column: 3/ 12;
        grid-row: 14/25;
    }

    .item6{

       grid-column: 9 / 13;
        grid-row: 3/12;
    }

    @media screen and (max-width: 767px){

      .grid-container{
        grid-template-columns: repeat(20, 10px);
        grid-template-rows: repeat(39, 6px);
        margin-top: 55px;
      }
    .item0{
     grid-column: 1/ 11;
        grid-row: 12/25;
    }
    .item1{

       grid-column: 10 / 28;
        grid-row: 1/15;
    }
    .item2{
     grid-column: 13 / 25;
        grid-row: 15/30;

    }
    .item3{
          grid-column: 8/ 19;
        grid-row: 25/39;
    }
    .item4{
          grid-column: 5/16;
        grid-row: 5/20;
    }
    .item5{
     grid-column: 3/ 11;
        grid-row: 25/37;
    }
    .item6{
    grid-column: 7 / 15;
        grid-row: 16/27;
    }
    .item7{
       grid-column: 1 / 10;
        grid-row: 3/12;
    }
    }
    @elseif(count($color_palette_products) == 8)
    .grid-container {
        display: grid;
        width: 75%!important;
        margin: 0px auto;
        grid-template-columns: repeat(20, 35px);
        grid-template-rows: repeat(33, 10px);
        grid-gap: 5px;
    }

    @media screen and (min-width: 1300px){
    .grid-container{
      grid-template-columns: repeat(20, 39px);
      grid-template-rows: repeat(32, 11px);
    }
    }

    @media screen and (min-width: 1440px){
    .grid-container{
       /*grid-template-columns: repeat(20, 60px);
        grid-template-rows: repeat(32, 16px);*/
        grid-template-columns: repeat(20, 60px);
        grid-template-rows: repeat(32, 19px);
        /*margin: 0px;*/
    }
    }
    .item0{
        grid-column: 1 / 10;
        grid-row: 20/32;
    }
    .item1{
            grid-column: 14 / 21;
        grid-row: 3/12;
    }
    .item2{
        grid-column: 13/ 20;
        grid-row: 22/33;
    }
    .item3{
        grid-column: 7/ 15;
        grid-row: 7/26;
    }
    .item4{
        grid-column: 10 / 13;
        grid-row: 1/11;
    }
    .item5{
        grid-column: 5/9;
        grid-row: 1/24;
    }
    .item6{
      grid-column:14 / 18;
        grid-row: 13/21;
    }
    .item7{
    grid-column: 2/7;
        grid-row: 7/17;
    }

    @media  screen and (max-width: 824px) and (orientation: landscape){
    .grid-container{
            grid-template-columns: repeat(20, 24px);
        grid-template-rows: repeat(39, 5px);

    }
    }
    @media screen and (max-width: 767px){

      .grid-container{
           grid-template-columns: repeat(20, 19px);
        grid-template-rows: repeat(39, 3px);
        margin-top: 42px;
      }
    }
    @media (min-width: 320px) and (max-width: 480px) {
    .grid-container{
          grid-template-columns: repeat(20, 14px);
          grid-template-rows: repeat(45, 8px);
          margin-top: 55px;
          margin: 50px 0px 0px;
        }
    .item0{
        grid-column: 1 / 14;
        grid-row:5/15;
    }
    .item1{
        grid-column: 2/ 8;
        grid-row: 27/42;
    }
    .item2{
        grid-column: 7/ 21;
        grid-row: 30/39;
    }
    .item3{
        grid-column: 5 / 16;
        grid-row: 13/31;
    }
    .item4{
        grid-column: 9/21;
        grid-row: 10/18;
    }
    .item5{
    grid-column: 14 / 21;
        grid-row: 20/27;
    }
    .item6{
        grid-column: 11/ 17;
        grid-row: 34/46;
    }
    .item7{
    grid-column: 13 / 19;
        grid-row: 1/12;
    }
    }
    @elseif(count($color_palette_products) == 9)
    .grid-container {
        display: grid;
        width: 75%!important;
        margin: 0px auto;
        grid-template-columns: repeat(25, 29px);
        grid-template-rows: repeat(29, 10px);
        grid-gap: 5px;
    }

    @media screen and (min-width: 1300px){
    .grid-container{
        grid-template-columns: repeat(25, 36px);
        grid-template-rows: repeat(32, 15px);
    }
    }

    @media screen and (min-width: 1440px){
    .grid-container{
        grid-template-columns: repeat(26, 45px);
        grid-template-rows: repeat(32, 23px);

    }
    }
    .item0{
        grid-column: 1 /11;
        grid-row: 19/28;
    }
    .item1{
        grid-column: 15 / 26;
        grid-row: 17/28;
    }
    .item2{
            grid-column: 10 /19;
        grid-row: 6/22;
    }
    .item3{
        grid-column: 8 / 13;
        grid-row: 11/18;
    }
    .item4{
        grid-column: 23/ 27;
        grid-row: 20/30;
    }
    .item5{
        grid-column: 1 / 12;
        grid-row: 1/10;
      }
    .item6{
    grid-column: 18 / 22;
        grid-row: 9/24;
    }
    .item7{
    grid-column: 2/ 7;
        grid-row: 5/22;
    }
    .item8{
        grid-column: 20/ 27;
        grid-row: 3/11;
    }

    @media  screen and (max-width: 824px) and (orientation: landscape){
    .grid-container{
        grid-template-columns: repeat(25, 15px);
        grid-template-rows: repeat(29, 5px);
    }
    }

    @media screen and (max-width: 767px){
      .grid-container{
        grid-template-columns: repeat(25, 15px);
        grid-template-rows: repeat(29, 5px);
        margin: 40px auto;
      }
    }
    @media screen and (max-width: 640px){
      .grid-container{
        grid-template-columns: repeat(25, 15px);
        grid-template-rows: repeat(29, 5px);
        margin: 40px auto;
      }
    }
    @media (min-width: 320px) and (max-width: 480px) {
    .grid-container{
        grid-template-columns: repeat(20, 12px);
        grid-template-rows: repeat(55, 5px);
        margin-top: 80px;
        margin: 50px 0px 0px;
    }
    .item0{
    grid-column: 2/ 10;
        grid-row: 30/53;
    }
    .item1{
        grid-column: 6 / 20;
        grid-row: 16/40;
    }
    .item2{
    grid-column: 1 / 17;
        grid-row: 15/26;
    }
    .item3{
    grid-column: 5/ 18;
        grid-row: 34/44;
    }
    .item4 {
        grid-column: 15 /28;
        grid-row: 12/31;
      }
    .item5{
    grid-column: 13/ 23;
        grid-row: 36/52;
      }
    .item6{
          grid-column: 8 / 16;
        grid-row: 46/56;
    }
    .item7{
        grid-column: 4 / 12;
        grid-row:1/22;
    }
    .item8{
        grid-column: 14/ 21;
        grid-row: 4/19;
    }


    }
    @elseif(count($color_palette_products) == 10)
     .grid-container {
        display: grid;
        width: 75%!important;
        margin: 0px auto;
        grid-template-columns: repeat(21, 35px);
        grid-template-rows: repeat(32, 9px);
        grid-gap: 6px;
    }

    @media screen and (min-width: 1300px){
    .grid-container{
      grid-template-columns: repeat(21, 40px);
        grid-template-rows: repeat(32, 10px);
      }
    }

    @media screen and (min-width: 1440px){
    .grid-container{
      grid-template-columns: repeat(21, 60px);
        grid-template-rows: repeat(32, 19px);
        /*margin:0px;*/
    }
    }


    .item0{
          grid-column: 12 / 20;
        grid-row: 4/16;
    }
    .item1{
        grid-column: 18 /21;
        grid-row: 1/19;
    }
    .item2{
        grid-column: 14/ 22;
        grid-row: 15/25;
    }
    .item3{
        grid-column: 8 / 15;
        grid-row: 8/26;
    }
    .item4{
        grid-column: 1 / 11;
        grid-row: 1/12;
    }
    .item5{
        grid-column: 7/10;
        grid-row: 6/16;
    }
    .item6 {
        grid-column: 3 / 6;
        grid-row: 6/24;
    }
    .item7{
    grid-column: 2/ 9;
        grid-row: 22/31;
    }
    .item8{
    grid-column: 11 / 14;
        grid-row: 21/33;
    }
    .item9{
            grid-column: 16 / 20;
        grid-row: 24/32;
    }

    @media  screen and (max-width: 824px) and (orientation: landscape){
    .grid-container{
    grid-template-columns: repeat(20, 22px);
        grid-template-rows: repeat(35, 4px);
    }
    }
    @media screen and (max-width: 767px){
     .grid-container{
        margin: 40px auto;
        grid-template-columns: repeat(20, 20px);
        grid-template-rows: repeat(29, 4px);
        width: 70%!important;
      }
    }
    @media screen and (max-width: 641px){
     .grid-container{
        margin: 40px auto;
        grid-template-columns: repeat(20, 16px);
        grid-template-rows: repeat(29, 3px);
      }
    }
    @media (min-width: 320px) and (max-width: 480px) {
    .grid-container{
      grid-template-columns: repeat(29, 11px);
      grid-template-rows: repeat(40, 10px);
      margin: 50px 0px;
    }
    .item0{
        grid-column: 11 / 21;
        grid-row: 20/39;
    }
    .item1{
    grid-column: 9/ 22;
        grid-row: 34/41;
    }
    .item2{
        grid-column: 6/ 20;
        grid-row: 10/28;
    }
    .item3{
        grid-column: 5/ 13;
        grid-row: 24/40;
    }
    .item4{
        grid-column: 16 /23;
        grid-row: 1/19;
    }
    .item5{
        grid-column: 6/ 19;
        grid-row: 4/11;
    }
    .item6{
        grid-column: 3 / 10;
        grid-row: 2/15;
    }
    .item7{
    grid-column: 9 /17;
        grid-row: 10/16;
    }
    .item8{
        grid-column: 1/ 9;
        grid-row: 20/26;
    }
    .item9{
        grid-column: 2 / 8;
        grid-row: 28/36;
      }

    }
    @elseif(count($color_palette_products) == 11)
    .grid-container {
        display: grid;
        width: 75%!important;
        margin: 0px auto;
       grid-template-columns: repeat(25, 32px);
        grid-template-rows: repeat(29, 14px);
    }

    @media screen and (min-width: 1300px){
    .grid-container{
        grid-template-columns: repeat(25, 35px);
        grid-template-rows: repeat(30, 18px);
    }
    }

    @media screen and (min-width: 1440px){
    .grid-container{
        grid-template-columns: repeat(25, 55px);
        grid-template-rows: repeat(30, 25px);
        /*margin:0px  ;*/
    }
    }
    .item0{
        grid-column: 7 / 13;
        grid-row: 13/27;
    }
    .item1{
        grid-column: 10 / 19;
        grid-row: 7/23;
    }
    .item2{
    grid-column: 5/ 9;
        grid-row: 11/29;
    }
    .item3{
        grid-column: 3 / 11;
        grid-row: 7/14;
    }
    .item4{
    grid-column: 6 /10;
        grid-row: 2/8;
    }
    .item5{
        grid-column: 16/ 25;
        grid-row: 1/9;
      }
    .item6{
            grid-column: 20 / 24;
        grid-row: 7/22;
    }
    .item7{
        grid-column: 1 / 6;
        grid-row: 17/25;
    }
    .item8 {
        grid-column: 15/ 23;
        grid-row: 21/28;
    }
    .item9{
        grid-column: 13/ 17;
        grid-row: 4/14;
    }
    .item10{
        grid-column: 22/ 26;
        grid-row: 14/24;
    }

    @media  screen and (max-width: 824px) and (orientation: landscape){
    .grid-container{
      grid-template-columns: repeat(29, 24px);
        grid-template-rows: repeat(35, 11px);
    }
    }
    @media screen and (max-width: 767px){
     .grid-container{
        width: 74%!important;
        margin: 20px auto;
      grid-template-columns: repeat(26, 15px);
        grid-template-rows: repeat(35, 3px);
        grid-gap: 7px;
    }
    }

    @media screen and (max-width: 640px){
     .grid-container{
        width: 74%!important;
        margin: 20px auto;
        grid-template-columns: repeat(26, 12px);
        grid-template-rows: repeat(35, 2px);
        grid-gap: 7px;
    }
    }
    @media (min-width: 320px) and (max-width: 480px) {

      .grid-container{
            grid-template-columns: repeat(25, 8px);
        grid-template-rows: repeat(45, 5px);
        margin-top: 80px;
        margin: 50px 0px;
    }

    .item0{
     grid-column: 2 / 12;
        grid-row: 4/16;
    }
    .item1{
      grid-column: 1 / 11;
        grid-row: 14/28;
    }
    .item2{
         grid-column: 5/15;
        grid-row: 31/42;
    }
    .item3{
     grid-column: 9/ 22;
        grid-row: 7/18;
    }
    .item4{
       grid-column: 15 /26;
        grid-row: 14/28;
    }
    .item5{
         grid-column: 18/ 24;
        grid-row: 3/11;
      }

    .item6{
            grid-column: 11 / 23;
        grid-row: 18/28;
    }
    .item7{
       grid-column: 8 / 17;
        grid-row: 23/32;

    }
    .item8{
    grid-column: 1/ 7;
        grid-row: 29/37;
    }

    .item9{
      grid-column: 20/ 26;
        grid-row: 35/42;
    }
    .item10{
         grid-column: 11/ 25;
        grid-row: 28/39;
    }
    }

    @elseif(count($color_palette_products) == 12)
     .grid-container {
        display: grid;
        width: 80%!important;
        margin: 0px auto;
        grid-template-columns: repeat(29, 24px);
        grid-template-rows: repeat(32, 10px);
        grid-gap: 5px;
    }

    @media screen and (min-width: 1300px){
    .grid-container{
        grid-template-columns: repeat(29, 31px);
        grid-template-rows: repeat(32, 15px);

    }
    }

    @media screen and (min-width: 1440px){
    .grid-container{
        grid-template-columns: repeat(29, 48px);
        grid-template-rows: repeat(29, 20px);
        grid-gap: 5px;
        /*margin: 0px;*/
    }
    }
    .item0{
          grid-column: 7 / 16;
        grid-row: 4/22;
    }
    .item1{
          /*  grid-column: 21/ 26;
        grid-row: 12/20;*/

           grid-column: 2 /12;
        grid-row: 2/11;
    }
    .item2{
        /*grid-column: 12 /18;
        grid-row: 20/30;  */

          grid-column: 21/ 26;
        grid-row: 12/20;
    }
    .item3{
        /*grid-column: 2 /12;
        grid-row: 2/11;*/

        grid-column: 12 /18;
        grid-row: 20/30;
    }
    .item4{
       /* grid-column: 18/ 21;
        grid-row: 1/18;*/

           grid-column: 3/ 9;
        grid-row: 7/15;
    }
    .item5{
    /*grid-column: 23/ 27;
        grid-row: 2/15;*/


        grid-column: 19/ 27;
        grid-row: 21/30;
    }
    .item6{
      /*grid-column: 10 / 19;
        grid-row: 11/22;*/
          grid-column: 20/ 23;
        grid-row: 11/24;
    }
    .item7{
    /*grid-column: 4/ 13;
        grid-row: 16/24;*/
          grid-column: 18/ 21;
        grid-row: 1/18;
    }
    .item8{
       /*    grid-column: 19/ 27;
        grid-row: 21/30;*/

         grid-column: 10 / 19;
        grid-row: 11/22;
    }
    .item9{
            /* grid-column: 20/ 23;
        grid-row: 11/24;*/

          grid-column: 4/ 13;
        grid-row: 16/24;
    }
    .item10{
           /* grid-column: 3/ 9;
        grid-row: 7/15;*/

        grid-column: 23/ 27;
        grid-row: 2/15;
    }
    .item11 {
         grid-column: 1 / 6;
        grid-row: 21/29;
    }

    @media  screen and (max-width: 824px) and (orientation: landscape){
    .grid-container{
       grid-template-columns: repeat(29, 17px);
        grid-template-rows: repeat(35, 5px);
    }
    }
    @media screen and (max-width: 767px){
      .grid-container{
        width: 80%!important;
        margin: 30px auto;
        grid-template-columns: repeat(29, 13px);
        grid-template-rows: repeat(35, 3px);
      }

    }
    @media (min-width: 320px) and (max-width: 480px) {
      .grid-container{
       grid-template-columns: repeat(24, 6px);
        grid-template-rows: repeat(50, 5px);
        grid-gap: 5px;
        margin-top: 67px;
      }

      .item0{
        grid-column: 1 / 12;
        grid-row: 4/16;
    }
    .item1{
     grid-column: 20/ 29;
        grid-row: 1/10;


    }
    .item2{
          grid-column: 12 / 27;
        grid-row: 8/20;


    }
    .item3{
             grid-column: 7 /20;
        grid-row: 1/10;


    }
    .item4{
       grid-column: 1/ 25;
        grid-row: 28/40;



    }
    .item5{
     grid-column: 3 /17;
        grid-row: 40/50;

    }
    .item6{

      grid-column: 17 / 26;
        grid-row: 40/50;


    }
    .item7{
        grid-column: 9/ 20;
        grid-row: 35/45;


    }
    .item8{
           grid-column: 12/ 28;
        grid-row: 20/32;


    }

    .item9{
        grid-column: 16/ 24;
        grid-row: 15/26;


    }
    .item10{

     grid-column: 3 / 12;
        grid-row: 16/28;


    }
    .item11 {
        grid-column: 9/ 19;
        grid-row: 18/24;

    }

    }

    /*13 PRODUCT*/
    @elseif(count($color_palette_products) == 13)
    .grid-container {
        display: grid;
        width: 75%!important;
        margin: 0px auto;
       grid-template-columns: repeat(25, 32px);
        grid-template-rows: repeat(29, 14px);
    }

    @media  screen and (min-width: 1300px){
    .grid-container{
        grid-template-columns: repeat(25, 40px);
        grid-template-rows: repeat(30, 19px);
    }
    }

    @media  screen and (min-width: 1440px){
    .grid-container{
        grid-template-columns: repeat(25, 52px);
        grid-template-rows: repeat(30, 25px);
        /*margin: 0px;*/
    }
    }
    .item0{
        grid-column: 4/ 12;
        grid-row: 3/11;
    }
    .item1{
      /*  grid-column: 1 / 5;
        grid-row: 20/26;*/

        grid-column: 14 / 20;
        grid-row: 4/15;

    }
    .item2{
     /*grid-column: 14 / 20;
        grid-row: 4/15;
    */
        grid-column: 14/ 21;
        grid-row: 23/30;
    }
    .item3{
        /*grid-column: 4/ 12;
        grid-row: 14/21;*/

        grid-column: 9 / 13;
        grid-row: 18/30;
    }
    .item4{
       /* grid-column: 2 /6;
        grid-row: 6/17;*/

        grid-column: 19/ 24;
        grid-row: 10/18;
    }
    .item5{
            grid-column: 18/ 25;
        grid-row: 2/9;


      }

    .item6{
        /*grid-column: 9 / 13;
        grid-row: 18/30;*/

       grid-column: 9 / 17;
        grid-row: 10/24;
    }
    .item7{
       /* grid-column: 22/ 26;
        grid-row: 18/25;*/

        grid-column: 18/ 21;
        grid-row: 12/27;
    }
    .item8{
       /* grid-column: 14/ 21;
        grid-row: 23/30;*/

            grid-column: 1 / 5;
        grid-row: 20/26;

    }
    .item9{
       /* grid-column: 12/ 15;
        grid-row: 1/9;*/

       grid-column: 4/ 12;
        grid-row: 14/21;
    }
    .item10{
       /* grid-column: 19/ 24;
        grid-row: 10/18;*/

        grid-column: 2 /6;
        grid-row: 6/17;
    }
    .item11{
         /*   grid-column: 9 / 17;
        grid-row: 10/24;*/

        grid-column: 12/ 15;
        grid-row: 1/9;
    }
    .item12{
      /*  grid-column: 18/ 21;
        grid-row: 12/27;*/

        grid-column: 22/ 26;
        grid-row: 18/25;
    }
    @media  screen and (max-width: 824px) and (orientation: landscape){
    .grid-container{
      grid-template-columns: repeat(25, 22px);
        grid-template-rows: repeat(35, 10px);
    }
    }
    @media  screen and (max-width: 767px){
      .grid-container{
        width: 80%!important;
        margin: 30px auto 10px;
           grid-template-columns: repeat(25, 17px);
        grid-template-rows: repeat(35, 5px);
        grid-gap: 5px;

      }
    }
    @media  screen and (max-width: 641px){
      .grid-container{
        grid-template-columns: repeat(25, 15px);
        grid-template-rows: repeat(35, 4px);

      }
    }
    @media (min-width: 320px) and (max-width: 480px) {
    .grid-container{
       grid-template-columns: repeat(24, 6px);
        grid-template-rows: repeat(50, 5px);
        grid-gap: 5px;
        margin-top: 67px;
      }

      .item0{
        grid-column: 1 / 12;
        grid-row: 4/16;
    }
    .item1{
     grid-column: 20/ 29;
        grid-row: 1/10;
    }
    .item2{
          grid-column: 12 / 27;
        grid-row: 8/20;
    }
    .item3{
             grid-column: 7 /20;
        grid-row: 1/10;
    }
    .item4{
      grid-column: 7/ 25;
        grid-row: 28/40;

    }
    .item5{
     grid-column: 3 /17;
        grid-row: 40/50;
    }
    .item6{

      grid-column: 17 / 26;
        grid-row: 40/50;
    }
    .item7{


        grid-column: 9/ 20;
        grid-row: 35/45;
    }
    .item8{
           grid-column: 12/ 28;
        grid-row: 20/32;
    }

    .item9{
        grid-column: 16/ 24;
        grid-row: 15/26;
    }
    .item10{

     grid-column: 3 / 12;
        grid-row: 16/28;
    }
    .item11 {
        grid-column: 9/ 19;
        grid-row: 18/24;

    }
    .item12 {
       grid-column: 1/ 7;
        grid-row: 24/40;

    }
    }
    /*13 PRODUCT END*/
    @endif
    @endif

    h3.rel-product-title1{    opacity: 1;
      opacity: 1;
      /* text-align: center; */
      /* position: absolute; */
      /* vertical-align: middle; */
      /* top: 0%; */
      /* width: 150px; */
      /* margin: 0px; */
      /* background: #000; */
      /* background: linear-gradient(to bottom, #177086, #083d4a, #000000); */
      /* border-radius: 20px; */
      font-size: 14px;
      padding: 10px 20px;
      /* left: 50%; */
      /* transform: translate(-50%,50%); */
      color: #fff;
      /* transition: all 0.5s; */
      z-index: 99;
      }
      h3.rel-product-title{opacity: 1 !important;}
    </style>
    @if(!empty($color_palette_products))

    <section class="product-visuals observable custom-gallery template2 @if(count($color_palette_products) > 0) pallets_{{count($color_palette_products)}} @endif">
       <div class="grid-container afterclass" id="light-gallery-memo-create">

         @foreach($color_palette_products as $k=>$cp)

          <div class="grid-item-products custom-grid-item-products item{{$k}}">
                      <a href="{{url('product/'.$cp->slug)}}">


                        @if($k <= 2)
                    <img alt="" src="@if(!empty($cp->fullsheet_view)){{$cp->fullsheet_view}}@else {{$cp->a4sheet_view}}@endif"
                       class="img-responsive">
                    @else
                      <img alt="" src="@if(!empty($cp->fullsheet_view)){{$cp->fullsheet_view}}@else {{$cp->a4sheet_view}}@endif?tr=w-400,h-300,bl-30,q-50"
                   data-src="@if(!empty($cp->fullsheet_view)){{$cp->fullsheet_view}}@else {{$cp->a4sheet_view}}@endif"
                       class="img-responsive lazy">
                    @endif
             <div class="related-product-overlay">
                   <h3 class="rel-product-title custom-rel-product-title"> {{$cp->product_name}}</h3>

             </div>
             </a>
          </div>
         @endforeach

       </div>

       <div class="custom-elements">

         <!--pallets_8 images eg- http://royaletouche.firsteconomy.com/product/RD-937-->
         <img src="{{asset('frontend/images/pallete-icons/t2/stone.png')}}" class="d2-feather">
         <img src="{{asset('frontend/images/pallete-icons/t2/coffee.png')}}" class="d2-file">
         <!-- <img src="{{asset('frontend/images/pallete-icons/t2/flower2.png')}}" class="d2-flower"> -->

         <!--pallets_9 images eg- http://royaletouche.firsteconomy.com/product/cf-230-->
         <img src="{{asset('frontend/images/pallete-icons/t2/spoon.png')}}" class="d4-camera">
         <img src="{{asset('frontend/images/pallete-icons/t2/zaval.png')}}" class="d4-flower2">


         <!--pallets_10 images eg- http://royaletouche.firsteconomy.com/product/mt-1660-->
         <img src="{{asset('frontend/images/pallete-icons/t2/oreo.png')}}" class="d3-goggle">
         <img src="{{asset('frontend/images/pallete-icons/t2/leaf.png')}}" class="d3-file">
         <img src="{{asset('frontend/images/pallete-icons/t2/radio.png')}}" class="d3-flower">

         <!--pallets_11 images eg- http://royaletouche.firsteconomy.com/product/crystal-1123-->
         <img src="{{asset('frontend/images/pallete-icons/t2/zaval.png')}}" class="d5-flower">
         <img src="{{asset('frontend/images/pallete-icons/t2/pan.png')}}" class="d5-3bowl">

         <!--pallets_12 images eg- http://royaletouche.firsteconomy.com/product/crystal-1171-->
         <img src="{{asset('frontend/images/pallete-icons/t2/brush.png')}}" class="d1-keyboard">
         <!-- <img src="{{asset('frontend/images/pallete-icons/feather.png')}}" class="d1-feather"> -->
         <img src="{{asset('frontend/images/pallete-icons/t2/kadhai.png')}}" class="d1-3bowl">

         <!--pallets_13 images eg- http://royaletouche.firsteconomy.com/product/cf-213-->
         <img src="{{asset('frontend/images/pallete-icons/t2/tea.png')}}" class="d6-3bowl">
         <img src="{{asset('frontend/images/pallete-icons/t2/clock.png')}}" class="d6-flower">



       </div>




    @endif
