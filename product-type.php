<!-- tìm sản phẩm theo loại có khuyến mãi -->
<?php $maloai = $_GET['t']; ?>

<main id="mainDetail">
    <!-- trademark -->
    <section class="productTrademark">
        <div class="pr-tr-container">
            <div class="title">
                <?php
                    $table = query_select("SELECT * FROM loaisp WHERE loaisp.Maloai='$maloai'");
                    $count = $table->rowCount();
                    if ($count > 0) {
                        foreach ($table as $row) {
                
                ?>
                <h3><span><?php echo $row['TenLoai']; ?></span></h3>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="list-product">
                
                <?php
                    $table = query_select("SELECT * FROM sp, nhacungcap, ctkm WHERE  sp.MaSP = ctkm.MaSP AND sp.MaNcc = nhacungcap.MaNCC AND sp.Maloai='$maloai'");
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
                        </div>
                        <div class="member-gold">
                            <p class="price-gold">
                                <?php 
                                    if($row['Tilegiamgia'] != 0)
                                    {
                                        echo number_format( ($row['Gia'] * $row['Tilegiamgia'])/100 ); 
                                    }
                                    else
                                    {
                                        echo number_format( $row['Gia'] );
                                    }
                                ?> đ
                            </p>
                            <p class="price-member">
                                <?php
                                    if($row['member'] !=0)
                                    {
                                        echo number_format( ($row['Gia'] * $row['member'])/100 );
                                    }
                                    else
                                    {
                                        echo number_format( $row['Gia'] );
                                    }
                                ?> đ
                            </p>
                        </div>
                    </div>
                </div>

                <?php
                        }
                    }

                    else{
                        echo "<h4>Hiện tại đang hết hàng...</h4>";
                    }

                ?>

            </div>
        </div>
    </section>

</div>