<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-04 16:08:12
  from 'D:\xampp\htdocs\web11\templates\theme.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5f61ecbb50a6_92203797',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19b6565366205f2ebf3a85f0e92c423f8aafde53' => 
    array (
      0 => 'D:\\xampp\\htdocs\\web11\\templates\\theme.tpl',
      1 => 1583309170,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/head_js.tpl' => 1,
    'file:tpl/redirect.tpl' => 1,
    'file:tpl/head.tpl' => 1,
    'file:tpl/index.tpl' => 1,
    'file:tpl/cart.tpl' => 1,
    'file:tpl/footer.tpl' => 1,
  ),
),false)) {
function content_5e5f61ecbb50a6_92203797 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $_smarty_tpl->tpl_vars['WEB']->value['web_title'];?>
</title>

  <!-- Font Awesome Icons -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
css/creative.css" rel="stylesheet">
  
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/head_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>

<body id="page-top">
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/redirect.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:tpl/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <?php if ($_smarty_tpl->tpl_vars['WEB']->value['file_name'] == "index.php") {?>
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php } elseif ($_smarty_tpl->tpl_vars['WEB']->value['file_name'] == "cart.php") {?>
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/cart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php }?>
  



    <?php $_smarty_tpl->_subTemplateRender("file:tpl/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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

  
  <!-- Custom scripts for this template -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
js/creative.min.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
