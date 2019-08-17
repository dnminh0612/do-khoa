<!-- mã sản phẩm -->
<?php $makh = $_GET['makh']; ?>
<?php $cmndkh = $_GET['cmndkh']; ?>

<!-- kết nối database -->
<?php include("./../connect.php"); ?>


<div class="row">
    <div class="col-12">
        <h4>
            <i class="fas fa-database"></i> Chi Tiết Khách Hàng
            <small class="float-right"><a href="?page=list_kh"><i class="fas fa-undo-alt"></i> Trở lại</a></small>
        </h4>
    </div>
</div><br>

<div class="row">
    <div class="col-md-12">
        <form method="POST" action="">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Thông tin Khách hàng
                    </h3>
                </div>

                <?php
                $table = query_select("SELECT * FROM khachhang WHERE MaKH = '$makh'");
                $count = $table->rowCount();
                if ($count > 0) {
                    foreach ($table as $row) {
                        ?>
                        <div class="card-body">

                            <dl>
                                <dt>Tên khách hàng: <span class="text-success"><?php echo $row['Hoten']; ?></span> </dt>
                                <dt>Số CMND: <span class="text-success"><?php echo $row['Socmnd']; ?></span> </dt>
                                <dt>Giới tính: <span class="text-success"><?php if($row['Gioitinh']==1) { echo "Nam"; } else { echo "Nữ"; } ?></span> </dt>
                                <dt>Năm sinh: <span class="text-success"><?php echo $row['Namsinh']; ?></span> </dt>
                                <dt>Điện thoại: <span class="text-success"><?php echo $row['dienthoai']; ?></span> </dt>
                                <dt>Đăng ký thường trú: <span class="text-success"><?php echo $row['DKTT']; ?></span> </dt>
                                <dt>Ghi chú: <span class="text-success"><?php echo $row['Ghichu']; ?></span> </dt>
                            </dl>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </form>
        <!-- /.card -->
    </div>

    <!-- ảnh sản phẩm -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="padding-bottom: 25px;">
                <div class="row">

                    <?php 

                        $table2 = query_select("SELECT `MaMulti`, `URLVideo`, `URLHinh`, `MaSP`, `MaTin`, `CMND_KH`, `update_on` FROM `video` WHERE video.CMND_KH = '$cmndkh'");
                        $count2 = $table2->rowCount();
                        if($count2 > 0){
                            foreach ($table2 as $row2){
                                $hinhCMND = $row2['URLHinh'];
                                ?>

                                <div class="col-6" style="margin-bottom:5px;">

                                    <img class="img-thumbnail" src="./../<?php echo $hinhCMND; ?>" alt="">
                                </div>

                                <?php
                            }
                        }

                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</div>