<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-15 04:08:09
  from 'D:\xampp\htdocs\web11\templates\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e476099db70f2_16734775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7555d9077b2c29d3b32ac413d0acc4a6c36cd229' => 
    array (
      0 => 'D:\\xampp\\htdocs\\web11\\templates\\user.tpl',
      1 => 1581736068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e476099db70f2_16734775 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
bootstrap/bootstrap.min.css">

    <title>會員管理</title>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
bootstrap/jquery-3.4.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
bootstrap/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
>
</head>
<body>
      <?php if ($_smarty_tpl->tpl_vars['redirect']->value) {?>
      <!-- sweetalert2 -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.css">
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
>
        window.onload = function(){
          Swal.fire({
            //position: 'top-end',
            icon: 'success',
            title: "<?php echo $_smarty_tpl->tpl_vars['message']->value;?>
",
            showConfirmButton: false,
            timer: "<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"
          })
        }    
      <?php echo '</script'; ?>
>
    <?php }?>
    <h1 class="text-center mt-2">育將電腦工作室 後台</h1>
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
    
        </div>
        <div class="col-sm-3">
    
          <div class="card" style="width: 18rem;">
            <div class="card-header">
              管理員
            </div>
            <ul class="list-group list-group-flush">
              <a href="index.php">
                <li class="list-group-item" class="btn-block">首頁</li>
              </a>
              <a href="index.php?op=logout">
                <li class="list-group-item" class="btn-block">登出</li>
              </a>
              <a href="http://localhost/adminer/adminer.php" target="_blank">
                <li class="list-group-item" class="btn-block">資料庫管理</li>
              </a> 
            </ul>
          </div>
    
        </div>
      </div>
    </div>


</body>
</html><?php }
}
