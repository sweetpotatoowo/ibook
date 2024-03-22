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
          <!-- 購物車內容模組-->
          <?php require_once("cart_content.php") ?>
        </div>
      </div>
    </div>
  </main>
  <!-- footer -->
  <?php require_once('footer.php') ?>


  <!-- script -->
  <?php require_once('jsfile.php') ?>
  <script type="text/javascript">
    // 將變更的數量寫入後台資料庫
    $("input").change(function() {
      var qty = $(this).val();
      const cartid = $(this).attr('cartid');
      if (qty <= 0 || qty >= 50) {
        alert("更改數量需大於0以上,以及小於50以下");
        return false;
      }
      $.ajax({
        url: 'change_qty.php',
        type: 'post',
        dataType: 'json',
        data: {
          cartid: cartid,
          qty: qty,
        },
        success: function(data) {
          if (data.c == true) {
            // (data.m);
            window.location.reload();
          } else {
            alert(data.m);
          }
        },
        erroe: function(data) {
          alert("系統目前無法連接到後台資料庫");
        }
      });
    });
  </script>
</body>

</html>