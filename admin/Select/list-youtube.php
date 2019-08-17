<!-- Small boxes (Stat box) -->
<div class="row row-responsive">
    <div class="col-lg-3 col-6 col-responsive col-respon-1">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <?php
                $table = query_select("SELECT MaMulti,URLVideo FROM video WHERE URLVideo <> ''");
                $count = $table->rowCount();
                echo '<h3>' . $count . '</h3>';
                ?>
                <p>Link Youtube...</p>
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
                <h3>Link Youtube</h3>

                <p>Danh sách link...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>
</div><!-- /.row -->

<!-- add link youtube -->
<div class="row">
    
<?php
if (isset($_POST['submit_link']) ) {
    if ($_POST['linkYoutube'] != "") {
        try {
            $link = $_POST['linkYoutube'];
            insert_video2('','','','',$link,'');
        } catch (Throwable $th) {
            echo $th;
        }
    } else {
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire({
               type: 'error',
               title: 'Nhập vào link youtube !',
               showConfirmButton: false,
               timer: 1500
           });";
        echo '}, 0);</script>';
    }
}
?>

    <div class="col-12">
        <!-- FORM -->
        <form id="" method="post">
            <!-- LINK -->
            <div class="form-group row">
                <label for="linkYoutube" class="col-sm-2 col-form-label">Link Youtube<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="linkYoutube" placeholder="https://youtube.com/abc" id="linkYoutube">
            </div>
            <!-- BUTTON SEND -->
            <div class="form-group row text-center">
                <div class="col-sm-12 col-sm-custom">
                    <button type="submit" name="submit_link" class="btn btn-primary btn-block">Thêm Link</button>
                </div>
            </div>
        </form>
        <!-- END FORM -->
    </div>
</div>

<!-- list -->
<div class="row">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="respon-600">STT</th>
                <th>Mã LINK</th>
                <th class="respon-320">LINK</th>
                <th>
                    <button type="button" name="delete_youtube" id="delete_youtube" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Xóa
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>

            <?php
            // $count = $table->rowCount();
            if ($count > 0) {
                $stt = 0;
                foreach ($table as $row) {
                    $stt++;
                    $malink = $row['MaMulti'];
                    ?>

                    <tr>
                        <td class="respon-600"><?php echo $stt; ?></td>
                        <td><?php echo $row['MaMulti'] ?></td>
                        <td class="respon-320"><?php echo $row['URLVideo'] ?></td>
                        <td>
                            <input type="checkbox" class="delete_checkbox" value="<?php echo $malink; ?>">
                        </td>
                    </tr>

                <?php
                }
            } else {
                echo "<h2>Hiện tại chưa có Link...</h2>";
            }
            ?>
        </tbody>
    </table><!-- list product -->
</div>