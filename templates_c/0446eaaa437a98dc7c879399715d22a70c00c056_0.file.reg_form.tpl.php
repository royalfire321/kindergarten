<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-19 09:13:31
  from 'D:\xampp\htdocs\web11\templates\tpl\reg_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e4cee2bde3977_51103602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0446eaaa437a98dc7c879399715d22a70c00c056' => 
    array (
      0 => 'D:\\xampp\\htdocs\\web11\\templates\\tpl\\reg_form.tpl',
      1 => 1582097386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4cee2bde3977_51103602 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container mt-5">
    <h1 class="text-center">註冊表單</h1>

    

    <form  action="index.php" method="post" id="myForm" class="mb-20" enctype="multipart/form-data">
    
      <div class="row">         
        <!--帳號-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>帳號<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="uname" id="uname" value="" >
          </div>
        </div>         
        <!--密碼-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>密碼<span class="text-danger">*</span class="text-danger"></label>
            <input type="password" class="form-control" name="pass" id="pass" value="" >
          </div>
        </div>         
        <!--確認密碼-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>確認密碼<span class="text-danger">*</span class="text-danger"></label>
            <input type="password" class="form-control" name="chk_pass" id="chk_pass" value="" >
          </div>
        </div>         
        <!--姓名-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>姓名<span class="text-danger">*</span class="text-danger"></label>
            <input type="text" class="form-control" name="name" id="name" value="">
          </div>
        </div>         
        <!--電話-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>電話<span class="text-danger">*</span class="text-danger"></label>
            <input type="text" class="form-control" name="tel" id="tel" value="" >
          </div>
        </div>             
        <!--信箱-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>信箱<span class="text-danger">*</span class="text-danger"></label>
            <input type="text" class="form-control" name="email" id="email" value="" >
          </div>
        </div> 
      </div>
      <div class="text-center pb-20">
        <input type="hidden" name="op" value="reg">
        <button type="submit" class="btn btn-primary">送出</button>
      </div>
  
    </form>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"><?php echo '</script'; ?>
>
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
                  'email' : {
                      required: true ,
                      email:true 
                    },
                  'tel' : {
                      required: true,
                      digits:true
                  }, 
                  'pass' : {
                      required: true,
                      minlength:6
                  },
                  'chk_pass' : {
                      equalTo: "#pass"    
                  },
                  'name' : {
                      required: true
                  },  

              },
              
              messages: {
                  'uname' : {
                      required: "必填"
                  },
                  'email' : {
                      required: "必填" ,
                      email:"請輸入正確格式" ,
                    },
                  'tel' : {
                      required: "必填",
                      digits:"請輸入正確格式"
                  },
                  'pass' : {
                      required: "必填",
                      minlength:"至少輸入6個數值"
                  },
                  'chk_pass' : {
                      equalTo:"密碼不一致"      
                  }, 
                  'name' : {
                      required: "必填"
                  },
              }
          });

      });
  <?php echo '</script'; ?>
>
  
  </div><?php }
}
