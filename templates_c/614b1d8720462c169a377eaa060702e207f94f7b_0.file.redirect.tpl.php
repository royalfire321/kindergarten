<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-14 03:45:08
  from 'D:\xampp\htdocs\web11\templates\tpl\redirect.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e4609b47ecca8_64635937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '614b1d8720462c169a377eaa060702e207f94f7b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\web11\\templates\\tpl\\redirect.tpl',
      1 => 1581648146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4609b47ecca8_64635937 (Smarty_Internal_Template $_smarty_tpl) {
?>  <?php if ($_smarty_tpl->tpl_vars['redirect']->value) {?>
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
          timer: '<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
'
        })
      }    
    <?php echo '</script'; ?>
>
  <?php }
}
}
