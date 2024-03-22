<header>
    <div class="container-fluid">
        <!-- 導覽列 -->
        <nav class="navbar navbar-expand-lg bg-light mx-5 fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="product.php">iBooks</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse headerSearch" id="navbarSupportedContent">
                    <form name="search" id="search" action="product.php" method="get" class="d-flex" role="search">
                        <input id="search_name" name="search_name" value="<?php echo (isset($_GET['search_name'])) ? $_GET['search_name'] : ''; ?>" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <ul class="topNav navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        if (isset($_GET['p_id'])) {
                            // 如果使用產品查詢,需取得類別編號上一層類別
                            $SQLstring = sprintf("SELECT uplink FROM pyclass,product WHERE pyclass.classid = product.classid AND p_id=%d", $_GET['p_id']);
                            $classid_rs = $link->query($SQLstring);
                            $data = $classid_rs->fetch();
                            $ladder = $data['uplink'];
                        } elseif (isset($_GET['level']) && $_GET['level'] == 1) {
                            // 使用第一層類別查詢
                            $ladder = $_GET['classid'];
                        } elseif (isset($_GET['classid'])) {
                            // 如果使用類別查詢需取得上一層類別
                            $SQLstring = 'SELECT uplink FROM pyclass where level =2 and classid=' . $_GET['classid'];
                            $classid_rs = $link->query($SQLstring);
                            $data = $classid_rs->fetch();
                            $ladder = $data['uplink'];
                        } else {
                            $ladder = 1;
                        }
                        // 讀取後台購物車內產品數量
                        $SQLstring = "SELECT * FROM cart WHERE orderid is NULL AND ip ='" . $_SERVER['REMOTE_ADDR'] . "'";
                        $cart_rs = $link->query($SQLstring);

                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="product.php" role="button" aria-expanded="false">
                                書籍總覽
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                //列出產品類別第一層
                                $sqlString = "SELECT * FROM pyclass WHERE level= 1 ORDER BY sort";
                                $pyclass01 = $link->query($sqlString);
                                while ($pyclass01_Rows = $pyclass01->fetch()) {
                                    $i = $pyclass01_Rows['classid'];
                                ?>
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle" href="product.php?classid=<?php echo $pyclass01_Rows['classid']; ?>&level=<?php echo $pyclass01_Rows['level']; ?>">
                                            <?php echo $pyclass01_Rows['cname']; ?>
                                        </a>
                                        <!-- 列出產品類別第二層 -->
                                        <?php
                                        $sqlString = sprintf("SELECT * FROM pyclass WHERE level = 2 and uplink=%d ORDER BY sort", $pyclass01_Rows['classid']);
                                        $pyclass02 = $link->query($sqlString);  //執行查詢
                                        ?>
                                        <ul class="dropdown-menu dropendA">
                                            <li class="dropendB">
                                                <div class="d-flex flex-column">
                                                    <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                                                        <div class="p">
                                                            <a class="dropdown-item rightBorder" href="product.php?classid=<?php echo $pyclass02_Rows['classid']; ?>">
                                                                <?php echo $pyclass02_Rows['cname']; ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">購物車<span class="badge text-bg-info"><?php echo ($cart_rs) ? $cart_rs->rowCount() : ''; ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">會員註冊</a>
                        </li>
                        <?php if (isset($_SESSION['login'])) {  ?>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" onclick="btn_confirmLink('是否確定登出?','logout.php')">會員登出</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">會員登入</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="downNav nav nav-tabs mx-5">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="product.php" role="button" aria-expanded="false">
                    書籍總覽
                </a>
                <ul class="dropdown-menu">
                    <!-- 列出產品類別第一層 -->
                    <?php
                    $sqlString = "SELECT * FROM pyclass WHERE level= 1 ORDER BY sort";
                    $pyclass01 = $link->query($sqlString);
                    ?>
                    <?php while ($pyclass01_Rows = $pyclass01->fetch()) {
                        $i = $pyclass01_Rows['classid']; ?>

                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="product.php?classid=<?php echo $pyclass01_Rows['classid']; ?>&level=<?php echo $pyclass01_Rows['level'] ?>">
                                <?php echo $pyclass01_Rows['cname']; ?>
                            </a>
                            <!-- 列出產品類別第二層 -->
                            <?php
                            $sqlString = sprintf("SELECT * FROM pyclass WHERE level = 2 and uplink=%d ORDER BY sort", $pyclass01_Rows['classid']);
                            $pyclass02 = $link->query($sqlString);  //執行查詢
                            ?>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="d-flex flex-row">
                                        <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                                            <div class="p">
                                                <a class="dropdown-item rightBorder" href="product.php?classid=<?php echo $pyclass02_Rows['classid']; ?>">
                                                    <!-- 記得要處理每六個就要換行的問題 -->
                                                    <?php echo $pyclass02_Rows['cname']; ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    <?php $i++;
                    } ?>
                </ul>
            </li>
        </ul>
    </div>
</header>