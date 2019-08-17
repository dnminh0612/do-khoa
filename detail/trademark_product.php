<!-- mã loại -->
<?php $nhcc = $row['MaNcc'];?>

<div class="list-product">
    <?php
        $t = query_select("SELECT * FROM sp, nhacungcap, ctkm, kmai WHERE sp.MaNcc = nhacungcap.MaNCC  AND sp.MaSP = ctkm.MaSP AND ctkm.MaKm = kmai.MaKm AND sp.MaNcc= '$nhcc'");
        $total = $t->rowCount();

        $start = 0;
        $limit = 6;

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $start = ($id-1)*$limit;
        }
        else
        {
            $id = 1;
        }

        $page = ceil($total/$limit);
        $table = query_select("SELECT * FROM sp, nhacungcap, ctkm, kmai WHERE sp.MaNcc = nhacungcap.MaNCC AND sp.MaSP = ctkm.MaSP AND ctkm.MaKm = kmai.MaKm AND sp.MaNcc= '$nhcc' limit $start, $limit ");
        $count = $table->rowCount();
        if ($count > 0) {
            foreach ($table as $row2) {
                $masp2 = $row2['MaSP'];
    ?>
    <div class="item-product">
        <div class="box">
            <div class="img">
                <a href="?p=detail&&masp=<?php echo $masp ?>">
                    <?php 
                        $table = query_select("SELECT * FROM video WHERE video.MaSP = '".$masp2."' limit 1");
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
                <p class="name-product"><a href="#"><?php echo mysubstr($row2['Tensp'],15) ?></a></p>
                <p class="brand-product"><a href="#"><?php echo mysubstr($row2['TenNCC'], 20); ?></a></p>
                <p class="price"><?php echo number_format( $row2['Gia'] ); ?></p>
            </div>
            <div class="member-gold">
                <p class="price-gold">
                    <?php 
                        if($row2['Tilegiamgia'] != 0)
                        {
                            echo number_format( ($row2['Gia'] * $row2['Tilegiamgia'])/100 ); 
                        }
                        else
                        {
                            echo number_format( $row2['Gia'] );
                        }
                    ?>
                </p>
                <p class="price-member">
                    <?php
                        if($row2['member'] !=0)
                        {
                            echo number_format( ($row2['Gia'] * $row2['member'])/100 );
                        }
                        else
                        {
                            echo number_format( $row2['Gia'] );
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <?php
            }
        }
    ?>
</div>

<!-- pagiation -->
<?php 
    if($count >=0)
    {
        ?>
    <div class="row-pagination">
        <ul class="pagination">
            <?php 
                if($id > 1){
            ?>
                <li><a href="?p=detail&&masp=<?php echo $masp ?>&&id=<?php echo ($id-1); ?>">Prev</a></li>
            <?php } ?>

            <?php 
                for($i=1;$i <= $page;$i++)
                { ?>

                    <li><a href="?p=detail&&masp=<?php echo $masp ?>&&id=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                <?php
                }
            ?>

            <?php 
                if($id !=$page)
                {
                    ?>
                    <li><a href="?p=detail&&masp=<?php echo $masp ?>&&id=<?php echo ($id+1); ?>">Next</a></li>
                <?php
                }
            ?>
        </ul>
    </div>

        <?php
    }

?>