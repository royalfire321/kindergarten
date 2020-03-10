<!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto"><{$WEB.web_title}></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="<{$xoImgUrl}>/img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <{foreach $mainMenus as $mainMenu}>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<{$mainMenu.url}>" <{if $mainMenu.target == 1}>target="_blank" <{/if}> ><{$mainMenu.title}></a>
          </li>
          <{/foreach}>

          <{if $smarty.session.user.kind === 1}>
            <{* 管理員   *}>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="user.php">後台</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
            </li>
            <{elseif $smarty.session.user.kind === 0}> 
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
              </li> 
            <{else}>
              <{* 未登入  *}>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="index.php?op=login_form">登入</a>
              </li>
              
          <{/if}>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->