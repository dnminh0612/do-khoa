<!-- FORM -->
<?php
    if (isset($_POST["submit"]) && $_POST['randcheck']==$_SESSION['rand']) {
        if ($_POST['maNhaCC'] != "" && $_POST['tenNhaCC'] != "" && $_POST['thueNhaCC'] != "") {
            // session
    $_SESSION['MaNCC'] = $_POST['maNhaCC'];
    $_SESSION['TenNCC'] = $_POST['tenNhaCC'];
    $_SESSION['DiaChi'] = $_POST['diachiNhaCC'];
    $_SESSION['MaSoThue'] = $_POST['thueNhaCC'];
    $_SESSION['MoTa'] = $_POST['motaNhaCC'];
            try {
                $mancc = $_POST['maNhaCC'];
                $tenncc = $_POST['tenNhaCC'];
                $diachi = $_POST['diachiNhaCC'];
                $masothue = $_POST['thueNhaCC'];
                $mota = $_POST['motaNhaCC'];
                insert_ncc($mancc, $tenncc, $diachi, $masothue, $mota);
            } catch (Throwable $th) {
            }
        } else {
            echo '<script type="text/javascript">';

            echo "setTimeout(function () { Swal.fire({
                type: 'error',
                title: 'Nhập đầy đủ các trường !',
                showConfirmButton: false,
                timer: 1500
            });";

            echo '}, 1000);</script>';
        }
    }
?>
<div class="row">
    <div class="col-12">
        <h4>
            <i class="fas fa-plus-circle"></i> Thêm Nhà phân phối
            <small class="float-right"><a href="indexAdmin.php?page=list_npp"><i class="fas fa-undo-alt"></i> Trở lại</a></small>
        </h4>
    </div>
</div><br>
    <form id="" method="post">
    <?php
      $rand=rand();
      $_SESSION['rand']=$rand;
   ?>
    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
        <!-- INFO DISTRIBUTION -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">TT nhà cung cấp <span
                    class="text-danger">*</span></label>
            <div class="col-sm-10">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Mã nhà cung cấp" name="maNhaCC" value="<?php if (isset($_SESSION['MaNCC'] )) { echo $_SESSION['MaNCC']; }?>">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["maNhaCC"])) {
                                    echo "<span class='text-danger'>Mã nhà cung cấp cần phải điền!</span>";
                                }
                            }
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Tên nhà cung cấp" name="tenNhaCC" value="<?php if (isset($_SESSION['TenNCC'] )) { echo $_SESSION['TenNCC']; }?>">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["tenNhaCC"])) {
                                echo "<span class='text-danger'>Tên nhà cung cấp cần phải điền!</span>";
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- CODE TAX -->
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Mã số thuế <span
                    class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Mã số thuế" name="thueNhaCC" value="<?php if (isset($_SESSION['MaSoThue'] )) { echo $_SESSION['MaSoThue']; }?>">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["thueNhaCC"])) {
                        echo "<span class='text-danger'>Mã số thuế cần phải điền!</span>";
                    }
                }
            ?>
            </div>
        </div>
        <!-- ADDRESS-->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ NCC</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="92 Nguyễn Trãi..." name="diachiNhaCC" value="<?php if (isset($_SESSION['DiaChi'] )) { echo $_SESSION['DiaChi']; }?>">
            </div>
        </div>
        <!-- DESCRIPTION -->
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Mô tả</label><i class="fas fa-signal-slash"></i></label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="motaNhaCC"><?php if (isset($_SESSION['MoTa'] )) { echo $_SESSION['MoTa']; }?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-12 col-form-label text-danger">* thông tin bắt buột</label><i
                class="fas fa-signal-slash"></i></label>
        </div>
        <!-- BUTTON SEND -->
        <div class="form-group row text-center">
            <div class="col-sm-12 col-sm-custom">
                <button type="submit" name="submit" class="btn btn-warning">Thêm nhà cung cấp</button>
            </div>
        </div>
    </form>
    <!-- END FORM -->