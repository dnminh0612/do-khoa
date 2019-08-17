<script type="text/javascript">
	function deleleAction(){
		return confirm("Bạn có muốn xóa khuyến mãi này?");
	}
</script>
<?php
    if(isset($_SESSION['DeleteCheck']))
    {
        if($_SESSION['DeleteCheck']){
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { Swal.fire({
                type: 'success',
                title: 'Đã xóa khuyến mãi!',
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
                $table = query_select("SELECT * FROM kmai");
                $count = $table->rowCount();
                echo '<h3>'.$count.'</h3>';
            ?>

                <p>Khuyến mãi...</p>
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
                <h3>Khuyến mãi</h3>

                <p>Danh sách khuyến mãi...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6 col-responsive col-respon-3">
        <!-- small box -->
        <a href="indexAdmin.php?page=them_km">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Thêm</h3>

                    <p>Thêm khuyến mãi...</p>
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

<!-- list -->
<div class="row">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="respon-800">STT</th>
                <th>Tên KM</th>
                <th class="respon-600">Hình thức</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $table = query_select("SELECT * FROM kmai");
            $count = $table->rowCount();
            $stt = 1;
            if ($count > 0) {
                foreach ($table as $row) {
        ?>

            <tr>
                <td class="respon-800"><?php echo $stt++; ?></td>
                <td><?php echo $row['tenkm'] ?></td>
                <td class="respon-600"><?php echo $row['HTKM'] ?></td>
                <td><?php echo $row['TGBD'] ?></td>
                <td><?php echo $row['TGKT'] ?></td>
                <td>
                <a href="?page=sua_km&id=<?php echo $row['MaKm']?>">
                        <button type="button" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        </button>
                    </a>&nbsp;
                    <a id="example"href="?page=xoa_km&id=<?php echo $row['MaKm'];?>"
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
            else
            {
                echo "<h2>Hiện tại chưa khuyến mãi...</h2>";
            }
        ?>
        </tbody>
    </table><!-- list product -->
</div>