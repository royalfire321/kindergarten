<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$uid = system_CleanVars($_REQUEST, 'uid', '', 'int');
// echo $op;die();
 
/* 程式流程 */
switch ($op){
  case "op_delete" :
    $msg = op_delete($uid);
    redirect_header("user.php", $msg, 3000);
    exit;

  case "op_update" :
    $msg = op_update($uid);
    redirect_header("user.php", $msg, 3000);
    exit;

  case "op_form" :
    $msg = op_form($uid);
    break;
 
  default:
    $op = "op_list";
    op_list();
    break;  
}
/*---- 將變數送至樣版----*/
$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
 
/*---- 程式結尾-----*/
$smarty->display('admin.tpl');
 
/*---- 函數區-----*/
function op_delete($uid){
  global $db; 
  $sql="DELETE FROM `users`
        WHERE `uid` = '{$uid}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  return "會員資料刪除成功";
}

function op_update($uid=""){
  global $db; 
   
  $_POST['uname'] = db_filter($_POST['uname'], '帳號');
  $_POST['pass'] = db_filter($_POST['pass'], '');//密碼
  $_POST['name'] = db_filter($_POST['name'], '姓名');
  $_POST['tel'] = db_filter($_POST['tel'], '電話');
  $_POST['email'] = db_filter($_POST['email'], 'email',FILTER_SANITIZE_EMAIL);
  $_POST['kind'] = db_filter($_POST['kind'], '會員狀態');
  
  $and_col = "";
  if($_POST['pass']){    
    $_POST['pass']  = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    //更新密碼
    $and_col = "`pass` = '{$_POST['pass']}',";
  }

  $sql="UPDATE `users` SET
        `uname` = '{$_POST['uname']}',
        {$and_col}
        `name` = '{$_POST['name']}',
        `tel` = '{$_POST['tel']}',
        `email` = '{$_POST['email']}',
        `kind` = '{$_POST['kind']}'
        WHERE `uid` = '{$uid}';  
  ";//die($sql);
  $db->query($sql) or die($db->error() . $sql);
  return "會員資料更新成功";

}

function op_form($uid=""){
  global $smarty,$db;

  if($uid){
    $sql="SELECT *
          FROM `users`
          WHERE `uid` = '{$uid}'
    ";//die($sql);
    
    $result = $db->query($sql) or die($db->error() . $sql);
    $row = $result->fetch_assoc(); 
  }
  $row['uid'] = isset($row['uid']) ? $row['uid'] : "";
  $row['uname'] = isset($row['uname']) ? $row['uname'] : "";
  $row['name'] = isset($row['name']) ? $row['name'] : "";
  $row['tel'] = isset($row['tel']) ? $row['tel'] : "";
  $row['email'] = isset($row['email']) ? $row['email'] : "";
  $row['kind'] = isset($row['kind']) ? $row['kind'] : "0";

  $smarty->assign("row",$row);
}


function op_list(){
  global $smarty,$db;
  
  $sql = "SELECT *
          FROM `users`
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){
    $row['uname'] = htmlspecialchars($row['uname']);//字串
    $row['uid'] = (int)$row['uid'];//整數
    $row['kind'] = (int)$row['kind'];//整數
    $row['name'] = htmlspecialchars($row['name']);//字串
    $row['tel'] = htmlspecialchars($row['tel']);//字串
    $row['email'] = htmlspecialchars($row['email']);//字串    
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);  

}



