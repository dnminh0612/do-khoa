<!-- mã loại -->
<?php $maloai = $row['Maloai'];?>

<div class="list-product-related">

    <?php
        $table = query_select("SELECT * FROM sp, loaisp WHERE sp.Maloai = loaisp.MaLoai AND sp.Maloai = '$maloai'");
        $count = $table->rowCount();
        if ($count > 0) {
            foreach ($table as $row1) {
                $masp1 = $row1['MaSP'];
    ?>

    <div class="product-top">
        <div class="product-name"><?php echo mysubstr($row1['Tensp'],20) ?> <br> <span>Mã SP: <?php echo $row1['MaSP'] ?></span></div>
        <div class="price"><?php echo number_format( $row1['Gia'] ); ?></div>
        <div class="button-buy">
            <a href="?p=detail&&masp=<?php echo $masp1 ?>" rel="nofollow">Chi tiết</a>
        </div>
    </div>
        <?php
            }
        }
    ?>
</div>