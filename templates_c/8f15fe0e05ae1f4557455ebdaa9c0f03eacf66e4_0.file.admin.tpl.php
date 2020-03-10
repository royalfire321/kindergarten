<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-15 03:22:04
  from 'D:\xampp\htdocs\web11\templates\tpl\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e4755cced1475_59992173',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f15fe0e05ae1f4557455ebdaa9c0f03eacf66e4' => 
    array (
      0 => 'D:\\xampp\\htdocs\\web11\\templates\\tpl\\admin.tpl',
      1 => 1581733162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4755cced1475_59992173 (Smarty_Internal_Template $_smarty_tpl) {
?><h1 class="text-center mt-2">育將電腦工作室 後台</h1>
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
</div><?php }
}
