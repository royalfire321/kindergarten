<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
// echo $op;die();
 
/* 程式流程 */
switch ($op){
  case "op_delete" :
    $msg = op_delete($sn);
    redirect_header("contact.php", $msg, 3000);
    exit;

  case "op_update" :
    $msg = op_update($sn);
    redirect_header("contact.php", $msg, 3000);
    exit;

  case "op_form" :
    $msg = op_form($sn);
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
function op_delete($sn){
  global $db; 
  $sql="DELETE FROM `contacts`
        WHERE `sn` = '{$sn}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  return "聯絡我們資料刪除成功";
}

function op_update($sn){
  global $db; 
   
  $_POST['name'] = db_filter($_POST['name'], '姓名');
  $_POST['tel'] = db_filter($_POST['tel'], '電話');
  $_POST['email'] = db_filter($_POST['email'], 'email',FILTER_SANITIZE_EMAIL);
  $_POST['content'] = db_filter($_POST['content'], '');
  
  $sql="UPDATE  `contacts` SET
                `name` = '{$_POST['name']}',
                `tel` = '{$_POST['tel']}',
                `email` = '{$_POST['email']}',
                `content` = '{$_POST['content']}'
                WHERE `sn` = '{$sn}';  
  ";//die($sql);
  $db->query($sql) or die($db->error() . $sql);
  return "聯絡我們資料更新成功";

}

function op_form($sn=""){
  global $smarty,$db;

  if($sn){
    $sql="SELECT *
          FROM `contacts`
          WHERE `sn` = '{$sn}'
    ";//die($sql);
    
    $result = $db->query($sql) or die($db->error() . $sql);
    $row = $result->fetch_assoc(); 
  }

  $row['sn'] = isset($row['sn']) ? $row['sn'] : "";
  $row['name'] = isset($row['name']) ? $row['name'] : "";
  $row['tel'] = isset($row['tel']) ? $row['tel'] : "";
  $row['email'] = isset($row['email']) ? $row['email'] : "";
  $row['content'] = isset($row['content']) ? $row['content'] : "";  
//   $row['date'] = isset($row['date']) ? $row['date'] : strtotime("now");
//   $row['date'] = date("Y-m-d H:i:s",$row['date']);
  $row['op'] = "op_update";

  $smarty->assign("row",$row);
}


function op_list(){
  global $smarty,$db;
  
  $sql = "SELECT *
          FROM `contacts`
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){
    $row['name'] = htmlspecialchars($row['name']);//字串
    $row['tel'] = htmlspecialchars($row['tel']);//字串
    $row['email'] = htmlspecialchars($row['email']);//字串  
    $row['content'] = htmlspecialchars($row['content']);//字串    
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);  

}



