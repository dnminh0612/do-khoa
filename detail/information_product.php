<div class="content">
    <?php
        $table = query_select("SELECT * FROM tintuc WHERE tintuc.MaSP = '$masp' LIMIT 3 ");
        $count = $table->rowCount();
        if ($count > 0) {
            foreach ($table as $row3) {
                $matin = $row3['MaTin'];
    ?>

    <p style="text-align: justify;"><?php echo $row3['Noidung'] ?></p>


    <?php 
        $table = query_select("SELECT * FROM video WHERE video.MaTin = '$matin' LIMIT 1");
        $count = $table->rowCount();
        if ($count > 0) {
            foreach ($table as $row_img) {
    
    ?>
    <p><img src="<?php echo $row_img['URLHinh']; ?>"></p>
    <?php
            }
        }
    ?>

    <?php
            }
        }
    ?>
</div>