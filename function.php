<?php
/**
 * Get variables passed by GET or POST method
 *
 * Comment by Taiwen Jiang (a.k.a. phppp): THE METHOD IS NOT COMPLETE AND NOT SAFE. YOU ARE ENCOURAGED TO USE PHP'S NATIVE FILTER_VAR OR FILTER_INPUT FUNCTIONS DIRECTLY BEFORE WE MIGRATE TO XOOPS 3.
 */
function system_CleanVars(&$global, $key, $default = '', $type = 'int')
{
  switch ($type) {
    case 'array':
      $ret = (isset($global[$key]) && is_array($global[$key])) ? $global[$key] : $default;
      break;
    case 'date':
      $ret = (isset($global[$key])) ? strtotime($global[$key]) : $default;
      break;
    case 'string':
      $ret = (isset($global[$key])) ? filter_var($global[$key], FILTER_SANITIZE_MAGIC_QUOTES) : $default;
      break;
    case 'int': default:
      $ret = (isset($global[$key])) ? filter_var($global[$key], FILTER_SANITIZE_NUMBER_INT) : $default;
      break;
  }
  if ($ret === false) {
    return $default;
  }
  return $ret;
}
 
 
// ###############################################################################
// #  轉向函數
// ###############################################################################
// function redirect_header($url = "", $time = 3000, $message = '已轉向！！') {
//   $_SESSION['redirect'] = "\$.jGrowl('{$message}', {  life:{$time} , position: 'center', speed: 'slow' });";
//   header("location:{$url}");
//   exit;
// }
###############################################################################
#  取得目前網址
###############################################################################
if (!function_exists("getCurrentUrl")) {
  function getCurrentUrl() {
    global $_SERVER;
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];
    $params = $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : "";
  
    $currentUrl = $protocol . '://' . $host . $script . $params;
    return $currentUrl;
  }
}
  
###############################################################################
#  獲得填報者ip
###############################################################################
if (!function_exists("getVisitorsAddr")) {
  function getVisitorsAddr() {
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
      $ip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
      $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else {
      $ip = $_SERVER["REMOTE_ADDR"];
    }
    return $ip;
  }
}
 
#####################################################################################
#  建立目錄
#####################################################################################
if (!function_exists("mk_dir")) {
  function mk_dir($dir = "") {
    #若無目錄名稱秀出警告訊息
    if (empty($dir)) {
      return;
    }
  
    #若目錄不存在的話建立目錄
    if (!is_dir($dir)) {
      umask(000);
      //若建立失敗秀出警告訊息
      mkdir($dir, 0777);
    }
  }
}


//檢查並傳回欲拿到資料使用的變數
//$title = '' 則非必填
function db_filter($var, $title = '', $filter = '',$url = _WEB_URL){
  global $db;
  #寫入資料庫過濾
  $var = $db->real_escape_string($var);

  if($title){
    if($var === ""){
      redirect_header($url, $title . '為必填！');
    }
  }

  if ($filter) {
    $var = filter_var($var, $filter);
    if (!$var) redirect_header($url, "不合法的{$title}", 3000);
  }
  return $var;
}

/*############################################
  轉向函數
############################################*/
function redirect_header($url = "index.php", $message = '訊息', $time = 3000) {  
  $_SESSION['redirect'] = true;
  $_SESSION['message'] = $message;
  $_SESSION['time'] = $time;
  header("location:{$url}");//注意前面不可以有輸出
  exit;
}

/*========================================
  用kind col_sn sort 取得圖片資料
========================================*/ 
function getFilesByKindColsnSort($kind,$col_sn,$sort=1,$url=true){
  global $db; 
  $sql="SELECT *
               FROM `files`
               WHERE `kind` = '{$kind}' AND `col_sn` = '{$col_sn}' AND `sort` = '{$sort}'
  ";//ddie($sql);     
  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  $file_name = "";
  
  if($row){
    if($url){
        $file_name = _WEB_URL . "/uploads" . $row['sub_dir'] . "/" . $row['name'];
    }else{
        $file_name = _WEB_PATH . "/uploads" . $row['sub_dir'] . "/" . $row['name'];
    }
  }
  return $file_name;
}

/*==========================
  用$kind,$col_sn,$sort
  刪除 圖片資料
==========================*/
function delFilesByKindColsnSort($kind,$col_sn,$sort){
  global $db;		
  # 1.刪除實體檔案
  $file_name = getFilesByKindColsnSort($kind,$col_sn,$sort,false);
  if($file_name){
    unlink($file_name);
  }
  # 2.刪除files資料表	
  $sql="DELETE FROM `files`
        WHERE `kind` = '{$kind}' AND `col_sn` = '{$col_sn}' AND `sort` = '{$sort}'
  ";
  $db->query($sql) or die($db->error() . $sql);	
  return;	 
}


function getMenus($kind,$pic=false){
  global $db;
  
  $sql = "SELECT *
          FROM `kinds`
          WHERE `kind`='{$kind}' and `enable`='1'
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
    $row['pic'] = ($pic == true) ? getFilesByKindColsnSort($kind,$row['sn']) :"";//圖片連結
    $rows[] = $row;
  }
  return $rows; 

}

/*===========================
  用sn取得商品檔資料
===========================*/
function getProdsBySn($sn){
  global $db;
  $sql="SELECT *
        FROM `prods`
        WHERE `sn` = '{$sn}'
  ";//die($sql);  
  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  $row['prod'] = getFilesByKindColsnSort("prod",$sn);
  return $row;
}

/*===========================
  取得商品檔類別選項
===========================*/
function getProdsOptions($kind){
  global $db;
  $sql="SELECT `sn`,`title`
        FROM `kinds`
        WHERE `kind` = '{$kind}' AND `enable` = '1'
        ORDER BY `sort`  
  ";
  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){    
    $row['sn'] = (int)$row['sn'];//分類
    $row['title'] = htmlspecialchars($row['title']);//標題
    $rows[] = $row;
  }
  return $rows;
}