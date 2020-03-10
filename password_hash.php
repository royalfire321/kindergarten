<?php
/*
檔案名稱：password_hash.php
*/
$pwd = "123456";
$hash = password_hash($pwd, PASSWORD_DEFAULT);//加密
$md5 = md5($pwd);
 
echo "------------------ hash -----------------";
echo "<br>";
echo $hash;
echo "<br>";
if (password_verify($pwd, $hash)) { //判斷密碼
  echo "密碼正確(hash)";
}
echo "<br>";
echo "------------------ md5 -----------------";
echo "<br>";
echo $md5;