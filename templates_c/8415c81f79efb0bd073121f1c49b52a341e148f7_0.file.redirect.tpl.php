<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-10 15:23:02
  from 'D:\xampp\htdocs\kindergarten1\templates\tpl\redirect.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e674056f32bc2_14519583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8415c81f79efb0bd073121f1c49b52a341e148f7' => 
    array (
      0 => 'D:\\xampp\\htdocs\\kindergarten1\\templates\\tpl\\redirect.tpl',
      1 => 1583398370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e674056f32bc2_14519583 (Smarty_Internal_Template $_smarty_tpl) {
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
