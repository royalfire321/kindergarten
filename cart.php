<?php
require_once 'head.php';
 
/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');


/* 程式流程 */
switch ($op){
	case "order_list" :
    $msg = order_list($sn);
    break; 

	case "order_insert" :
    $returnUrl = order_insert();
    redirect_header($returnUrl, "訂餐成功", 3000);    
		exit; 

  case "order_update" :    
    if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);
    $returnUrl = order_insert($sn);
    redirect_header($_SESSION['returnUrl'], "訂餐編輯成功", 3000);    
    exit; 
    
  case "add_cart" :
    $msg = add_cart($sn);
    redirect_header("cart.php", $msg, 3000);    
    exit; 

	case "order_form" :
    $msg = order_form($sn);
    break;  
    		  
  default:
    $op = "op_list";
    $_SESSION['returnUrl'] = getCurrentUrl();
    op_list();
    break;  
}
/*---- 將變數送至樣版----*/
$mainMenus = getMenus("cartMenu");

$smarty->assign("mainMenus", $mainMenus);

$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
   
/*---- 程式結尾-----*/
$smarty->display('theme.tpl');

//----函數區
/*==========================
  新增訂單
==========================*/
function order_list($sn){
  global $db,$smarty;	
  $date = system_CleanVars($_REQUEST, 'key', '', 'string');
  $sql="SELECT a.*,
               b.title as kind_title
        FROM `orders_main` as a
        LEFT JOIN `kinds`  as b on a.kind_sn = b.sn
        WHERE a.`sn` = '{$sn}' AND a.`date` = '{$date}'
  ";//die($sql);
  $result = $db->query($sql) or die($db->error() . $sql);
  $order_main = $result->fetch_assoc() or redirect_header(_WEB_URL, "無此筆資料", 3000);;

  #訂單主檔
  $order_main['name'] = htmlspecialchars($order_main['name']);//
  $order_main['tel'] = htmlspecialchars($order_main['tel']);//
  $order_main['email'] = htmlspecialchars($order_main['email']);//
  $order_main['ps'] = htmlspecialchars($order_main['ps']);//

  $order_main['date'] = (int)$order_main['date'];//
  $order_main['date'] = date("Y-m-d H:i",$order_main['date']);

  $order_main['total'] = (int)$order_main['total'];//
  $order_main['kind_title'] = htmlspecialchars($order_main['kind_title']);//

  $smarty->assign("order_main", $order_main);

  #訂單明細檔
  $sql="SELECT *
        FROM `orders`
        WHERE `orders_main_sn` = '{$sn}'
        ORDER BY `sort`
  ";
  $result = $db->query($sql) or die($db->error() . $sql);
  $rows = [];
  //sn	orders_main_sn	prod_sn	title	amount	price	sort  
  while($row = $result->fetch_assoc()){    
    $row['sn'] = (int)$row['sn'];//分類  
    $row['prod_sn'] = (int)$row['prod_sn'];//商品流水號
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['price'] = (int)$row['price'];//價格
    $row['amount'] = (int)$row['amount'];//
    $row['total'] = $row['price'] * $row['amount'] ? $row['price'] * $row['amount'] : "";//
    $row['prod'] = getFilesByKindColsnSort("prod",$row['prod_sn']);
    $rows[] = $row;
  }

  $smarty->assign("rows", $rows);
}



/*==========================
  取得訂單明細
==========================*/
function getOrdersBySnProdsn($orders_main_sn,$prod_sn){
  global $db;
  $sql="SELECT *
        FROM `orders`
        WHERE `orders_main_sn` = '{$orders_main_sn}' AND `prod_sn` = '{$prod_sn}'
  ";
  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  return $row;
}




/*==========================
  新增訂單
==========================*/
function order_insert($sn=""){
  global $db;
 
  $_POST['name'] = db_filter($_POST['name'], '');//類別
  $_POST['tel'] = db_filter($_POST['tel'], '');//標題
  $_POST['email'] = db_filter($_POST['email'], '');
  $_POST['kind_sn'] = db_filter($_POST['kind_sn'], '桌號');
  $_POST['ps'] = db_filter($_POST['ps'], '');
  $_POST['uid'] = db_filter($_POST['uid'], '');
  $_POST['date'] = strtotime("now");
  $_POST['op'] = db_filter($_POST['op'], '');//類別
  
  if($sn){

    $sql="UPDATE  `orders_main` SET
                  `name` = '{$_POST['name']}',
                  `tel` = '{$_POST['tel']}',
                  `email` = '{$_POST['email']}',
                  `ps` = '{$_POST['ps']}',
                  `kind_sn` = '{$_POST['kind_sn']}'
                  WHERE `sn` = '{$sn}'
    ";
    $db->query($sql) or die($db->error() . $sql);
    $orders_main = getOrders_mainBySn($sn);
    $_POST['date'] = $orders_main['date'];
    
    #訂單明細檔
    $Total = 0;
    foreach($_POST['amount'] as $prod_sn => $amount){
      $order = getOrdersBySnProdsn($sn,$prod_sn);
      $order['price'] = (int)$order['price'];
      $Total += $order['price'] * $amount;//小計累計

      $sql="UPDATE  `orders` SET
                    `amount` = '{$amount}'
                    WHERE `orders_main_sn` = '{$sn}' and `prod_sn`='{$prod_sn}'
      ";//die($sql);
      $db->query($sql) or die($db->error() . $sql);
      $sort++;
    }


  }else{

    #訂單主檔
    $sql="INSERT INTO `orders_main` 
    (`name`, `tel`, `email`, `ps`, `uid`, `date`, `kind_sn`)
    VALUES 
    ('{$_POST['name']}', '{$_POST['tel']}', '{$_POST['email']}', '{$_POST['ps']}', '{$_POST['uid']}', '{$_POST['date']}', '{$_POST['kind_sn']}')    
    "; //die($sql);
    $db->query($sql) or die($db->error() . $sql);
    $sn = $db->insert_id;  
  
    #訂單明細檔
    $sort = 1;
    $Total = 0;
    foreach($_POST['amount'] as $prod_sn => $amount){
      $prod = getProdsBySn($prod_sn);
      $prod['title'] = db_filter($prod['title'], '');
      $prod['price'] = (int)$prod['price'];
      $Total += $prod['price'] * $amount;//小計累計
      $sql="INSERT INTO `orders` 
                        (`orders_main_sn`, `prod_sn`, `title`, `amount`, `price`, `sort`)
                        VALUES 
                        ('{$sn}', '{$prod_sn}', '{$prod['title']}', '{$amount}', '{$prod['price']}', '{$sort}')
      ";
      $db->query($sql) or die($db->error() . $sql);
      $sort++;
    }


  }

  #更新訂單主檔
  $sql="UPDATE  `orders_main` SET
                `total` = '{$Total}'
                WHERE `sn` = '{$sn}'  
  ";
  $db->query($sql) or die($db->error() . $sql);
  
  if($_POST['op'] == "order_insert"){

    $lineId = "SFEbsJ00P8k67DA4TI19AUNDRsxofmjNWUEnmjRNVAa";

    send_notify_curl("
      您有一張訂單-{$sn}
      合計金額：{$Total} 元
    ", $lineId);

    unset($_SESSION['cart']);
    unset($_SESSION['cartAmount']);
  }

  return "cart.php?op=order_list&sn={$sn}&key={$_POST['date']}";

}

/*===========================
  用sn取得訂單主檔檔資料
===========================*/
function getOrders_mainBySn($sn){
  global $db;
  $sql="SELECT *
        FROM `orders_main`
        WHERE `sn` = '{$sn}'
  ";//die($sql);  
  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  return $row;
}

function order_form($sn=""){
  global $db,$smarty;
    if($sn){      
      if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);
      $row = getOrders_mainBySn($sn);
      $row['kind_sn_options'] = getProdsOptions("orderKind");
      $row['op'] = "order_update";      
      
      #明細檔
      $sql="SELECT *
            FROM `orders`
            WHERE `orders_main_sn` = '{$sn}'
            ORDER BY `sort`
      ";  
      $result = $db->query($sql) or die($db->error() . $sql);
      $orders = [];
      //sn	orders_main_sn	prod_sn	title	amount	price	sort  
      while($order = $result->fetch_assoc()){    
        $order['sn'] = (int)$order['sn'];//分類  
        $order['prod_sn'] = (int)$order['prod_sn'];//商品流水號
        $order['title'] = htmlspecialchars($order['title']);//標題
        $order['price'] = (int)$order['price'];//價格
        $order['amount'] = (int)$order['amount'];//
        $order['prod'] = getFilesByKindColsnSort("prod",$order['prod_sn']);
        $orders[$order['prod_sn']] = $order;
      }
      $smarty->assign("orders", $orders);

    }else{
      $row['sn'] = "";
      $row['uid'] = isset($_SESSION['user']['uid']) ? $_SESSION['user']['uid'] : "" ;
      $row['name'] = isset($_SESSION['user']['name'])? $_SESSION['user']['name'] : "";
      $row['tel'] = isset($_SESSION['user']['tel'])? $_SESSION['user']['tel'] : "";
      $row['email'] = isset($_SESSION['user']['email'])? $_SESSION['user']['email'] : "";
    
      $row['kind_sn'] = "";//類別值
      $row['kind_sn_options'] = getProdsOptions("orderKind");
      $row['op'] = "order_insert";

    }
    $smarty->assign("row", $row);

}
function add_cart($sn){
  global $db;
  $row = getProdsBySn($sn);
  if($row['enable']){       
    $row['sn'] = (int)$row['sn'];//分類
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['price'] = (int)$row['price'];//價格
    $row['prod'] = getFilesByKindColsnSort("prod",$row['sn']); 
    $row['amount'] = isset($_SESSION['cart'][$sn]['amount']) ? $_SESSION['cart'][$sn]['amount']++ : 1;
    
    $_SESSION['cart'][$sn] = $row;
    $_SESSION['cartAmount'] = count($_SESSION['cart']);
    
  }
  return "加入購物車成功";
}

function op_list(){
  global $db,$smarty;

  $sql = "SELECT a.sn,a.title,price,
                 b.title as kinds_title
          FROM `prods` as a
          LEFT JOIN `kinds` as b on a.kind_sn=b.sn
          WHERE a.`enable`='1'
          ORDER BY a.date desc
  ";//die($sql);

  #---分頁套件(原始$sql 不要設 limit)
  include_once _WEB_PATH."/class/PageBar/PageBar.php";
  $pageCount = 8;
  $PageBar = getPageBar($db, $sql, $pageCount, 10);
  $sql     = $PageBar['sql'];
  $total   = $PageBar['total'];
  $bar     = ($total > $pageCount) ? $PageBar['bar'] : "";
  $smarty->assign("bar",$bar);  
  #---分頁套件(end)

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){    
    $row['sn'] = (int)$row['sn'];//分類
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['price'] = (int)$row['price'];//價格
    $row['prod'] = getFilesByKindColsnSort("prod",$row['sn']);  
    //$row['kinds_title'] = htmlspecialchars($row['kinds_title']);//標題
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows); 

}

function send_notify_curl($message, $token) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://notify-api.line.me/api/notify",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => http_build_query(array("message" => $message),'','&'),
	  CURLOPT_HTTPHEADER => array(
		  "Authorization: Bearer $token",
		  "Content-Type: application/x-www-form-urlencoded"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
	  return "cURL Error #:" . $err;
	} else {
	  return $response;
	}
}