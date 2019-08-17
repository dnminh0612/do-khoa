<!-- subtring -->
<?php include('./../function/substring.php'); ?>

<script type="text/javascript">
	function deleleAction(){
		return confirm("Bạn có muốn xóa tin tức này?");
	}
</script>
<?php
    if(isset($_SESSION['DeleteCheck']))
    {
        if($_SESSION['DeleteCheck']){
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { Swal.fire({
                type: 'success',
                title: 'Đã xóa tin tức!',
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
        <div class="small-box bg-warning ">
            <div class="inner">
            <?php
                $table = query_select("SELECT * FROM tintuc");
                $count = $table->rowCount();
                echo '<h3>'.$count.'</h3>';
            ?>

                <p>Tin tức...</p>
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
                <h3>Tin tức</h3>

                <p>Danh sách tin tức...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6 col-responsive col-respon-3">
        <!-- small box -->
        <a href="indexAdmin.php?page=them_tin_tuc">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Thêm</h3>

                    <p>Thêm tin tức...</p>
                </div>
                <div class="icon">
                    <i class="ion ion-plus"></i>
                </div>
            </div>
        </a>
    </div>
    <!-- ./col -->
</div><!-- /.row -->

<!-- list -->
<div class="row">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>Tiêu Đề Tin Tức</th>
                <th>Mã Sản Phẩm</th>
                <th class="respon-600">Nội Dung</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $table = query_select("SELECT * FROM tintuc");
            $count = $table->rowCount();
            if ($count > 0) {
                foreach ($table as $row) {
        ?>

            <tr>
                <td><?php echo $row['Tieude']; ?></td>
                <td><?php echo $row['MaSP']; ?></td>
                <td style="width:50%;text-align:justify;" class="respon-600"><?php echo readmore($row['Noidung'],500); ?></td>
                
                <td>
                    <a href="indexAdmin.php?page=sua_tin_tuc&id=<?php echo $row['MaTin']?>">
                        <button type="button" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        </button>
                    </a>&nbsp;
                    <a href="indexAdmin.php?page=xoa_tin_tuc&id=<?php echo $row['MaTin']?>" onclick='return deleleAction();'>
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
                echo "<h2>Hiện tại chưa tin tức...</h2>";
            }
        ?>
        </tbody>
    </table><!-- list product -->
</div>