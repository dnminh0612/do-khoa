
<!-- mã sản phẩm -->
<?php $masp = $_GET['masp']; ?>

<?php
    $table = query_select("SELECT * FROM sp, nhacungcap, ctkm, kmai WHERE sp.MaNcc = nhacungcap.MaNCC  AND sp.MaSP = ctkm.MaSP AND ctkm.MaKm = kmai.MaKm AND sp.MaSP= '$masp'");
    $count = $table->rowCount();
    if ($count > 0) {
        foreach ($table as $row) {
?>

    <div class="col-left detail">
        <div class="title-name">
            <div class="brand"> <?php echo $row['TenNCC']; ?> </div>
            <div class="name"> <?php echo $row['Tensp']; ?> </div>
        </div>

        <div class="row box">
            <div class="left-img">
                <div class="list-img-product">
                    <?php
                        $table = query_select("SELECT * FROM video WHERE video.MaSP = '$masp' limit 0,5 ");
                        
                        $count = $table->rowCount();
                        if ($count > 0) {
                            foreach ($table as $row1) {
                    ?>
                    <img src="<?php echo $row1['URLHinh'] ?>" class="tabImgDetail" alt="">
                        <?php
                            }
                        }
                    ?>
                </div>

                <div class="list-button-img">
                    <?php
                        $table = query_select("SELECT * FROM video WHERE video.MaSP = '$masp' limit 0,5 ");
                        $count = $table->rowCount();
                        if ($count > 0) {
                            foreach ($table as $row2) {
                    ?>
                    <button class="buttonTabImgDetail buttonTabImgDetail-active">
                        <img src="<?php echo $row2['URLHinh'] ?>">
                    </button>
                        <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="right-content">
                <div class="row-1">
                    <ul class="content">
                        <li><span>Nhãn hiệu</span>: <span><?php echo $row['TenNCC']; ?></span></li>
                        <li><span>Trạng thái</span>: <span> <?php echo $row['trangthai']; ?> </span></li>
                        <li><span>Ngày nhập hàng</span>: <span><?php echo $row['Ngaynhaphang']; ?></span></li>
                        <li><span>Hạng sử dụng</span>: <span><?php echo $row['hansudung']; ?> ngày</span></li>
                        <li><span>Mã nhà cung cấp</span>: <span><?php echo $row['MaNcc']; ?></span></li>
                        <li><span>Giá</span>: <span><?php echo number_format( $row['Gia'] ); ?> VNĐ</span></li>
                        <li><span>Giá gold</span>: <span>
                        <?php
                            if($row['Tilegiamgia'] !=0)
                            {
                                echo number_format( ($row['Gia'] * $row['Tilegiamgia'])/100 ) ." VNĐ";
                            }
                            else
                            {
                                echo "Không";
                            }
                        ?>
                        </span></li>
                        <li><span>Giá member</span>: <span>
                        <?php
                            if($row['member'] !=0)
                            {
                                echo number_format( ($row['Gia'] * $row['member'])/100 ) ." VNĐ";
                            }
                            else
                            {
                                echo "Không";
                            }
                        ?>
                        </span></li>
                    </ul>
                </div>

                <div class="row-2">
                    <h4 class="title-sub">Mô tả</h4>
                    <p><?php echo $row['MotaSP'] ?></p>
                </div>
            </div>
        </div>
    </div>

<?php
        }
    }
?>


