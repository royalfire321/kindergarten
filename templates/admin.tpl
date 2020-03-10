<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<{$xoImgUrl}>bootstrap/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link href="<{$xoImgUrl}>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <title><{$WEB.web_title}></title>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<{$xoImgUrl}>bootstrap/jquery-3.4.1.min.js"></script>
    <script src="<{$xoImgUrl}>bootstrap/popper.min.js"></script>
    <script src="<{$xoImgUrl}>bootstrap/bootstrap.min.js"></script>
  </head>
  <body>
    <{* 轉向樣板 *}>
    <{include file="tpl/redirect.tpl"}>

    <h1 class="text-center mt-2"><{$WEB.web_title}></h1>
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <{if $WEB.file_name == "user.php"}>
            <{include file="tpl/user.tpl"}>
          <{elseif  $WEB.file_name == "prod.php"}>
            <{include file="tpl/prod.tpl"}>
          <{elseif  $WEB.file_name == "kind.php"}>
            <{include file="tpl/kind.tpl"}>  
          <{elseif  $WEB.file_name == "menu.php"}>
            <{include file="tpl/menu.tpl"}>   
          <{elseif  $WEB.file_name == "slide.php"}>
            <{include file="tpl/slide.tpl"}>  
          <{elseif  $WEB.file_name == "supplier.php"}>
            <{include file="tpl/supplier.tpl"}>
          <{elseif  $WEB.file_name == "contact.php"}>
            <{include file="tpl/contact.tpl"}>      
          <{elseif  $WEB.file_name == "order.php"}>
            <{include file="tpl/order.tpl"}>  
          <{/if}>
          

        </div>
        <div class="col-sm-3">

          <div class="card" style="width: 18rem;">
            <div class="card-header">
              管理員
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a href="index.php" style="display:block;">首頁</a>
              </li>
              <li class="list-group-item">
                <a href="index.php?op=logout" class="btn-block">登出</a>
              </li>
              <li class="list-group-item">
                <a href="user.php" class="btn-block">會員管理</a>
              </li>
              <li class="list-group-item">
                <a href="prod.php" class="btn-block">活動剪影管理</a>
              </li>
              <li class="list-group-item">
                <a href="kind.php" class="btn-block">類別管理</a>
              </li>
              <li class="list-group-item">
                <a href="menu.php" class="btn-block">選單管理</a>
              </li>
              <li class="list-group-item">
                <a href="slide.php" class="btn-block">輪播圖管理</a>
              </li>
              <li class="list-group-item">
                <a href="supplier.php" class="btn-block">供應商管理</a>
              </li>
              <li class="list-group-item">
                <a href="contact.php" class="btn-block">聯絡我們管理</a>
              </li>
              <li class="list-group-item">
                <a href="order.php" class="btn-block">訂單管理</a>
              </li>           
              <li class="list-group-item">
                <a href="http://localhost/adminer/adminer.php" class="btn-block" target="_blank">資料庫管理</a>
              </li>
              
            </ul>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>