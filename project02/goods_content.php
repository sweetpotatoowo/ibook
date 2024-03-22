<div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-3 py-2">
                <?php
                // 取得產品圖片檔名資料
                $SQLstring = sprintf("SELECT * FROM product_img WHERE product_img.p_id=%d ORDER BY sort", $_GET['p_id']);
                $img_rs = $link->query($SQLstring);
                $imgList = $img_rs->fetch();
                ?>
                <img id="showGoods" name="showGoods" src="./images/<?php echo $imgList['img_file']; ?>" class="img-fluid rounded-start" alt="<?php echo $data['p_name']; ?>" title="<?php echo $data['p_name']; ?>">
                <div class="row mt-2">
                  <?php do { ?>
                    <div class="col-md-4">
                      <a href="./images/<?php echo $imgList['img_file']; ?>" rel="group" class="fancybox" title="<?php echo $data['p_name']; ?>"><img src="./images/<?php echo $imgList['img_file']; ?>" alt="<?php echo $data['p_name']; ?>" title="<?php echo $data['p_name']; ?>" class="img-fluid"></a>
                    </div>
                  <?php } while ($imgList = $img_rs->fetch()); ?>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $data['p_name']; ?></h5>
                  <p class="card-text"><?php echo $data['p_intro']; ?></p>
                  <h4 class="color_e600a0">NT<?php echo $data['p_price']; ?></h4>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="input-group input-group-lg">
                        <span class="input-group-text color-success" id="inputGroup-sizing-lg">數量</span>
                        <input type="number" id="qty" name="qty" value="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <button name="button01" id="button01" type="button" class="btn btn-success btn-lg color-success" onclick="addcart(<?php echo $data['p_id']; ?>)">加入購物車</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php echo $data['p_content']; ?>
          <?php require_once('drop-box.php'); ?>