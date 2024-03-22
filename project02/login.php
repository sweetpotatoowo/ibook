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
<?php
// 取得要返回的php頁面
if (isset($_GET['sPath'])) {
  $sPath = $_GET['sPath'] . ".php";
} else {
  // 登入完成預設要進入首頁
  $sPath = "product.php";
}
// 檢查是否完成登入驗證
if (isset($_SESSION['login'])) {
  header(sprintf('location:%s', $sPath));
}
?>
<!doctype html>
<html lang="zh-TW">

<head>
  <!-- headfile -->
  <?php require_once('headfile.php') ?>
  <style>
    /* 會員登入專用css設定 */
    .col-md-10 {
      background-repeat: no-repeat;
      background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
    }

    /* card component */
    .mycard.mycard-container {
      max-width: 400px;
      height: 450px;
    }

    .mycard {
      background-color: #f7f7f7;
      padding: 20px 25px 30px;
      margin: 0 auto 25px;
      margin-top: 50px;
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      border-radius: 10px;
    }

    .profile-img-card {
      margin: 0 auto 10px auto;
      display: block;
      width: 100px;
    }

    .profile-name-card {
      font-size: 20px;
      text-align: center;
    }

    .form-signin input[type='email'],
    .form-signin input[type='password'],
    .form-signin button {
      width: 100%;
      height: 44px;
      font-size: 16px;
      display: block;
      margin-bottom: 20px;
    }

    .btn.btn-signin {
      font-weight: 700;
      background-color: rgb(104, 145, 162);
      color: white;
      height: 38px;
      transition: background-color 1s;
    }

    .btn.btn-signin:hover,
    .btn.btn-signin:active,
    .btn.btn-signin:focus {
      background-color: rgb(12, 97, 33);
    }

    .other a {
      color: rgb(104, 145, 162);
    }

    .other a:hover,
    .other a:active,
    .other a:focus {
      color: rgb(12, 97, 33)
    }
  </style>
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
          <?php require_once('hot.php')
          ?>
        </div>
        <div class="col-md-10">
          <!-- 會員登入頁面 -->
          <div class="mycard mycard-container">
            <img id="profile-img" class="profile-img-card" src="images/logo03.svg" alt="logo">
            <p id="profile-name" class="profile-name-card">BOOKS:會員登入</p>
            <form action="" method="POST" class="form-signin" id="form1">
              <input type="email" id="inputAccount" name="inputAccount" class="form-control" placeholder="Account" required autofocus />
              <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required />
              <button type="submit" class="btn btn-signin mt-4">sign in</button>
            </form>
            <div class="other mt-5 text-center">
              <a href="register.php">New user/</a><a href="#">Forget the password</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- footer -->
  <?php require_once('footer.php') ?>


  <!-- script -->
  <?php require_once('jsfile.php') ?>
  <script type="text/javascript" src="commlib.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#form1").submit(function() {
        const inputAccount = $("#inputAccount").val();
        const inputPassword = MD5($("#inputPassword").val());
        $('#loading').show();
        // 利用$ajax函數呼叫後台的auth_user.php
        $.ajax({
          url: 'auth_user.php',
          type: 'post',
          dataType: 'json',
          data: {
            inputAccount: inputAccount,
            inputPassword: inputPassword,
          },
          success: function(data) {
            if (data.c == true) {
              alert(data.m);
              // window.location.reload();
              window.location.href = "<?php echo $sPath; ?>";
            } else {
              alert(data.m);
            }
          },
          error: function(data) {
            alert("系統目前無法連接到後台資料庫");
          }
        });
      });
    });
  </script>
  <div id="loading" name="loading" style="display: none;position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(255, 255, 255, 0.5);z-index:9999">
    <i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position: absolute;top:50%;left:50%"></i>
  </div>
</body>

</html>