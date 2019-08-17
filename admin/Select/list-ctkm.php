<script type="text/javascript">
function deleleAction() {
    return confirm("Bạn có muốn xóa sản phẩm này khỏi khuyến mãi?");
}
</script>
<?php
    if(isset($_SESSION['DeleteCheck']))
    {
        if($_SESSION['DeleteCheck']){
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { Swal.fire({
                type: 'success',
                title: 'Đã xóa chương trình KM!',
                showConfirmButton: false,
                timer: 1500
                });";
            echo '}, 1000);</script>';
            $_SESSION['DeleteCheck'] = false;
        }
    }  
?>
<!-- Small boxes (Stat box) -->
<div class="row row-responsive">
    <div class="col-lg-3 col-6 col-responsive col-respon-1">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <?php
                $table = query_select("SELECT * FROM ctkm");
                $count = $table->rowCount();
                echo '<h3>'.$count.'</h3>';
            ?>

                <p>Sản phẩm khuyến mãi...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-6 col-responsive col-respon-2">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Chương trình khuyến mãi</h3>

                <p>Danh sách CTKM...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6 col-responsive col-respon-3">
        <!-- small box -->
        <a href="indexAdmin.php?page=them_ct_km">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Thêm</h3>

                    <p>Thêm CTKM...</p>
                </div>
                <div class="icon">
                    <i class="ion ion-plus"></i>
                </div>
            </div>
        </a>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<?php
            $tablekm = query_select("SELECT * FROM kmai");
            $countkm = $table->rowCount();
            if ($count > 0) {
                foreach ($tablekm as $km) {
                    
        ?>
<div class="list-group">
    <div class="list-group-item list-group-item-action active text-center">
        <?php echo $km['tenkm']?>
    </div>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="respon-800">STT</th>

                <th>Sản phẩm KM</th>
                <th class="respon-400">Tỉ lệ giảm giá(%)</th>
                <th class="respon-600">Số thành viên</th>
                <th class="respon-800">Ghi chú</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $table = query_select("SELECT * FROM ctkm");
            $count = $table->rowCount();
            $stt = 1;
            if ($count > 0) {
                foreach ($table as $row) {
                    if($row["MaKm"] == $km['MaKm']){
        ?>

            <tr>
                <td class="respon-800"><?php echo $stt++; ?></td>
                <!-- <td>
                    <?php
                 $makmget = $row["MaKm"];
                 $tableKM = query_select("select * from kmai where makm='".$makmget."'");
                 $countKM = $tableKM->rowCount();
                 if ($countKM > 0) {
                     foreach ($tableKM as $rowKM) {
                        echo $rowKM['tenkm'];
                     }
                    }
                ?>
                </td> -->
                <td>
                    <!-- <?php echo $row['MaSP'] ?> -->
                    <?php
                 $maspget = $row["MaSP"];
                 $tableSP = query_select("select * from sp where MaSP='".$maspget."'");
                 $countSP = $tableSP->rowCount();
                 if ($countSP > 0) {
                     foreach ($tableSP as $rowSP) {
                        echo $rowSP['Tensp'];
                     }
                    }
                ?>
            </td>
                <td class="respon-400"><?php echo $row['Tilegiamgia'] ?></td>
                <td class="respon-600"><?php echo $row['member'] ?></td>
                <td class="respon-800"><?php echo $row['Ghichu'] ?></td>
                <td>
                    <a href="?page=sua_ct_km&id=<?php echo $row['MaKm'];?>&product=<?php echo $row['MaSP'];?>">
                        <button type="button" class="btn btn-info">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>&nbsp;
                    <a href="?page=xoa_ct_km&id=<?php echo $row['MaKm'];?>&product=<?php echo $row['MaSP'];?>"
                        onclick='return deleleAction();'>
                        <button type="button" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </a>
                </td>
            </tr>

            <?php
            }
                }
            }
        ?>
        </tbody>
    </table>
</div>
<?php
                }
            }else{
                echo "<h2>Hiện tại chưa có chương trình khuyến mãi...</h2>";
            }
        ?>
<!-- list -->


<!-- modal detail -->
<?php include('list-product-detail.php'); ?>