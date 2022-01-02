<style type="text/css">
    .hide{
    display: none !important;
    }
    button.slick-next.slick-arrow, button.slick-prev.slick-arrow {
    display: none !important;
    }
    .hide{
    display: none !important;
    }
    button.slick-next.slick-arrow, button.slick-prev.slick-arrow {
    display: none !important;
    }
    body.product_page.modal-open{
    padding-right: 0px !important;
    }

    .error{border-bottom: 1px solid red !important;}

    .grid-item-products img{
    width: auto !important;
     height: auto !important;
     max-width: none !important;
    }

    .palette-btn{
    /*padding: 40px 0px 40px 0px !important;*/
    }
     @media (min-width: 320px) and (max-width: 480px) {
        .palette-btn li a{
          font-size: 12px!important;
          }
          .palette-btn li{
          margin:10px 6px 0px;
          }
          .palette-btn{
          /*padding: 30px 0px 30px 0px !important;*/
          padding:0px !important;
          }
          .pallets_10 .custom-elements img.d3-goggle{
          top: 65%;
          }
          .grid-item-products img{
          height: 100%;
          /*transform: rotate(-90deg) translateX(50%);  */
          transform: rotate(-90deg) translate(20% , -30%) scale(0.6);
          width: auto !important;
           height: auto !important;
           max-width: none !important;
          }
       }
        @media  screen and (max-width: 824px) and (orientation: landscape){
              .grid-item-products img{
                    height: 100%;
                   transform: rotate(-0deg) scale(0.4) translate(-80%,-80%);
                }
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
    -webkit-box-shadow: 14px 18px 15px -1px rgba(0,0,0,0.72);
    -moz-box-shadow: 14px 18px 15px -1px rgba(0,0,0,0.72);
    box-shadow: 14px 18px 15px -1px rgba(0,0,0,0.72);
    }
    .product-mainContent{
    background: linear-gradient(284deg, rgba(212,212,212,1) 0%, rgba(169,169,169,1) 100%), url(../img/bgs/texture-bg.jpg) repeat!important;
    }



    @if(!empty($color_palette_products) && count($color_palette_products) > 0)
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
    grid-template-columns: repeat(20, 60px);
    grid-template-rows: repeat(32, 16px);
    }
    }
    .item0{
    grid-column: 3 / 11;
    grid-row: 13/31;
    }
    .item1{
    grid-column: 14 / 21;
    grid-row: 8/29;
    }
    .item2{
    grid-column: 13 / 18;
    grid-row: 3/15;
    }
    .item3{
    grid-column: 10/ 18;
    grid-row: 20/31;
    }
    .item4{
    grid-column: 5/15;
    grid-row: 5/22;
    }
    .item5{
    grid-column: 6/ 11;
    grid-row: 22/33;
    }
    .item6{
    grid-column: 7 / 12;
    grid-row: 15/28;
    }
    .item7{
    grid-column: 1 / 9;
    grid-row: 1/19;
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
    /*.grid-container{
    grid-template-columns: repeat(20, 10px);
    grid-template-rows: repeat(39, 6px);
    margin-top: 55px;
    }
    .item0{
    grid-column: 1/ 11;
    grid-row: 12/25;
    }
    .item1{
    grid-column: 10 / 20;
    grid-row: 1/15;
    }
    .item2{
    grid-column: 13 / 21;
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
    }*/


     .grid-container{
    grid-template-columns: repeat(20, 30px);
     grid-template-rows: repeat(33, 10px);
    grid-gap: 5px;
    transform: rotate(90deg) scale(0.6) translateX(-260px);
    }

    .grid-item-products img{
    height: 100%;

    }

    h3.rel-product-title{
    width: 96px!important;
    font-size: 12px;
    top: initial!important;
    bottom: 0px!important;
    left: 1px!important;
    transform: rotate(-90deg) translate(45px,-15px);
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
    grid-column: 2 / 8;
    grid-row: 4/16;
    }
    .item1{
    grid-column: 1 / 11;
    grid-row: 14/28;
    }
    .item2{
    grid-column: 15 / 21;
    grid-row: 8/23;
    }
    .item3{
    grid-column: 5/ 15;
    grid-row: 7/18;
    }
    .item4{
    grid-column: 8 /17;
    grid-row: 1/11;
    }
    .item5{
    grid-column: 18/ 25;
    grid-row: 3/11;
    }
    .item6{
    grid-column: 12 / 19;
    grid-row: 13/26;
    }
    .item7{
    grid-column: 10 / 16;
    grid-row: 19/27;
    }
    .item8{
    grid-column: 20/ 26;
    grid-row: 17/27;
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
   /* .grid-container{
    grid-template-columns: repeat(20, 7px);
    grid-template-rows: repeat(42, 5px);
    margin-top: 80px;
    }
    .item0{
    grid-column: 1 / 10;
    grid-row: 4/16;
    }
    .item1{
    grid-column: 3 / 16;
    grid-row: 14/28;
    }
    .item2{
    grid-column: 15 / 26;
    grid-row: 8/23;
    }
    .item3{
    grid-column: 5/ 15;
    grid-row: 7/18;
    }
    .item4 {
    grid-column: 11 /21;
    grid-row: 1/11;
    }
    .item5{
    grid-column: 1/ 25;
    grid-row: 28/42;
    }
    .item6{
    grid-column: 12 / 29;
    grid-row: 23/39;
    }
    .item7{
    grid-column: 10 / 16;
    grid-row: 19/27;
    }
    .item8{
    grid-column: 15/ 26;
    grid-row: 30/40;
    }*/

     .grid-container{
       grid-template-columns: repeat(25, 26px);
     grid-template-rows: repeat(27, 13px);
    grid-gap: 5px;
    transform: rotate(90deg) scale(0.6) translateX(-260px);
    }

    .grid-item-products img{
    height: 100%;
   /* position: absolute;
    bottom: 0px;
    left: 0px;*/
    }

    h3.rel-product-title{
    width: 96px!important;
    font-size: 12px;
    top: initial!important;
    bottom: 0px!important;
    left: 1px!important;
    transform: rotate(-90deg) translate(45px,-15px);
    }



    }
    @elseif(count($color_palette_products) == 10)
    .grid-container {
    display: grid;
    width: 75%!important;
    margin: 0px auto;
    grid-template-columns: repeat(20, 35px);
    grid-template-rows: repeat(29, 9px);
    grid-gap: 6px;
    }
    @media screen and (min-width: 1300px){
    .grid-container{
    grid-template-columns: repeat(21, 40px);
    grid-template-rows: repeat(27, 10px);
    }
    }
    @media screen and (min-width: 1440px){
    .grid-container{
    grid-template-columns: repeat(20, 60px);
    grid-template-rows: repeat(29, 19px);
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
    grid-column: 13 /20;
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
    .item7{
    grid-column: 5 / 11;
    grid-row: 6/17;
    }
    .item8{
    grid-column: 15/ 21;
    grid-row: 5/15;
    }
    .item9{
    grid-column: 14 / 21;
    grid-row: 20/26;
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
   /* .grid-container{
    grid-template-columns: repeat(29, 7px);
    grid-template-rows: repeat(29, 10px);
    margin-top: 50px;
    }
    .item0{
    grid-column: 1 / 18;
    grid-row: 1/6;
    }
    .item1{
    grid-column: 5/ 16;
    grid-row: 10/23;
    }
    .item2{
    grid-column: 14/ 23;
    grid-row: 7/13;
    }
    .item3{
    grid-column: 1/ 16;
    grid-row: 17/26;
    }
    .item4{
    grid-column: 13 /20;
    grid-row: 15/28;
    }
    .item5{
    grid-column: 10/ 20;
    grid-row: 3/10;
    }
    .item6{
    grid-column: 3 / 12;
    grid-row: 5/15;
    }
    .item7{
    grid-column: 13 /20;
    grid-row: 15/28;
    }
    .item8{
    grid-column: 5/ 13;
    grid-row: 23/29;
    }
    .item9{
    grid-column: 15 / 23;
    grid-row: 20/25;
    }*/


     .grid-container{
    grid-template-columns: repeat(20, 32px);
    grid-template-rows: repeat(27, 13px);
    grid-gap: 5px;
    transform: rotate(90deg) scale(0.6) translateX(-260px);
    }

    .grid-item-products img{
    height: 100%;
   /* position: absolute;
    bottom: 0px;
    left: 0px;*/
    }

    h3.rel-product-title{
    width: 96px!important;
    font-size: 12px;
    top: initial!important;
    bottom: 0px!important;
    left: 1px!important;
    transform: rotate(-90deg) translate(45px,-15px);
    }



    .palette-btn li a{
    font-size: 12px!important;
    }
    .palette-btn li{
    margin:10px 6px 0px;
    }
    .palette-btn{
    padding: 30px 0px 30px 0px !important;
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
    grid-template-columns: repeat(25, 52px);
    grid-template-rows: repeat(30, 25px);
    }
    }
    .item0{
    grid-column: 2 / 8;
    grid-row: 4/16;
    }
    .item1{
    grid-column: 1 / 11;
    grid-row: 14/28;
    }
    .item2{
    grid-column: 15 / 22;
    grid-row: 8/23;
    }
    .item3{
    grid-column: 5/ 14;
    grid-row: 7/18;
    }
    .item4{
    grid-column: 7 /15;
    grid-row: 1/11;
    }
    .item5{
    grid-column: 18/ 24;
    grid-row: 3/11;
    }
    .item6{
    grid-column: 10 / 16;
    grid-row: 13/26;
    }
    .item7{
    grid-column: 8 / 13;
    grid-row: 19/27;
    }
    .item8{
    grid-column: 15/ 20;
    grid-row: 21/28;
    }
    .item9{
    grid-column: 12/ 20;
    grid-row: 4/15;
    }
    .item10{
    grid-column: 19/ 26;
    grid-row: 14/27;
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
    /*.grid-container{
    grid-template-columns: repeat(25, 5px);
    grid-template-rows: repeat(42, 5px);
    margin-top: 80px;
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
    }*/

     .grid-container{
   grid-template-columns: repeat(26, 28px);
     grid-template-rows: repeat(28, 15px);
    grid-gap: 5px;
    transform: rotate(90deg) scale(0.6) translateX(-260px);
    }

    .grid-item-products img{
    height: 100%;
   /* position: absolute;
    bottom: 0px;
    left: 0px;*/
    }

    h3.rel-product-title{
    width: 96px!important;
    font-size: 12px;
    top: initial!important;
    bottom: 0px!important;
    left: 1px!important;
    transform: rotate(-90deg) translate(45px,-15px);
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
    }
    }
    .item0{
    grid-column: 1 / 6;
    grid-row: 4/29;
    }
    .item1{
    grid-column: 3 / 11;
    grid-row: 14/28;
    }
    .item2{
    grid-column: 13 / 20;
    grid-row: 4/22;
    }
    .item3{
    grid-column: 7 /14;
    grid-row: 1/10;
    }
    .item4{
    grid-column: 5/ 15;
    grid-row: 7/15;
    }
    .item5{
    grid-column: 19/ 28;
    grid-row: 2/18;
    }
    .item6{
    grid-column: 7 / 14;
    grid-row: 13/22;
    }
    .item7{
    grid-column: 12 /19;
    grid-row: 20/28;
    }
    .item8{
    grid-column: 21/ 28;
    grid-row: 20/29;
    }
    .item9{
    grid-column: 16/ 25;
    grid-row: 12/27;
    }
    .item10{
    grid-column: 20/ 23;
    grid-row: 1/10;
    }
    .item11 {
    grid-column: 18/ 23;
    grid-row: 16/24;
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

    /* .grid-container{
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
    }*/
    .grid-container{
    grid-template-columns: repeat(27, 24px);
    grid-template-rows: repeat(30, 12px);
    grid-gap: 5px;
    transform: rotate(90deg) scale(0.6) translateX(-260px);
    }

    .grid-item-products img{
    height: 100%;
   /* position: absolute;
    bottom: 0px;
    left: 0px;*/
    }

    h3.rel-product-title{
    width: 96px!important;
    font-size: 12px;
    top: initial!important;
    bottom: 0px!important;
    left: 1px!important;
    transform: rotate(-90deg) translate(45px,-15px);
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
    grid-template-columns: repeat(25, 35px);
    grid-template-rows: repeat(30, 18px);
    }
    }
    @media  screen and (min-width: 1440px){
    .grid-container{
    grid-template-columns: repeat(25, 52px);
    grid-template-rows: repeat(30, 25px);
    }
    }
    .item0{
    grid-column: 2 / 8;
    grid-row: 4/16;
    }
    .item1{
    grid-column: 1 / 11;
    grid-row: 14/28;
    }
    .item2{
    grid-column: 18/ 24;
    grid-row: 1/11;
    }
    .item3{
    grid-column: 5/ 14;
    grid-row: 7/18;
    }
    .item4{
    grid-column: 7 /13;
    grid-row: 1/11;
    }
    .item5{
    grid-column: 14 / 19;
    grid-row: 4/15;
    }
    .item6{
    grid-column: 8 / 14;
    grid-row: 13/25;
    }
    .item7{
    grid-column: 18/ 26;
    grid-row: 18/26;
    }
    .item8{
    grid-column: 13/ 18;
    grid-row: 13/27;
    }
    .item9{
    grid-column: 12/ 17;
    grid-row: 8/14;
    }
    .item10{
    grid-column: 20/ 25;
    grid-row: 10/18;
    }
    .item11{
    grid-column: 5 / 12;
    grid-row: 21/27;
    }
    .item12{
    grid-column: 16/ 22;
    grid-row: 16/23;
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
    /*.grid-container{
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
    }*/

     .grid-container{
    grid-template-columns: repeat(25, 24px);
    grid-template-rows: repeat(30, 12px);
    grid-gap: 5px;
    transform: rotate(90deg) scale(0.6) translateX(-260px);
    }

    .grid-item-products img{
    height: 100%;
   /* position: absolute;
    bottom: 0px;
    left: 0px;*/
    }

    h3.rel-product-title{
    width: 96px!important;
    font-size: 12px;
    top: initial!important;
    bottom: 0px!important;
    left: 1px!important;
    transform: rotate(-90deg) translate(45px,-15px);
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
    #colorpalletid.Pallete_Design_{{count($color_palette_products)}}{
    background: url(/frontend/images/pallete-icons/t2/bg/{{count($color_palette_products)}}-palletbg.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    }
 </style>
 @if(!empty($color_palette_products))
 <section class="product-visuals observable custom-gallery @if(count($color_palette_products) > 0) pallets_{{count($color_palette_products)}} @endif">
    <div class="grid-container afterclass" id="light-gallery-memo-create">
       @foreach($color_palette_products as $k=>$cp)
        @php

                         $imgs = '';
                         $img1 = '';
                         $im = '';
                         $img = '';
                         if(!empty($cp->fullsheet_view))
                         {
                            $img = asset($cp->fullsheet_view);
                         }
                         else
                         {
                           $img = asset($cp->a4sheet_view);
                         }

                         $im = preg_replace("|https://ik.imagekit.io/heccv5isbw/\S+|","https://ik.imagekit.io/heccv5isbw/",$img);
                         $imgs = preg_replace('|https://ik.imagekit.io/heccv5isbw/|','',$img);


                     if($cp->sort_order == 1){
                          $img1 = $im.'tr:w-800,h-800,fo-face/'.$imgs;
                     }
                     elseif($cp->sort_order == 2){
                           $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs;
                     }
                     elseif($cp->sort_order == 3){
                        $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs;
                     }
                     elseif($cp->sort_order == 4){
                           $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs;
                     }
                     elseif($cp->sort_order == 5){
                             $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs;
                     }
                     elseif($cp->sort_order == 6){
                           $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs;
                     }
                     elseif($cp->sort_order == 7){
                               $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs;
                     }
                     elseif($cp->sort_order == 8){
                           $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs;
                     }
                     elseif($cp->sort_order == 9){
                              $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs;
                     }
                     elseif($cp->sort_order == 10){
                              $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs ;
                     }
                     elseif($cp->sort_order == 11){
                              $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs ;
                     }
                     else{
                              $img1= $im.'tr:w-800,h-800,fo-face/'.$imgs;

                     }
                      @endphp
       <div class="grid-item-products custom-grid-item-products item{{$k}}">
          <a href="{{url('product/'.$cp->slug)}}">

             <img alt=""
                src="{{$img1}}" class="img-responsive">

             <div class="related-product-overlay">
                <h3 class="rel-product-title custom-rel-product-title"> {{$cp->name}}</h3>
             </div>
          </a>
       </div>
       @endforeach
    </div>
    <div class="custom-elements">
       <!--pallets_8 images eg- http://royaletouche.firsteconomy.com/product/RD-937-->
       <img src="{{'https://ik.imagekit.io/heccv5isbw/feather.png'}}" class="d2-feather">
       <img src="{{'https://ik.imagekit.io/heccv5isbw/file.png'}}" class="d2-file">
       <img src="{{'https://ik.imagekit.io/heccv5isbw/flower2.png'}}" class="d2-flower">
       <!--pallets_9 images eg- http://royaletouche.firsteconomy.com/product/cf-230-->
       <img src="{{'https://ik.imagekit.io/heccv5isbw/camera.png'}}" class="d4-camera">
       <img src="{{'https://ik.imagekit.io/heccv5isbw/flower2.png'}}" class="d4-flower2">
       <!--pallets_10 images eg- http://royaletouche.firsteconomy.com/product/mt-1660-->
       <img src="{{'https://ik.imagekit.io/heccv5isbw/goggle.png'}}" class="d3-goggle">
       <img src="{{'https://ik.imagekit.io/heccv5isbw/file.png'}}" class="d3-file">
       <img src="{{'https://ik.imagekit.io/heccv5isbw/flower2.png'}}" class="d3-flower">
       <!--pallets_11 images eg- http://royaletouche.firsteconomy.com/product/crystal-1123-->
       <img src="{{'https://ik.imagekit.io/heccv5isbw/camera.png'}}" class="d5-flower">
       <img src="{{'https://ik.imagekit.io/heccv5isbw/3bowl.png'}}" class="d5-3bowl">
       <!--pallets_12 images eg- http://royaletouche.firsteconomy.com/product/crystal-1171-->
       <img src="{{'https://ik.imagekit.io/heccv5isbw/keyboard.png'}}" class="d1-keyboard">
       <img src="{{'https://ik.imagekit.io/heccv5isbw/feather.png'}}" class="d1-feather">
       <img src="{{'https://ik.imagekit.io/heccv5isbw/3bowl.png'}}" class="d1-3bowl">
       <!--pallets_13 images eg- http://royaletouche.firsteconomy.com/product/cf-213-->
       <img src="{{'https://ik.imagekit.io/heccv5isbw/3bowl.png'}}" class="d6-3bowl">
       <img src="{{'https://ik.imagekit.io/heccv5isbw/flower2.png'}}" class="d6-flower">
    </div>
 </section>
 @endif
