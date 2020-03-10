<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-10 16:26:51
  from 'D:\xampp\htdocs\kindergarten1\templates\tpl\head1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e674f4b035412_31490711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad524f7f1ac4880369160004edc4f0454e2a7f06' => 
    array (
      0 => 'D:\\xampp\\htdocs\\kindergarten1\\templates\\tpl\\head1.tpl',
      1 => 1583828773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e674f4b035412_31490711 (Smarty_Internal_Template $_smarty_tpl) {
?><!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto"><?php echo $_smarty_tpl->tpl_vars['WEB']->value['web_title'];?>
</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
/img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainMenus']->value, 'mainMenu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mainMenu']->value) {
?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo $_smarty_tpl->tpl_vars['mainMenu']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['mainMenu']->value['target'] == 1) {?>target="_blank" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['mainMenu']->value['title'];?>
</a>
          </li>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

          <?php if ($_SESSION['user']['kind'] === 1) {?>
                        <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="user.php">後台</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
            </li>
            <?php } elseif ($_SESSION['user']['kind'] === 0) {?> 
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
              </li> 
            <?php } else { ?>
                            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="index.php?op=login_form">登入</a>
              </li>
              
          <?php }?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header --><?php }
}
