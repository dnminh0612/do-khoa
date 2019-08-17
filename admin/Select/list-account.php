<script type="text/javascript">
function deleleAction() {
    return confirm("Bạn có muốn xóa tài khoản này?");
}
</script>
<?php
    if(isset($_SESSION['DeleteCheck']))
    {
        if($_SESSION['DeleteCheck']){
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { Swal.fire({
                type: 'success',
                title: 'Đã xóa tài khoản!',
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
                $table = query_select("SELECT * FROM qttk");
                $count = $table->rowCount();
                echo '<h3>'.$count.'</h3>';
            ?>

                <p>Tài khoản...</p>
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
                <h3>Tài khoản</h3>

                <p>Danh sách tài khoản...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6 col-responsive col-respon-3">
        <!-- small box -->
        <a href="indexAdmin.php?page=them_account">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Thêm</h3>

                    <p>Thêm tài khoản quản trị...</p>
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

<div class="list-group">
    <div class="list-group-item list-group-item-action active text-center">
        Quản trị viên
    </div>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="respon-800">STT</th>

                <th>Tên tài khoản</th>
                <th class="respon-400">Quyền</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $table = query_select("SELECT * FROM qttk");
            $count = $table->rowCount();
            $stt = 1;
            if ($count > 0) {
                foreach ($table as $row) {
                    if($row["Quyen"] == 1 || $row["Quyen"] == 2){
        ?>

            <tr>
                <td class="respon-800"><?php echo $stt++; ?></td>
                <td>
                    <?php
                 echo $row["TenTK"];
                ?>
                </td>
                <td>
                    <?php
                    if($row['Quyen'] == 1){
                        echo "Quyền đầy đủ";
                    }else if($row['Quyen'] == 2){
                        echo "Quyền hạn chế";
                    }
                    ?>
            </td>
                <td>
                <?php
                if($row['Quyen'] != 1){
                ?>
                    <a href="?page=xoa_account&id=<?php echo $row['TenTK'];?>"
                        onclick='return deleleAction();'>
                        <button type="button" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </a>
                    <?php
                    }else{
                        echo "Không thể xóa !";
                    }

                ?>
                </td>
            </tr>

            <?php
            }
                }
            }
            else
            {
                echo "<h2>Hiện tại chưa có tài khoản nào !...</h2>";
            }
        ?>
        </tbody>
    </table>
</div>

<div class="list-group">
    <div class="list-group-item list-group-item-action active text-center">
        Người dùng
    </div>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="respon-800">STT</th>
                <th>Tên tài khoản</th>
                <th>Quyền</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $table = query_select("SELECT * FROM qttk");
            $count = $table->rowCount();
            $stt = 1;
            if ($count > 0) {
                foreach ($table as $row) {
                    if($row["Quyen"] == 3){
        ?>

            <tr>
                <td class="respon-800"><?php echo $stt++; ?></td>
                <td>
                <?php echo $row["TenTK"]; ?>
                </td>
                <td>
                <?php echo "Thành viên"; ?>
                </td>
                <td>
                    <a href="?page=xoa_account&id=<?php echo $row['TenTK'];?>"
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
            else
            {
                echo "<h2>Hiện tại chưa có tài khoản nào !...</h2>";
            }
        ?>
        </tbody>
    </table>
</div>

<!-- list -->