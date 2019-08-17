<!-- Small boxes (Stat box) -->
<div class="row row-responsive">
    <div class="col-lg-3 col-6 col-responsive col-respon-1">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <?php
                $table = query_select("SELECT * FROM sp");
                $count = $table->rowCount();
                echo '<h3>'.$count.'</h3>';
            ?>
                <p>Sản phẩm...</p>
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
                <h3>Sản Phẩm</h3>

                <p>Danh sách sản phẩm...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6 col-responsive col-respon-3">
        <!-- small box -->
        <a href="indexAdmin.php?page=them_san_pham">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Thêm</h3>

                    <p>Thêm sản phẩm mới...</p>
                </div>
                <div class="icon">
                    <i class="ion ion-plus"></i>
                </div>
            </div>
        </a>
    </div>
    <!-- ./col -->
</div><!-- /.row -->

<!-- delete -->

<!-- list -->
<div class="row">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>Mã Sản Phẩm</th>
                <th class="respon-320">Tên Sản Phẩm</th>
                <th class="respon-400">Giá</th>
                <th class="respon-400">Số Lượng</th>
                <th class="respon-800">Trạng Thái</th>
                <th class="respon-800">Hình ảnh</th>
                <th>Chi Tiết</th>
                <th>
                    <button type="button" name="delete_all" id="delete_all" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Xóa
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>

        <?php
            $table = query_select("SELECT * FROM sp");
            $count = $table->rowCount();
            if ($count > 0) {
                foreach ($table as $row) {
                    $masp = $row['MaSP'];
        ?>

            <tr>
                <td><?php echo $row['MaSP'] ?></td>
                <td class="respon-320"><?php echo $row['Tensp'] ?></td>
                <td class="respon-400"><?php echo $row['Gia'] ?></td>
                <td class="respon-400"><?php echo $row['Soluong'] ?></td>
                <td class="respon-800"><?php echo $row['trangthai'] ?></td>
                <td style="width:20%;" class="respon-800">
                    <div class="row">
                        <?php 
                            $table = query_select("SELECT * FROM video WHERE video.MaSP = '$masp' LIMIT 4 ");
                            $count = $table->rowCount();
                            if($count > 0)
                            {
                                foreach ($table as $row) {
                        ?>
                        <div class="col-md-3" style="margin-bottom:5px;">
                            <img class="img-thumbnail" src="./../<?php echo $row['URLHinh'] ?>" alt="">
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </td>
                <td>
                    <a id="example" href="?page=detail-product&&masp=<?php echo $row['MaSP']; ?>">
                        <button type="button" class="btn btn-info">
                            <i class="far fa-eye"></i> Xem
                        </button>
                    </a>&nbsp;
                </td>
                <td>
                    <input type="checkbox" class="delete_checkbox" value="<?php echo $masp; ?>">
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