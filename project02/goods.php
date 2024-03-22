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
  <link rel="stylesheet" href="./fancybox-2.1.7/source/jquery.fancybox.css">
</head>

<body>
  <!-- header -->
  <?php require_once('header.php') ?>
  <!-- main -->
  <main class="mx-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <!-- sidebar -->
          <?php require_once('sidebar.php') ?>
          <!-- 引入熱銷商品模組 -->
          <?php require_once('hot.php') ?>
        </div>
        <div class="col-md-10">
          <!-- 建立類別分項 -->
          <?php require_once("breadcrumb.php"); ?>
          <!-- 商品總覽 -->
          <?php require_once('goods_content.php') 
          ?>
        </div>
      </div>
    </div>

  </main>

  <!-- footer -->
  <?php require_once('footer.php') ?>


  <!-- script -->
  <?php require_once('jsfile.php') ?>
  <script type="text/javascript" src="./fancybox-2.1.7/source/jquery.fancybox.js"></script>
  <script type="text/javascript">
    $(function() {
      // 定義在滑鼠滑過圖片檔名填入主圖src中
      $(".card .row.mt-2 .col-md-4 a").mouseover(function() {
        var imgsrc = $(this).children("img").attr("src");
        $("#showGoods").attr({
          "src": imgsrc
        });
      });
      // 將子圖片放到lightbox展示
      $(".fancybox").fancybox();
    });
  </script>
</body>

</html>