<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-03 10:55:43
  from 'D:\xampp\htdocs\web11\templates\tpl\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5dc72fe09a86_28533894',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36237f5e0ba0bb0b16963b9bd6beee3bc92a42bc' => 
    array (
      0 => 'D:\\xampp\\htdocs\\web11\\templates\\tpl\\index.tpl',
      1 => 1583204079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/contact_form.tpl' => 1,
    'file:tpl/ok.tpl' => 1,
    'file:tpl/login_form.tpl' => 1,
    'file:tpl/reg_form.tpl' => 1,
    'file:tpl/body.tpl' => 1,
  ),
),false)) {
function content_5e5dc72fe09a86_28533894 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['op']->value == "contact_form") {?>
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/contact_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "ok") {?> 
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/ok.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "login_form") {?> 
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/login_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
  <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "reg_form") {?> 
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/reg_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
  <?php } else { ?>
    
        <?php $_smarty_tpl->_subTemplateRender("file:tpl/body.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 

<?php }
}
}
