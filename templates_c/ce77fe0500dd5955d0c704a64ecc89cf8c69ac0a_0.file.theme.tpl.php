<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-05 13:05:41
  from 'D:\xampp\htdocs\office\templates\theme.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6088a53d0779_84602602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce77fe0500dd5955d0c704a64ecc89cf8c69ac0a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\office\\templates\\theme.tpl',
      1 => 1583384736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/redirect.tpl' => 1,
    'file:tpl/head1.tpl' => 1,
    'file:tpl/index.tpl' => 1,
    'file:tpl/cart.tpl' => 1,
    'file:tpl/footer1.tpl' => 1,
  ),
),false)) {
function content_5e6088a53d0779_84602602 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BizPage Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/img/favicon.png" rel="icon">
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/css//style.css" rel="stylesheet">
   

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/redirect.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:tpl/head1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <?php if ($_smarty_tpl->tpl_vars['WEB']->value['file_name'] == "index.php") {?>
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php } elseif ($_smarty_tpl->tpl_vars['WEB']->value['file_name'] == "cart.php") {?>
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/cart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php }?>
  



    <?php $_smarty_tpl->_subTemplateRender("file:tpl/footer1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    
  <?php if ($_SESSION['cartAmount']) {?>
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
      <a href="cart.php?op=order_form" class="fab fab-facebook mp-click" data-toggle="tooltip" title="您選了<?php echo $_SESSION['cartAmount'];?>
個餐點">
        <i class="fas fa-cart-plus"></i> 
        <span class="badge badge-danger badge-counter"><?php echo $_SESSION['cartAmount'];?>
</span> 
      </a>
    </div>
    <?php echo '<script'; ?>
>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    <?php echo '</script'; ?>
>
  <?php }?>

  

  

  

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->
  <!-- JavaScript Libraries -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/jquery/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/jquery/jquery-migrate.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/easing/easing.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/superfish/hoverIntent.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/superfish/superfish.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/wow/wow.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/waypoints/waypoints.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/counterup/counterup.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/owlcarousel/owl.carousel.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/isotope/isotope.pkgd.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/lightbox/js/lightbox.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/lib/touchSwipe/jquery.touchSwipe.min.js"><?php echo '</script'; ?>
>
  <!-- Contact Form JavaScript File -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/contactform/contactform.js"><?php echo '</script'; ?>
>

  <!-- Template Main Javascript File -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
 

</body>

</html>
<?php }
}
