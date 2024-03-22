<main class="mx-5">
  <!-- 熱門雜誌 -->
  <div class="container-fluid">
    <h2>熱門雜誌</h2>
    <?php
    // 建立product分頁設定

    // 列出產品資料查詢
    $queryFirst = "SELECT * FROM product,product_img WHERE p_open=1 AND product_img.kind = 1 AND product.p_id=product_img.p_id ORDER BY product.p_id ASC";
    $pList01 = $link->query($queryFirst);
    $i = 1; //控制每列row產生
    ?>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <?php
        $i = 1;
        $pList01_Rows = $pList01->fetchAll(PDO::FETCH_ASSOC);

        foreach ($pList01_Rows as $row) {
          if ($i % 4 == 1 || $i == 1) {
            echo '<div class="carousel-item ' . activeShow($i, 1) . '">';
            echo '<div class="row">';
          }
        ?>
          <div class="card col-md-3">
            <a href="#"><img src="images/<?php echo $row['img_file']; ?>" class="card-img-top img-fluid carousel-image" alt="<?php echo $row['p_name']; ?>" title="<?php echo $row['p_name']; ?>"></a>
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo $row['p_name']; ?></h5>
              <p class="card-text">NT<?php echo $row['p_price']; ?></p>
              <a href="#" class="btn btn-primary">放入購物車</a>
            </div>
          </div>
        <?php
          if ($i % 4 == 0 || $i == count($pList01_Rows)) {
            echo '</div>';
            echo '</div>';
          }
          $i++;
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>
  <div class="container-fluid">
    <h2>熱門電子書</h2>
    <?php
    // 建立product分頁設定

    // 列出產品資料查詢
    $queryFirst = "SELECT * FROM product,product_img WHERE p_open=1 AND product_img.kind = 2 AND product.p_id=product_img.p_id ORDER BY product.p_id ASC";
    $pList01 = $link->query($queryFirst);
    $i = 1; //控制每列row產生
    ?>
    <div id="myCarousel2" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <?php
        $i = 1;
        $pList01_Rows = $pList01->fetchAll(PDO::FETCH_ASSOC);

        foreach ($pList01_Rows as $row) {
          if ($i % 4 == 1 || $i == 1) {
            echo '<div class="carousel-item ' . activeShow($i, 1) . '">';
            echo '<div class="row">';
          }
        ?>
          <div class="card col-md-3">
            <a href="#"><img src="images/<?php echo $row['img_file']; ?>" class="card-img-top img-fluid carousel-image" alt="<?php echo $row['p_name']; ?>" title="<?php echo $row['p_name']; ?>"></a>
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo $row['p_name']; ?></h5>
              <p class="card-text">NT<?php echo $row['p_price']; ?></p>
              <a href="#" class="btn btn-primary">放入購物車</a>
            </div>
          </div>
        <?php
          if ($i % 4 == 0 || $i == count($pList01_Rows)) {
            echo '</div>';
            echo '</div>';
          }
          $i++;
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel2" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel2" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="container-fluid">
    <h2>熱門動漫</h2>
    <?php
    // 建立product分頁設定

    // 列出產品資料查詢
    $queryFirst = "SELECT * FROM product,product_img WHERE p_open=1 AND product_img.kind = 3 AND product.p_id=product_img.p_id ORDER BY product.p_id ASC";
    $pList01 = $link->query($queryFirst);
    $i = 1; //控制每列row產生
    ?>
    <div id="myCarousel3" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel3" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel3" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <?php
        $i = 1;
        $pList01_Rows = $pList01->fetchAll(PDO::FETCH_ASSOC);

        foreach ($pList01_Rows as $row) {
          if ($i % 4 == 1 || $i == 1) {
            echo '<div class="carousel-item ' . activeShow($i, 1) . '">';
            echo '<div class="row">';
          }
        ?>
          <div class="card col-md-3">
            <a href="#"><img src="images/<?php echo $row['img_file']; ?>" class="card-img-top img-fluid carousel-image" alt="<?php echo $row['p_name']; ?>" title="<?php echo $row['p_name']; ?>"></a>
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo $row['p_name']; ?></h5>
              <p class="card-text">NT<?php echo $row['p_price']; ?></p>
              <a href="#" class="btn btn-primary">放入購物車</a>
            </div>
          </div>
        <?php
          if ($i % 4 == 0 || $i == count($pList01_Rows)) {
            echo '</div>';
            echo '</div>';
          }
          $i++;
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel3" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel3" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>

</main>