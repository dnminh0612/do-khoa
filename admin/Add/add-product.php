<?php
    if (isset($_POST["submit"]) && $_POST['randcheck']==$_SESSION['rand'])
    {
        // session
        $_SESSION['Masp'] = $_POST['txtMasp'];
        $_SESSION['Maloai'] = $_POST['slMaloai'];
        $_SESSION['Mancc'] = $_POST['slMaNCC'];
        $_SESSION['dungtich'] = $_POST['txtDungtich'];
        $_SESSION['ngaynhap'] = $_POST['dateNgaynhap'];
        $_SESSION['ngaysanxuat'] = $_POST['dateNgaysanxuat'];
        $_SESSION['hansudung'] = $_POST['txtHansudung'];
        $_SESSION['tensanpham'] = $_POST['txtTensanpham'];
        $_SESSION['gia'] = $_POST['txtGia'];
        $_SESSION['trangthai'] = $_POST['slTrangthai'];
        $_SESSION['mota'] = $_POST['textMota'];
        $_SESSION['soluong'] = $_POST['txtSoluong'];

        // xet error
        if($_POST['txtMasp'] !="" && $_POST['slMaloai'] !=""  && $_POST['slMaNCC'] !="" && $_POST['txtDungtich'] !=""  
            && $_POST['dateNgaynhap'] !="" && $_POST['dateNgaysanxuat'] !="" && $_POST['txtHansudung'] !="" && $_POST['txtTensanpham'] !=""
            && $_POST['txtGia'] !="" && $_POST['txtSoluong'] !="" )
        {
            try{
                $masp = $_POST['txtMasp']; 
                $maloai = $_POST['slMaloai'];
                $mancc = $_POST['slMaNCC'];
                $dungtich = $_POST['txtDungtich'];
                $ngaynhaphang = $_POST['dateNgaynhap'];
                $ngaysanxuat = $_POST['dateNgaysanxuat'];
                $hansudung = $_POST['txtHansudung'];
                $tensp = $_POST['txtTensanpham'];
                $gia = $_POST['txtGia'];
                $trangthai = $_POST['slTrangthai'];
                $motaSP = $_POST['textMota'];
                $soluong = $_POST['txtSoluong'];
                insert_sp($masp, $maloai, $tensp, $gia, $soluong, $mancc, $ngaysanxuat, $hansudung, $dungtich, $motaSP, $ngaynhaphang, $trangthai);

                // xóa sản session
                $_SESSION['Masp'] = '';
                $_SESSION['Maloai'] = '';
                $_SESSION['Mancc'] = '';
                $_SESSION['dungtich'] = '';
                $_SESSION['ngaynhap'] = '';
                $_SESSION['ngaysanxuat'] = '';
                $_SESSION['hansudung'] = '';
                $_SESSION['tensanpham'] = '';
                $_SESSION['gia'] = '';
                $_SESSION['trangthai'] = '';
                $_SESSION['mota'] = '';
                $_SESSION['soluong'] = '';
            }
            catch(Throwable $th){}
        }
        else
        {
            echo
            "
                <script type='text/javascript'>
                    setTimeout(function () { 
                        Swal.fire({
                            type: 'error',
                            title: 'Vui lòng điền đầy đủ các trường!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }, 100);
                </script>
            ";
        }
    }
?>

<div class="row">
    <div class="col-12">
        <h4>
            <i class="fas fa-plus-circle"></i> Thêm sản phẩm
            <small class="float-right"><a href="indexAdmin.php"><i class="fas fa-undo-alt"></i> Trở lại</a></small>
        </h4>
    </div>
</div><br>

<!-- FORM -->
<form action="" method="POST">
<?php
      $rand=rand();
      $_SESSION['rand']=$rand;
   ?>
    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
    <!-- INFO PRODUCT -->
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Mã sản phẩm <span style="color:red;">(*)</span>:</label>
        <div class="col-sm-10">

            <!-- mã sản phẩm -->
            <input 
                type="text" 
                class="form-control" 
                placeholder="35463"
                value="<?php if (isset($_SESSION['Masp'] )) { echo $_SESSION['Masp']; }?>"
                style="margin-bottom:10px;"
                name="txtMasp"
                id="myInput"
            >
            <div class="showErr" style="height:24px;width:100%;">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["txtMasp"])) {
                            echo "<span class='badge badge-danger'>Nhập mã sản phẩm!</span>";
                        }
                    }
                ?>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Mã loại <span style="color:red;">(*)</span>:</label>
                    <select 
                        id="inputState" 
                        class="form-control"
                        name="slMaloai"
                    >
                        <option value="">Chọn mã loại</option>
                        <!-- hiển thị mã loại -->
                        <?php 
                            $table = query_select("SELECT * FROM loaisp");
                            $count = $table->rowCount();
                            if ($count > 0) {
                                foreach ($table as $row) {
                        ?>
                        <option value="<?php echo $row['MaLoai']; ?>"><?php echo $row['TenLoai'] ?></option>
                        <?php
                                }
                            }
                        ?>         
                    </select>

                    <div class="showErr" style="height:24px;width:100%;">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["slMaloai"])) {
                                    echo "<span class='badge badge-danger'>chọn loại sản phẩm!</span>";
                                }
                            }
                        ?>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputState">Mã nhà cung cấp <span style="color:red;">(*)</span>:</label>
                    <select 
                        id="inputState" 
                        class="form-control"
                        name="slMaNCC"
                    >
                        <option value="">Chọn nhà cung cấp</option>
                        <!-- hiển thị nhà cung cấp -->
                        <?php 
                            $table = query_select("SELECT * FROM nhacungcap");
                            $count = $table->rowCount();
                            if ($count > 0) {
                                foreach ($table as $row) {
                        ?>
                        <option value="<?php echo $row['MaNCC'] ?>"><?php echo $row['TenNCC'] ?></option>
                        <?php
                                }
                            }
                        ?> 
                    </select>

                    <div class="showErr" style="height:24px;width:100%;">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["slMaNCC"])) {
                                    echo "<span class='badge badge-danger'>Chọn nhà cung cấp!</span>";
                                }
                            }
                        ?>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputState">Dung tích(ml) <span style="color:red;">(*)</span>:</label>
                    <input 
                        type="number" 
                        class="form-control" 
                        placeholder="500"
                        value="<?php if (isset($_SESSION['dungtich'] )) { echo $_SESSION['dungtich']; }?>"
                        name="txtDungtich"
                    >

                    <div class="showErr" style="height:24px;width:100%;">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["txtDungtich"])) {
                                    echo "<span class='badge badge-danger'>Nhập dung tích sản phẩm!</span>";
                                }
                            }
                        ?>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Ngày nhập <span style="color:red;">(*)</span>:</label>
                    <input 
                        type="date" 
                        class="form-control"
                        value="<?php if (isset($_SESSION['ngaynhap'] )) { echo $_SESSION['ngaynhap']; }?>"
                        name="dateNgaynhap"
                    >
                    <div class="showErr" style="height:24px;width:100%;">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["dateNgaynhap"])) {
                                    echo "<span class='badge badge-danger'>Nhập ngày nhập!</span>";
                                }
                            }
                        ?>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputState">Ngày sản xuất <span style="color:red;">(*)</span>:</label>
                    <input 
                        type="date" 
                        class="form-control"
                        name="dateNgaysanxuat"
                        value="<?php if (isset($_SESSION['ngaysanxuat'] )) { echo $_SESSION['ngaysanxuat']; }?>"
                    >
                    <div class="showErr" style="height:24px;width:100%;">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["dateNgaysanxuat"])) {
                                    echo "<span class='badge badge-danger'>Nhập ngày sản xuất!</span>";
                                }
                            }
                        ?>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputState">Hạn sử dụng(năm/tháng) <span style="color:red;">(*)</span>:</label>
                    <input 
                        type="number" 
                        class="form-control" 
                        minlength="1"
                        value="<?php if (isset($_SESSION['hansudung'] )) { echo $_SESSION['hansudung']; }?>"
                        name="txtHansudung"
                    >
                    <div class="showErr" style="height:24px;width:100%;">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["txtHansudung"])) {
                                    echo "<span class='badge badge-danger'>Nhập hạn sử dụng!</span>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NAME PRODUCT-->
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Tên sản phẩm <span style="color:red;">(*)</span>:</label>
        <div class="col-sm-10">
            <input 
                type="text" 
                class="form-control" 
                placeholder="Possess The Secret..."
                name="txtTensanpham"
                value="<?php if (isset($_SESSION['tensanpham'] )) { echo $_SESSION['tensanpham']; }?>"
            >
            <div class="showErr" style="height:24px;width:100%;">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["txtTensanpham"])) {
                            echo "<span class='badge badge-danger'>Nhập tên sản phẩm!</span>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- PRICE -->
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Giá sản phẩm <span style="color:red;">(*)</span>:</label>
        <div class="col-sm-10">
            <input 
                type="number" 
                class="form-control" 
                placeholder="99000"
                name="txtGia"
                value="<?php if (isset($_SESSION['gia'] )) { echo $_SESSION['gia']; }?>"
            >
            <div class="showErr" style="height:24px;width:100%;">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["txtGia"])) {
                            echo "<span class='badge badge-danger'>Nhập giá sản phẩm!</span>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- QUATITY -->
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Số lượng <span style="color:red;">(*)</span>: <i class="fas fa-signal-slash"></i></label>
        <div class="col-sm-10">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input 
                        type="number" 
                        class="form-control" 
                        placeholder="Số lượng sản phẩm"
                        name="txtSoluong"
                        value="<?php if (isset($_SESSION['soluong'] )) { echo $_SESSION['soluong']; }?>"
                    >
                    <div class="showErr" style="height:24px;width:100%;">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["txtSoluong"])) {
                                    echo "<span class='badge badge-danger'>Nhập số lượng sản phẩm!</span>";
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <select 
                        id="inputState" 
                        class="form-control"
                        name="slTrangthai"
                        value=""
                    >
                        <option value="">Chọn trạng thái</option>
                        <option value="stocking">Có hàng</option>
                        <option value="hot">Hot</option>
                        <option value="new">New</option>
                        <option value="sale">Sale</option>
                        <option value="selling">Selling</option>
                    </select>
                    <div class="showErr" style="height:24px;width:100%;">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["slTrangthai"])) {
                                    echo "<span class='badge badge-danger'>Chọn trạng thái!</span>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- description -->
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Mô tả sản phẩm:</label><i
            class="fas fa-signal-slash"></i></label>
        <div class="col-sm-10">
            <textarea 
                class="form-control" 
                id="exampleFormControlTextarea1" 
                rows="3"
                name="textMota"
            ></textarea>
        </div>
    </div>

    <!-- BUTTON SEND -->
    <div class="form-group row">
        <div class="col-sm-12 col-sm-custom" style="display: flex;justify-content: center;">
            <button 
                name="submit" 
                type="submit" 
                class="btn btn-warning pull-right"
            >Thêm sản phẩm</button>
        </div>
    </div> <br>

</form><!-- /FORM -->
    

