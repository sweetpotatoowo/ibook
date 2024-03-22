<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json;charset=utf-8'); //return json string

require_once('connections/conn_db.php');

if (isset($_POST['cartid']) && isset($_POST['qty'])) {
    $cartid = $_POST['cartid'];
    $qty = $_POST['qty'];
    $query = sprintf("UPDATE cart SET qty='%d' WHERE cart.cartid=%d",$qty,$cartid);
    $result = $link->query($query);
    if ($result) {
        $retcode = array("c" => "1", "m" => '謝謝你!產品已加入購物車中。');
    } else {
        $retcode = array("c" => "0", "m" => '抱歉!資料無法謝入後台資料庫,請聯絡管理人員。');
    }
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
}
return;
?>