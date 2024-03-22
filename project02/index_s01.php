<!-- 資料庫載入 -->
<?php
require_once("connections/conn_db.php");
?>
<!-- 如果session沒有啟動,則啟動session功能,這是跨網頁變數存取 -->
<?php
(!isset($_SESSION)) ? session_start() : "";
?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php"); ?>
<!doctype html>
<html lang="zh-TW">

<head>
  <!-- headfile -->
  <?php require_once('headfile.php') ?>
</head>

<body>
  <!-- header -->
  <?php require_once('header.php') ?>
  <!-- main -->
  <?php require_once('main.php') ?>
  <!-- footer -->
  <?php require_once('footer.php') ?>


  <!-- script -->
  <?php require_once('jsfile.php') ?>
</body>

</html>

