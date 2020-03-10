<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-28 20:00:59
  from 'D:\xampp\htdocs\web11\templates\tpl\supplier.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5900fb549a39_38305634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9909a3618a94b3b8e9b32e18f03d815de38630f5' => 
    array (
      0 => 'D:\\xampp\\htdocs\\web11\\templates\\tpl\\supplier.tpl',
      1 => 1582891250,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5900fb549a39_38305634 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['op']->value == "op_list") {?>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            <th scope="col">公司名稱</th>
            <th scope="col">業務代表</th>
            <th scope="col" class="text-right">電話</th>
            <th scope="col" class="text-center">email</th>
            <th scope="col" class="text-center">狀態</th>
            <th scope="col" class="text-center">
                <a href="?op=op_form"><i class="fas fa-plus-square"></i>新增</a>
            </th>
        </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <tr>

                    <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                    <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['row']->value['sales_represent'];?>
</td>
                    <td class="text-right align-middle"><?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
</td>
                    <td class="text-center align-middle"><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
                    <td class="text-center align-middle"><?php if ($_smarty_tpl->tpl_vars['row']->value['enable']) {?><i class="fas fa-check"></i><?php }?></td>
                    <td class="text-center align-middle">
                        <a href="?op=op_form&zn=<?php echo $_smarty_tpl->tpl_vars['row']->value['zn'];?>
"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="op_delete(<?php echo $_smarty_tpl->tpl_vars['row']->value['zn'];?>
);"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php
}
} else {
?>
                <tr>
                    <td colspan=5>目前沒有資料</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </tbody>
    </table>
    
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.css">
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        function op_delete(zn){
            Swal.fire({
                title: '你確定嗎？',
                text: "您將無法還原！",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '是的，刪除它！',
                cancelButtonText: '取消'
                }).then((result) => {
                if (result.value) {
                    document.location.href="supplier.php?op=op_delete&zn="+zn;
                }
            })
        }
    <?php echo '</script'; ?>
>
<?php }
if ($_smarty_tpl->tpl_vars['op']->value == "op_form") {?>
    
    <div class="container">        
        <form action="supplier.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">


            <div class="row">         
                <!--公司名稱-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>公司名稱<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" >
                    </div>
                </div>                            
                <!--電話-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>電話</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
">
                    </div>
                </div>
                 <!--email-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
">
                    </div>
                </div>   
                 <!--業務代表-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>業務代表</label>
                        <input type="text" class="form-control" name="sales_represent" id="sales_represent" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sales_represent'];?>
">
                    </div>
                </div>
                  <!-- 商品狀態  -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label style="display:block;">商品狀態</label>
                        <input type="radio" name="enable" id="enable_1" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['enable'] == '1') {?>checked<?php }?>>
                        <label for="enable_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
                        <input type="radio" name="enable" id="enable_0" value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['enable'] == '0') {?>checked<?php }?>>
                        <label for="enable_0" style="display:inline;">停用</label>
                    </div>
                </div>  
                 <!--地址-->              
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>地址</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
">
                    </div>
                </div>                   
            </div>
            
            <div class="text-center pb-20">
            <input type="hidden" name="op" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['op'];?>
">
            <input type="hidden" name="zn" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['zn'];?>
">
            <button type="submit" class="btn btn-primary">送出</button>
            </div>
        
        </form>
        <!-- 表單驗證 -->
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"><?php echo '</script'; ?>
>
        <!-- 調用方法 -->
        <style>
            .error{
            color:red;
            }
        </style>
        <?php echo '<script'; ?>
>
            $(function(){
                $("#myForm").validate({
                    submitHandler: function(form) {
                        form.submit();
                    },
                    rules: {
                        'title' : {
                            required: true
                        }
                    },
                    messages: {
                        'title' : {
                            required: "必填"
                        }
                    }
                });
            });
        <?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/My97DatePicker/WdatePicker.js'><?php echo '</script'; ?>
>
        
    </div>
<?php }
}
}
