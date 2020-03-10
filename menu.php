<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
$kind = system_CleanVars($_REQUEST, 'kind', 'mainMenu', 'string');

$kinds['mainMenu'] = array(
  "value" => "mainMenu",
  "title" => "主選單"
);
$kinds['cartMenu'] = array(
  "value" => "cartMenu",
  "title" => "購物車選單"
);
$kinds['cartMenu1'] = array(
  "value" => "cartMenu1",
  "title" => "購物車選單1"
);

$smarty->assign("kinds", $kinds);

#防呆
$kind = (in_array($kind, array_keys($kinds))) ? $kind : "mainMenu";
 
/* 程式流程 */
switch ($op){
  case "op_delete" :
    $msg = op_delete($kind,$sn);
    redirect_header("menu.php?kind={$kind}", $msg, 3000);
    exit;

  case "op_insert" :
    $msg = op_insert($kind);
    redirect_header("menu.php?kind={$kind}", $msg, 3000);
    exit;

  case "op_update" :
    $msg = op_insert($kind,$sn);
    redirect_header("menu.php", $msg, 3000);
    exit;

  case "op_form" :
    $msg = op_form($kind,$sn);
    break;
 
  default:
    $op = "op_list";
    op_list($kind);
    break;  
}
/*---- 將變數送至樣版----*/
$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
 
/*---- 程式結尾-----*/
$smarty->display('admin.tpl');
 
/*---- 函數區-----*/
function op_delete($kind,$sn){
  global $db;

  #刪除選單資料表
  $sql="DELETE FROM `kinds`
        WHERE `sn` = '{$sn}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  return "選單資料刪除成功";
}

function op_insert($kind,$sn=""){
  global $db;						 
 
  $_POST['sn'] = db_filter($_POST['sn'], '');//流水號
  $_POST['title'] = db_filter($_POST['title'], '標題');//標題
  $_POST['kind'] = db_filter($_POST['kind'], '');//分類
  $_POST['enable'] = db_filter($_POST['enable'], '');//狀態
  $_POST['sort'] = db_filter($_POST['sort'], '');//排序
  $_POST['url'] = db_filter($_POST['url'], '');//網址
  $_POST['target'] = db_filter($_POST['target'], ''); //外連

  if($sn){
    $sql="UPDATE  `kinds` SET
                  `title` = '{$_POST['title']}',
                  `enable` = '{$_POST['enable']}',
                  `sort` = '{$_POST['sort']}',
                  `kind` = '{$_POST['kind']}',
                  `url` = '{$_POST['url']}',
                  `target` = '{$_POST['target']}'
                  WHERE `sn` = '{$_POST['sn']}'    
    ";
    $db->query($sql) or die($db->error() . $sql);
    $msg = "選單資料更新成功";
  }else{
    $sql="INSERT INTO `kinds` 
    (`title`, `enable`, `sort`, `kind`, `url`, `target`)
    VALUES 
    ( '{$_POST['title']}', '{$_POST['enable']}', '{$_POST['sort']}', '{$_POST['kind']}', '{$_POST['url']}', '{$_POST['target']}')    
    "; //die($sql);
    $db->query($sql) or die($db->error() . $sql);
    $sn = $db->insert_id;
    $msg = "選單資料新增成功"; 
  }


  return $msg;

}

/*===========================
  用sn取得選單檔資料
===========================*/
function getKindsBySn($sn){
  global $db;
  $sql="SELECT *
        FROM `kinds`
        WHERE `sn` = '{$sn}'
  ";//die($sql);
  
  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  return $row;

}

/*================================
  用kind 取得數量的最大值
================================*/
function getKindMaxSortByKind($kind){
  global $db;
  $sql = "SELECT count(*)+1 as count
          FROM `kinds`
          WHERE `kind`='{$kind}'
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  return $row['count'];
}

function op_form($kind,$sn=""){
  global $smarty,$db;

  if($sn){
    $row = getKindsBySn($sn);
    $row['op'] = "op_update";
  }else{
    $row['op'] = "op_insert";
  }

  $row['sn'] = isset($row['sn']) ? $row['sn'] : "";
  $row['kind'] = isset($row['kind']) ? $row['kind'] : $kind;
  $row['title'] = isset($row['title']) ? $row['title'] : "";
  $row['enable'] = isset($row['enable']) ? $row['enable'] : "1";
  $row['url'] = isset($row['url']) ? $row['url'] : "";
  $row['target'] = isset($row['target']) ? $row['target'] : "0";
  $row['sort'] = isset($row['sort']) ? $row['sort'] : getKindMaxSortByKind($kind);
  

  $smarty->assign("row",$row);
}


function op_list($kind){
  global $smarty,$db;
  
  $sql = "SELECT *
          FROM `kinds`
          WHERE `kind`='{$kind}'
          ORDER BY `sort`
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){ 
    $row['sn'] = (int)$row['sn'];//分類
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['enable'] = (int)$row['enable'];//狀態 
    $row['url'] = htmlspecialchars($row['url']);//網址
    $row['target'] = (int)$row['target'];//外連 
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);
  $smarty->assign("kind",$kind);  

}



