<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-27 20:47:27
  from 'D:\xampp\htdocs\web11\templates\tpl\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e57ba5fdd20e2_38463799',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aeb05830ecbc92e3c50adfe7a9b6e7b9dfde6762' => 
    array (
      0 => 'D:\\xampp\\htdocs\\web11\\templates\\tpl\\user.tpl',
      1 => 1582807645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e57ba5fdd20e2_38463799 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['op']->value == "op_list") {?>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr>
            <th scope="col">帳號</th>
            <th scope="col">姓名</th>
            <th scope="col">電話</th>
            <th scope="col">EMAIL</th>
            <th scope="col">狀態</th>
            <th scope="col">功能</th>
        </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['uname'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['row']->value['kind']) {?><i class="fas fa-user-check"></i><?php }?></td>
                    <td>
                        <a href="user.php?op=op_form&uid=<?php echo $_smarty_tpl->tpl_vars['row']->value['uid'];?>
"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="op_delete(<?php echo $_smarty_tpl->tpl_vars['row']->value['uid'];?>
);"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php
}
} else {
?>
                <tr>
                    <td colspan=6>目前沒有資料</td>
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
        function op_delete(uid){
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
                    document.location.href="user.php?op=op_delete&uid="+uid;
                }
            })
        }
    <?php echo '</script'; ?>
>
<?php }
if ($_smarty_tpl->tpl_vars['op']->value == "op_form") {?>
    
    <div class="container">
        <h1 class="text-center">會員表單</h1>
        
        <form action="user.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">
        
            <div class="row">         
                <!--帳號-->              
                <div class="col-sm-4">
                    <div class="form-group">
                    <label>帳號<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="uname" id="uname" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['uname'];?>
" readonly>
                    </div>
                </div>         
                <!--密碼-->              
                <div class="col-sm-4">
                    <div class="form-group">
                    <label>密碼</label>
                    <input type="text" class="form-control" name="pass" id="pass" value="">
                    </div>
                </div>
                <!-- 會員狀態  -->
                <div class="col-sm-4">
                    <div class="form-group">
                    <label style="display:block;">會員狀態</label>
                    <input type="radio" name="kind" id="kind_1" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['kind'] == '1') {?>checked<?php }?>>
                    <label for="kind_1" style="display:inline;">管理員</label>&nbsp;&nbsp;
                    <input type="radio" name="kind" id="kind_0" value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['kind'] == '0') {?>checked<?php }?>>
                    <label for="kind_0" style="display:inline;">會員</label>
                    </div>
                </div>  
                <!--姓名-->              
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>姓名<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
">
                    </div>
                </div>         
                <!--電話-->              
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>電話<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
">
                    </div>
                </div>             
                <!--信箱-->              
                <div class="col-sm-12">
                    <div class="form-group">
                    <label>信箱<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
">
                    </div>
                </div> 
            </div>
            <div class="text-center pb-20">
            <input type="hidden" name="op" value="op_update">
            <input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['uid'];?>
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
            });
            $(function(){
            $("#myForm").validate({
                submitHandler: function(form) {
                    form.submit();
                },
                rules: {
                    'uname' : {
                        required: true
                    },
                    'name' : {
                        required: true
                    },
                    'tel' : {
                        required: true
                    },
                    'email' : {
                        required: true,
                        email:true
                    }
                },
                messages: {
                    'uname' : {
                        required: "必填"
                    },
                    'name' : {
                        required: "必填"
                    },
                    'tel' : {
                        required: "必填"
                    },
                    'email' : {
                        required: "必填",
                        email: "請填正確email"
                    }
                }
            });
            });
        <?php echo '</script'; ?>
>
        
    </div>
<?php }
}
}
