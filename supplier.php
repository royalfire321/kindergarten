<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$zn = system_CleanVars($_REQUEST, 'zn', '', 'int');
// echo $op;die();
 
/* 程式流程 */
switch ($op){
  case "op_delete" :
    $msg = op_delete($zn);
    redirect_header("supplier.php", $msg, 3000);
    exit;

  case "op_insert" :
    $msg = op_insert();
    redirect_header("supplier.php", $msg, 3000);
    exit;

  case "op_update" :
    $msg = op_insert($zn);
    redirect_header("supplier.php", $msg, 3000);
    exit;

  case "op_form" :
    $msg = op_form($zn);
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
function op_delete($zn){
  global $db; 
  $sql="DELETE FROM `suppliers`
        WHERE `zn` = '{$zn}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  return "供應商資料刪除成功";
}


function op_insert($zn=""){
  global $db;						 
 
  $_POST['zn'] = db_filter($_POST['zn'], '');//流水號
  $_POST['name'] = db_filter($_POST['name'], '');//類別
  $_POST['address'] = db_filter($_POST['address'], '');
  $_POST['phone'] = db_filter($_POST['phone'], '');
  $_POST['email'] = db_filter($_POST['email'], '');
  $_POST['sales_represent'] = db_filter($_POST['sales_represent'], '');
  $_POST['enable'] = db_filter($_POST['enable'], '');

  if($zn){
    $sql="UPDATE  `suppliers` SET
                  `name` = '{$_POST['name']}',
                  `address` = '{$_POST['address']}',
                  `phone` = '{$_POST['phone']}',
                  `email` = '{$_POST['email']}',
                  `sales_represent` = '{$_POST['sales_represent']}',
                  `enable` = '{$_POST['enable']}'
                  WHERE `zn` = '{$_POST['zn']}'    
    ";//die($sql);
    $db->query($sql) or die($db->error() . $sql);
    $msg = "供應商資料更新成功";
  }else{
    $sql="INSERT INTO `suppliers` 
    (`name`, `address`, `phone`, `email`, `sales_represent`, `enable`)
    VALUES 
    ('{$_POST['name']}', '{$_POST['address']}', '{$_POST['phone']}', '{$_POST['email']}', '{$_POST['sales_represent']}', '{$_POST['enable']}')    
    "; //die($sql);
    $db->query($sql) or die($db->error() . $sql);
    $zn = $db->insert_id;
    $msg = "供應商資料新增成功";    
  }
  return $msg;
  // zn zn_supply	name 公司名稱	 地址	 電話	 email	 業務代表

}
/*===========================
  用zn取得商品檔資料
===========================*/
function getSuppliersByZn($zn){
  global $db;
  $sql="SELECT *
        FROM `suppliers`
        WHERE `zn` = '{$zn}'
  ";//die($sql);
  
  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  // $row['suppliers'] = getSuppliersByZn("suppliers",$zn);
  return $row;

}



function op_form($zn=""){
  global $smarty,$db;

  if($zn){
    $row =  getSuppliersByZn($zn);
    $row['op'] = "op_update";
  }else{
    $row['op'] = "op_insert";
  }

  $row['zn'] = isset($row['zn']) ? $row['zn'] : "";
  $row['name'] = isset($row['name']) ? $row['name'] : "";
  $row['address'] = isset($row['address']) ? $row['address'] : "";
  $row['phone'] = isset($row['phone']) ? $row['phone'] : "";
  $row['email'] = isset($row['email']) ? $row['email'] : "";
  $row['sales_represent'] = isset($row['sales_represent']) ? $row['sales_represent'] : "";
  $row['enable'] = isset($row['enable']) ? $row['enable'] : "1";

  $smarty->assign("row",$row);
}


function op_list(){
  global $smarty,$db;
  
  $sql = "SELECT *
          FROM `suppliers`
  ";//die($sql);
	// zn zn_supply	name 公司名稱	address 地址	phone 電話	email email	sales_represent 業務代表

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){    
    $row['zn'] = (int)$row['zn'];//分類
    $row['name'] = htmlspecialchars($row['name']);//標題
    $row['address'] = htmlspecialchars($row['address']);
    $row['phone'] = htmlspecialchars($row['phone']);
    $row['email'] = htmlspecialchars($row['email']);
    $row['sales_represent'] = htmlspecialchars($row['sales_represent']);
    $row['enable'] = (int)$row['enable'];//狀態
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);  

}