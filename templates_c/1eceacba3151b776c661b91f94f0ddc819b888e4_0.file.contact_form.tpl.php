<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-06 15:30:38
  from 'D:\xampp\htdocs\office\templates\tpl\contact_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e61fc1ee8f297_30409834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1eceacba3151b776c661b91f94f0ddc819b888e4' => 
    array (
      0 => 'D:\\xampp\\htdocs\\office\\templates\\tpl\\contact_form.tpl',
      1 => 1583479836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e61fc1ee8f297_30409834 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container mt-5">
    <h1 class="text-center">聯絡我們</h1>
    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">
            <div class="row contact-info">
    
                <div class="col-md-4">
                <div class="contact-address">
                    <i class="ion-ios-location-outline"></i>
                    <h3>Address</h3>
                    <address>A108 Adam Street, NY 535022, USA</address>
                </div>
                </div>
    
                <div class="col-md-4">
                <div class="contact-phone">
                    <i class="ion-ios-telephone-outline"></i>
                    <h3>Phone Number</h3>
                    <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                </div>
                </div>
    
                <div class="col-md-4">
                <div class="contact-email">
                    <i class="ion-ios-email-outline"></i>
                    <h3>Email</h3>
                    <p><a href="mailto:info@example.com">info@example.com</a></p>
                </div>
                </div>
    
            </div>
        </div>
    </section>
    <!-- 表單返回頁，記得在表單加「 target='returnWin' 」 -->
    <iframe name="returnWin" style="display: none;" onload="this.onload=function(){window.location='index.php?op=ok'}"></iframe>
        <form target="returnWin"  class="form-signin" action="https://docs.google.com/forms/d/e/1FAIpQLSfrm3BMa3tDQ9F2om9LIjPVYFSoQYzbIs_eZTVQ1ufhoZjZMw/formResponse" method="post">
            <div class="form-group">
                <label>姓名<span class="text-danger">*</span class="text-danger"></label>
                <input type="text" class="form-control" name="entry.867626444" id="867626444" value="" >
            </div>
            <div class="form-group">
                <label>信箱<span class="text-danger">*</span class="text-danger"></label>
                <input type="text" class="form-control" name="entry.1754152143" id="1754152143" value="" >
            </div>
            <div class="form-group">
                <label>電話<span class="text-danger">*</span class="text-danger"></label>
                <input type="text" class="form-control" name="entry.1550421662" id="1550421662" value="" >
            </div>
            <div class="form-group">
                <label>聯絡事項<span class="text-danger">*</span class="text-danger"></label>
                <textarea class="form-control" rows=8 name="entry.474645198" id="474645198" value="" ></textarea>
            </div>
            <div>
                <div class="text-center pb-3">
                    <button type="submit" class="btn btn-primary">送出</button>
                  </div>
            </div>
        </form>    <?php }
}
