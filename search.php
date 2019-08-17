<!-- xử lý search hiển thị list -->
<?php 
    if(!isset($_GET['p'])){
        include('select.php');

        if(isset($_POST["query"]))
        {
            $item = $_POST["query"];
            $output = '';
            $query = query_select("SELECT * FROM sp WHERE sp.Tensp LIKE '%".$_POST["query"]."%' OR sp.MaSP LIKE '%".$_POST["query"]."%' OR sp.MaNcc LIKE '%".$_POST["query"]."%' ");
            $count = $query->rowCount();
            $output = '<ul class="list-unstyled" >';
            if($count > 0)
            {
                foreach ($query as $row) {
                    $output .= '<li><a href="?p=search&&msp='.$row["MaSP"].'">'.$row["Tensp"].'</a></li>';
                }
            }
            else
            {
                $output .= '<li>Không tìm thấy</li>';
            }
            $output .= '</ul';
            echo $output;
        }
    }
?>

<!-- click list kq search -->
<?php 
    if(isset($_GET['msp']))
    {
        $msp = $_GET['msp'];
    ?>

    <!-- hiển thị tiềm kiếm -->
    <main id="mainDetail">
        <!-- trademark -->
        <section class="productTrademark">
            <div class="pr-tr-container">
                <div class="title">
                    <h3 style="font-size:18px;"><span>Tìm thầy</span></h3>
                </div>

                <div class="list-product">
                <?php
                    $table = query_select("SELECT * FROM sp, nhacungcap WHERE sp.MaNcc = nhacungcap.MaNCC AND sp.MaSP='$msp'");
                    $count = $table->rowCount();
                    if ($count > 0) {
                        foreach ($table as $row) {
                            $masp = $row['MaSP'];
                ?>
                    <div class="item-product">
                        <div class="box">
                            <div class="img">
                                <a href="?p=detail&&masp=<?php echo $masp ?>">
                                <?php 
                                    $table = query_select("SELECT * FROM video WHERE video.MaSP = '".$masp."' limit 1");
                                    $count = $table->rowCount();
                                    if ($count > 0) {
                                        foreach ($table as $row_img) {
                                ?>
                                <img src="<?php echo $row_img['URLHinh']; ?>" alt="">
                                    <?php 
                                        }
                                    }
                                ?>
                                </a>
                            </div>
                            <div class="content">
                                <p class="name-product"><a href="#"><?php echo mysubstr($row['Tensp'],20) ?></a></p>
                                <p class="brand-product"><a href="#"><?php echo $row['TenNCC'] ?></a></p>
                                <p class="price"><?php echo number_format( $row['Gia'] )?> VNĐ</p>
                                <p class="name-product"><a href="#">MASP: <?php echo $row['MaSP'] ?></a></p>
                            </div>
                        </div>
                    </div>

                <?php
                        }
                    }
                ?>
                </div>
            </div>
        </section>
    </main>

    <?php
    }
?>

<!-- hiển thị tiềm kiếm submit search -->
<?php 
    if(isset($_GET['p']) && !isset($_GET['msp']))
    {
        ?>
    <main id="mainDetail">
        <!-- trademark -->
        <section class="productTrademark">
            <div class="pr-tr-container">
                <div class="title">
                    <h3 style="font-size:18px;"><span>Tìm thầy</span></h3>
                </div>

                <div class="list-product">

                    <?php
                        foreach ($output as $row) {
                            $masp = $row['MaSP'];
                        ?>

                    <div class="item-product">
                        <div class="box">
                            <div class="img">
                                <a href="?p=detail&&masp=<?php echo $masp ?>">
                                <?php 
                                    $table = query_select("SELECT * FROM video WHERE video.MaSP = '".$masp."' limit 1");
                                    $count = $table->rowCount();
                                    if ($count > 0) {
                                        foreach ($table as $row_img) {
                                ?>
                                <img src="<?php echo $row_img['URLHinh']; ?>" alt="">
                                    <?php 
                                        }
                                    }
                                ?>
                                </a>
                            </div>
                            <div class="content">
                                <p class="name-product"><a href="#"><?php echo mysubstr($row['Tensp'],20) ?></a></p>
                                <p class="brand-product"><a href="#"><?php echo $row['TenNCC'] ?></a></p>
                                <p class="price"><?php echo number_format( $row['Gia'] )?> VNĐ</p>
                                <p class="name-product"><a href="#">MASP: <?php echo $row['MaSP'] ?></a></p>
                            </div>
                        </div>
                    </div>

                    <?php
                            }
                            
                        ?>

                </div>
            </div>
        </section>
    </main>

    <?php
    }
?>

