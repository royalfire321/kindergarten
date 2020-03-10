<?php
require_once 'head.php';
 
/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');


/* 程式流程 */
switch ($op){
  case "contact_insert" :
    $msg = contact_insert();
    redirect_header("index.php", $msg , 5000);
    exit;

  case "reg" :
    $msg = reg();
    redirect_header("index.php", '註冊成功', 3000);
    exit;

  case "logout" :
    $msg = logout();
    //(轉向頁面,訊息,時間)
    redirect_header("index.php", '登出成功', 3000);
    exit; 

  case "login" :
    $msg = login();
    redirect_header("index.php", $msg , 3000);
    exit;

  case "contact_form" :
    $msg = contact_form();
    break;

  case "ok" :
      $msg = ok();
      break;

  case "login_form" :
    $msg = login_form();
    break;

  case "reg_form" :
    $msg = reg_form();
    break;


  default:
    $op = "op_list";

    $_SESSION['returnUrl'] = getCurrentUrl();

    $mainSlides = getMenus("mainSlide",true);
    $smarty->assign("mainSlides", $mainSlides);
    op_list();
    
    #取得商品資料(含圖)

    break;  
}
  /*---- 將變數送至樣版----*/
  $mainMenus = getMenus("mainMenu");
  $smarty->assign("mainMenus", $mainMenus);
  $smarty->assign("WEB", $WEB);
  $smarty->assign("op", $op);
  // print_r($news); die();
   
/*---- 程式結尾-----*/
$smarty->display('theme.tpl');

//----函數區

function op_list(){
  global $db,$smarty;
  
  $sql = "SELECT a.*,b.title as kinds_title
          FROM `prods` as a
          LEFT JOIN `kinds` as b on a.kind_sn=b.sn
          WHERE a.`enable`='1'
          ORDER BY a.`date` desc
          LIMIT 6;
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){    
    $row['sn'] = (int)$row['sn'];//分類
    $row['title'] = htmlspecialchars($row['title']);//標題 
    $row['prod'] = getFilesByKindColsnSort("prod",$row['sn']);
    $row['kinds_title'] = htmlspecialchars($row['kinds_title']);//標題
    $rows[] = $row;
  }
  $smarty->assign("prods",$rows);  

}
function contact_insert(){
  global $db;
  
  $_POST['name'] = db_filter($_POST['name'], 'name');
  $_POST['tel'] = db_filter($_POST['tel'], 'tel');
  $_POST['email'] = db_filter($_POST['email'], 'email');
  $_POST['content'] = db_filter($_POST['content'], 'content');
  $_POST['date'] = strtotime("now");
  
  $sql="INSERT INTO `contacts` 
                    (`name`, `tel`, `email`, `content`, `date`)
                    VALUES 
                    ('{$_POST['name']}', '{$_POST['tel']}', '{$_POST['email']}', '{$_POST['content']}', '{$_POST['date']}')  
  ";
  $result = $db->query($sql) or die($db->error() . $sql);
  return "我們已收到您的聯絡事項，將儘快與您聯絡！";
}


function contact_form(){
  global $smarty;
  $row['op'] = "contact_insert";
  $smarty->assign("row", $row);

}
function ok(){

}

function login_form(){

}

function reg_form(){

}

function login(){
  global $db;
  $_POST['uname'] = db_filter($_POST['uname'], '帳號');
  $_POST['pass'] = db_filter($_POST['pass'], '密碼');

  $sql="SELECT *
        FROM `users`
        WHERE `uname` = '{$_POST['uname']}'
  ";

  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc() or redirect_header("index.php", "帳號輸入錯誤" , 3000);
  
  $row['uname'] = htmlspecialchars($row['uname']);//字串
  $row['uid'] = (int)$row['uid'];//整數
  $row['kind'] = (int)$row['kind'];//整數
  $row['name'] = htmlspecialchars($row['name']);//字串
  $row['tel'] = htmlspecialchars($row['tel']);//字串
  $row['email'] = htmlspecialchars($row['email']);//字串 
  $row['pass'] = htmlspecialchars($row['pass']);//字串 
  $row['token'] = htmlspecialchars($row['token']);//字串

  if(password_verify($_POST['pass'], $row['pass'])){
    //登入成功
    $_SESSION['user']['uid'] = $row['uid'];
    $_SESSION['user']['uname'] = $row['uname'];
    $_SESSION['user']['name'] = $row['name'];
    $_SESSION['user']['tel'] = $row['tel'];
    $_SESSION['user']['email'] = $row['email'];
    $_SESSION['user']['kind'] = $row['kind'];
    
    $_POST['remember'] = isset($_POST['remember']) ? $_POST['remember'] : "";
    
    if($_POST['remember']){
      setcookie("uname",$row['uname'], time()+ 3600 * 24 * 365); 
      setcookie("token", $row['token'], time()+ 3600 * 24 * 365); 
    }
    return "登入成功";
  }else{    
    $_SESSION['user']['uid'] = "";
    $_SESSION['user']['uname'] = "";
    $_SESSION['user']['name'] = "";
    $_SESSION['user']['tel'] = "";
    $_SESSION['user']['email'] = "";
    $_SESSION['user']['kind'] = "";

    return "登入失敗";
  }
}

function logout(){   
  $_SESSION['user']['uid'] = "";
  $_SESSION['user']['uname'] = "";
  $_SESSION['user']['name'] = "";
  $_SESSION['user']['tel'] = "";
  $_SESSION['user']['email'] = "";
  $_SESSION['user']['kind'] = "";
  
  setcookie("uname", "", time()- 3600 * 24 * 365); 
  setcookie("token", "", time()- 3600 * 24 * 365);
}
 
/*=======================
註冊函式(寫入資料庫)
=======================*/
function reg(){
  global $db;
  
  $_POST['uname'] = db_filter($_POST['uname'], '帳號');
  $_POST['pass'] = db_filter($_POST['pass'], '密碼');
  $_POST['chk_pass'] = db_filter($_POST['chk_pass'], '確認密碼');
  $_POST['name'] = db_filter($_POST['name'], '姓名');
  $_POST['tel'] = db_filter($_POST['tel'], '電話');
  $_POST['email'] = db_filter($_POST['email'], 'email',FILTER_SANITIZE_EMAIL);
  #加密處理
  if($_POST['pass'] != $_POST['chk_pass']){
    redirect_header("index.php?op=reg_form","密碼不一致");
    exit;
  }

  $_POST['pass']  = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $_POST['token']  = password_hash($_POST['uname'], PASSWORD_DEFAULT);

  $sql="INSERT INTO `users` (`uname`, `pass`, `name`, `tel`, `email`, `token`)
  VALUES ('{$_POST['uname']}', '{$_POST['pass']}', '{$_POST['name']}', '{$_POST['tel']}', '{$_POST['email']}', '{$_POST['token']}');";

  $db->query($sql) or die($db->error() . $sql);
  $uid = $db->insert_id;


}