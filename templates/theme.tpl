<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><{$WEB.web_title}></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<{$xoImgUrl}>/img/favicon.png" rel="icon">
  <link href="<{$xoImgUrl}>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<{$xoImgUrl}>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<{$xoImgUrl}>/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<{$xoImgUrl}>/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<{$xoImgUrl}>/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<{$xoImgUrl}>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<{$xoImgUrl}>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<{$xoImgUrl}>/css//style.css" rel="stylesheet">
   

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <{* 轉向樣板 *}>
  <{include file="tpl/redirect.tpl"}>

  <{* head.tpl *}>
  <{include file="tpl/head.tpl"}>


  <{if $WEB.file_name == "index.php"}>
    <{include file="tpl/index.tpl"}>
  <{elseif  $WEB.file_name == "cart.php"}>
    <{include file="tpl/cart.tpl"}>
  <{/if}>
  



  <{* footer.tpl *}>
  <{include file="tpl/footer.tpl"}>

  <{* 購物車圖示 *}>  
  <{if $smarty.session.cartAmount}>
    <style>
      .fab-fixed-wrap .fab {
        display: block;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        color: white;
        background-color: #0c9;
        text-align: center;
        box-shadow: 0 3px 3px rgba(0, 0, 0, 0.16);
        text-decoration: none;
        display: flex;
        line-height: 1.2;
        align-items: center;
        justify-content: center;
      }
      .fab-fixed-wrap .fab.fab-facebook {
        /* background-color: #4080ff; */
        background-color: #f4623a;
      }
      .fab-fixed-wrap .fab.fab-line {
        background-color: #0b0;
      }
      .badge-counter {
        position: absolute;
        transform: scale(.7);
        transform-origin: top right;
        top: 10px;
        right: 10px;
        /* color:red;
        background: #fff; */
      }
    </style>
    <div class="fab-fixed-wrap with-navbar-bottom" style="bottom: 4.6875rem;position: fixed;z-index: 1035;right: .9375rem;bottom: .9375rem;">
      <a href="cart.php?op=order_form" class="fab fab-facebook mp-click" data-toggle="tooltip" title="您選了<{$smarty.session.cartAmount}>個餐點">
        <i class="fas fa-cart-plus"></i> 
        <span class="badge badge-danger badge-counter"><{$smarty.session.cartAmount}></span> 
      </a>
    </div>
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
  <{/if}>

  

  

  

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->
  <!-- JavaScript Libraries -->
  <script src="<{$xoImgUrl}>/lib/jquery/jquery.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/easing/easing.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/superfish/hoverIntent.js"></script>
  <script src="<{$xoImgUrl}>/lib/superfish/superfish.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/wow/wow.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/waypoints/waypoints.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/counterup/counterup.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<{$xoImgUrl}>/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<{$xoImgUrl}>/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<{$xoImgUrl}>/js/main.js"></script>
 

</body>

</html>
