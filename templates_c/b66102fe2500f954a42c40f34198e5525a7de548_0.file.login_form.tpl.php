<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-10 15:38:59
  from 'D:\xampp\htdocs\kindergarten1\templates\tpl\login_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6744132cbcc3_54631998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b66102fe2500f954a42c40f34198e5525a7de548' => 
    array (
      0 => 'D:\\xampp\\htdocs\\kindergarten1\\templates\\tpl\\login_form.tpl',
      1 => 1583398370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6744132cbcc3_54631998 (Smarty_Internal_Template $_smarty_tpl) {
?>
		<style>
			.form-signin {
					width: 100%;
					max-width: 400px;
					padding: 15px;
					margin: 0 auto;
			}      
		</style>
		<div class="container mt-5">
				<form class="form-signin" action="index.php" method="post">
						<h1 class="h3 mb-3 font-weight-normal">會員登入</h1>
						<div class="mb-3">
						<label for="name" class="sr-only">帳號</label>
						<input type="text" name="uname" id="uname" class="form-control" placeholder="請輸入帳號"  required>
						</div>
						<div class="mb-3">
						<label for="pass" class="sr-only">密碼</label>
						<input type="password" name="pass" id="pass" class="form-control" placeholder="請輸入密碼" required>
						</div>
				
						<div class="checkbox mb-3">
						<label>
								<input type="checkbox" name="remember" id="remember"> 記住我
						</label>
								
						</div>
						<input type="hidden" name="op" id="op" value="login">
						<button class="btn btn-lg btn-primary btn-block" type="submit">會員登入</button>
						<div>
								您還沒還沒註冊嗎？請 <a href="index.php?op=reg_form">點選此處註冊您的新帳號</a>。
						</div>
						
				</form>
				<!-- <h2><?php echo $_smarty_tpl->tpl_vars['op']->value;?>
</h2> -->
		</div><?php }
}
