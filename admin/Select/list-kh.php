<!-- Small boxes (Stat box) -->
<div class="row row-responsive">
    <div class="col-lg-3 col-6 col-responsive col-respon-1">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <?php
                $table = query_select("SELECT * FROM khachhang");
                $count = $table->rowCount();
                echo '<h3>' . $count . '</h3>';
                ?>
                <p>Khách hàng...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-9 col-12 col-responsive col-respon-2">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Khách hàng</h3>

                <p>Danh sách khách hàng...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>
</div><!-- /.row -->

<!-- delete -->

<!-- list -->
<div class="row">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>Tên KH</th>
                <th class="respon-600">Số CMND</th>
                <th class="respon-400">Năm Sinh</th>
                <th class="respon-375">Điện Thoại</th>
                <th class="respon-800">DKTT</th>
                <th>Chi Tiết</th>
                <th>
                    <button type="button" name="delete_customer" id="delete_customer" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Xóa
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>

            <?php
            $table = query_select("SELECT * FROM khachhang");
            $count = $table->rowCount();
            if ($count > 0) {
                foreach ($table as $row) {

                    $makh = $row['makh'];

                    ?>

                    <tr>
                        <td><?php echo $row['Hoten'] ?></td>
                        <td class="respon-600"><?php echo $row['Socmnd'] ?></td>
                        <td class="respon-400"><?php echo $row['Namsinh'] ?></td>
                        <td class="respon-375"><?php echo $row['dienthoai'] ?></td>
                        <td class="respon-800"><?php echo $row['DKTT'] ?></td>
                        <td>
                            <a id="example" href="?page=detail-kh&&cmndkh=<?php echo $row['Socmnd']; ?>&&makh=<?php echo $row['makh']; ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="far fa-eye"></i> Xem
                                </button>
                            </a>&nbsp;
                        </td>
                        <td>
                            <input type="checkbox" class="delete_checkbox" value="<?php echo $makh; ?>">
                        </td>
                    </tr>

                <?php
                }
            } else {
                echo "<h2>Hiện tại chưa có khách hàng...</h2>";
            }
            ?>
        </tbody>
    </table><!-- list khach hang -->
</div>