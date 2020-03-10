<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$newn = system_CleanVars($_REQUEST, 'newn', '', 'int');
// echo $op;die();
 
/* 程式流程 */
switch ($op){
  case "op_delete" :
    $msg = op_delete($newn);
    redirect_header("news.php", $msg, 3000);
    exit;

  case "op_insert" :
    $msg = op_insert();
    redirect_header("news.php", $msg, 3000);
    exit;

  case "op_update" :
    $msg = op_insert($newn);
    redirect_header("news.php", $msg, 3000);
    exit;

  case "op_form" :
    $msg = op_form($newn);
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
function op_delete($newn){
  global $db; 
  #刪除舊圖
  # 1.刪除實體檔案
  # 2.刪除files資料表
  delFilesByKindColsnSort("prod",$newn,1);

  #刪除新聞表
  $sql="DELETE FROM `news`
        WHERE `newn` = '{$newn}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  return "新聞刪除成功";
}


function op_insert($newn=""){
  global $db;						 
 
  $_POST['newn'] = db_filter($_POST['newn'], '');//流水號
  $_POST['title'] = db_filter($_POST['title'], '標題');//標題
  $_POST['content'] = db_filter($_POST['content'], '');
  $_POST['date'] = db_filter($_POST['date'], '');
  $_POST['date'] = strtotime($_POST['date']);


  if($newn){
    $sql="UPDATE  `news` SET                  
                  `title` = '{$_POST['title']}',
                  `content` = '{$_POST['content']}',
                  `date` = '{$_POST['date']}'                 
                  WHERE `newn` = '{$_POST['newn']}'    
    ";
    $db->query($sql) or die($db->error() . $sql);
    $msg = "新聞更新成功";
  }else{
    $sql="INSERT INTO `news` 
    ( `title`, `content`, `date`)
    VALUES 
    ('{$_POST['title']}', '{$_POST['content']}', '{$_POST['date']}')    
    "; //die($sql);
    $db->query($sql) or die($db->error() . $sql);
    $newn = $db->insert_id;
    $msg = "新聞新增成功";    
  }
  return $msg;
}


function op_form($newn=""){
  global $smarty,$db;

  if($newn){
    $row = getProdsByNewn($newn);
    $row['op'] = "op_update";
  }else{
    $row['op'] = "op_insert";
  }

  $row['newn'] = isset($row['newn']) ? $row['newn'] : "";
  $row['title'] = isset($row['title']) ? $row['title'] : "";
  $row['content'] = isset($row['content']) ? $row['content'] : "";
  $row['date'] = isset($row['date']) ? $row['date'] : strtotime("now");
  $row['date'] = date("Y-m-d H:i:s",$row['date']);
  $smarty->assign("row",$row);
}

function getProdsByNewn($newn){
  global $db;
  $sql="SELECT *
        FROM `news`
        WHERE `newn` = '{$newn}'
  ";//die($sql);  
  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  // $row['prod'] = getFilesByKindColsnSort("prod",$sn);
  return $row;
}


function op_list(){
  global $smarty,$db;
  
  $sql = "SELECT * FROM `news` 
  ";//die($sql);

  #---分頁套件(原始$sql 不要設 limit)
  include_once _WEB_PATH."/class/PageBar/PageBar.php";
  $pageCount = 10;
  $PageBar = getPageBar($db, $sql, $pageCount, 10);
  $sql     = $PageBar['sql'];
  $total   = $PageBar['total'];
  $bar     = ($total > $pageCount) ? $PageBar['bar'] : "";
  $smarty->assign("bar",$bar);  
  #---分頁套件(end)

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){    
    $row['newn'] = (int)$row['newn'];//分類
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['content'] = htmlspecialchars($row['content']);
    $row['date'] = htmlspecialchars($row['date']);
    $row['date'] = date("Y-m-d",$row['date']);
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);  

}