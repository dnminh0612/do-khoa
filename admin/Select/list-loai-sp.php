<!-- Small boxes (Stat box) -->
<script type="text/javascript">
	function deleleAction(){
		return confirm("Bạn có muốn xóa loại sản phẩm này?");
	}
</script>
<?php
    if(isset($_SESSION['DeleteCheck']))
    {
        if($_SESSION['DeleteCheck']){
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { Swal.fire({
                type: 'success',
                title: 'Đã xóa loại sản phẩm!',
                showConfirmButton: false,
                timer: 1500
                });";
            echo '}, 1000);</script>';
            $_SESSION['DeleteCheck'] = false;
        }
    }
?>
<div class="row row-responsive">
    <div class="col-lg-3 col-6 col-responsive col-respon-1">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <?php
                $table = query_select("SELECT * FROM loaisp");
                $count = $table->rowCount();
                echo '<h3>'.$count.'</h3>';
            ?>
                <p>Loại sản phẩm...</p>
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
                <h3>Loại sản phẩm</h3>

                <p>Danh sách Loại sản phẩm...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6 col-responsive col-respon-3">
        <!-- small box -->
        <a href="indexAdmin.php?page=them_loai">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Thêm</h3>

                    <p>Thêm loại sp...</p>
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
                <th class="respon-320">Mã Loại</th>
                <th>Tên Loại</th>
                <th class="respon-800">Mô tả</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $table = query_select("SELECT * FROM loaisp");
            $count = $table->rowCount();
            if ($count > 0) {
                foreach ($table as $row) {
        ?>

            <tr>
                <td class="respon-320"><?php echo $row['MaLoai'] ?></td>
                <td><?php echo $row['TenLoai'] ?></td>
                <td class="respon-800">
                <!-- <?php echo $row['Mota'] ?> -->
                <?php
                $str = $row['Mota']; //Tạo chuỗi
                $str = strip_tags($str); //Lược bỏ các tags HTML
                if(strlen($str)>100) { //Đếm kí tự chuỗi $str, 100 ở đây là chiều dài bạn cần quy định
                $strCut = substr($str, 0, 100); //Cắt 100 kí tự đầu
                $str = substr($strCut, 0, strrpos($strCut, ' ')).'...'; //Tránh trường hợp cắt dang dở như "nội d... Read More"
                }
                echo $str;
                ?>
                </td>
                <td>
                <a href="?page=sua_loai&id=<?php echo $row['MaLoai']?>">
                        <button type="button" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        </button>
                </a>&nbsp;
                <a href="?page=xoa_loai&id=<?php echo $row['MaLoai']?>" onclick='return deleleAction();'>
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
                echo "<h2>Hiện tại chưa có sản phẩm...</h2>";
            }
        ?>
        </tbody>
    </table><!-- list product -->
</div>

<!-- modal detail -->
<?php include('list-product-detail.php'); ?>