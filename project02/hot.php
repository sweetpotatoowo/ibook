<?php
// 建立熱銷商品查詢
$SQLstring = "SELECT * FROM hot,product,product_img WHERE hot.p_id=product_img.p_id AND hot.p_id=product.p_id AND product_img.sort=1 ORDER BY h_sort";
$hot = $link->query($SQLstring);
?>
<div class="card text-center mt-3" style="border: none;">
    <div class="card-body">
        <h5 class="card-title">站長推薦,熱銷商品</h5>
    </div>
    <?php while ($data = $hot->fetch()) { ?>
        <a href="goods.php?p_id=<?php echo $data['p_id']; ?>">
        <img src="images/<?php echo $data['img_file']; ?>" class="card-img-top" alt="hot<?php echo $data['h_sort']; ?>" title="<?php echo $data['p_name']; ?>"></a>
    <?php } ?>
</div>