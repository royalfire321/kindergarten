<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-05 10:36:02
  from 'D:\xampp\htdocs\office\templates\tpl\redirect.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6065926bb7d4_22988310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '616163095cecc8d5ddf11e4db8b7632ddf52dba9' => 
    array (
      0 => 'D:\\xampp\\htdocs\\office\\templates\\tpl\\redirect.tpl',
      1 => 1583075451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6065926bb7d4_22988310 (Smarty_Internal_Template $_smarty_tpl) {
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
