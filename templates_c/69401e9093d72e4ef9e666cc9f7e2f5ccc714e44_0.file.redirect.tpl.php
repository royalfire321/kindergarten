<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-10 14:57:17
  from 'D:\xampp\htdocs\kindergarden\templates\tpl\redirect.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e673a4d61f2a1_01794930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69401e9093d72e4ef9e666cc9f7e2f5ccc714e44' => 
    array (
      0 => 'D:\\xampp\\htdocs\\kindergarden\\templates\\tpl\\redirect.tpl',
      1 => 1583398370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e673a4d61f2a1_01794930 (Smarty_Internal_Template $_smarty_tpl) {
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
