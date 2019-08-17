<?php
   if (isset($_POST["submit"])  && $_POST['randcheck']==$_SESSION['rand']) {
       if ($_POST['maKM'] != "" && $_POST['motaCTKM'] != "") {
           try {
               if($_POST['check_product']){
                    foreach($_POST['check_product'] as $selected){
                        $makm = $_POST['maKM'];
                        $masp = $selected ;
                        $tilegiamgia = $_POST['htkm'];
                        $ghichu = $_POST['motaCTKM'];
                        $member = 0 ;
                        insert_ctkm($makm,$masp,$member,$tilegiamgia,$ghichu);
                    }
                }                        
                else{
                        echo '<script type="text/javascript">';
   
                        echo "setTimeout(function () { Swal.fire({
                            type: 'error',
                            title: 'Chọn sản phẩm khuyến mãi !',
                            showConfirmButton: false,
                            timer: 1500
                             });";
                
                        echo '}, 1000);</script>';
                }
           } catch (Throwable $th) {
               echo $th;
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
            <i class="fas fa-plus-circle"></i> Thêm Chương Trình Khuyến Mãi
            <small class="float-right"><a href="indexAdmin.php?page=list_ct_km"><i class="fas fa-undo-alt"></i> Trở lại</a></small>
        </h4>
    </div>
</div><br>
<!-- FORM -->
<form id="" method="post">
<?php
      $rand=rand();
      $_SESSION['rand']=$rand;
   ?>
    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
    <!-- CODE DISCOUNT -->
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Mã Khuyến mãi<span
                class="text-danger">*</span></label>
        <div class="col-sm-10">
            <!-- <input type="text" class="form-control" placeholder="KM00xxx" name="maKM"> -->
            <select class="form-control" name="maKM" id="kmFilter">
			<option select value="">Chọn chương trình khuyến mãi</option>
                <?php
                     $tablekm = query_select("SELECT * FROM kmai");
                     $countkm = $tablekm->rowCount();
                     if ($countkm > 0) {
                     foreach ($tablekm as $rowkm) {
                     ?>
                <option value="<?php echo $rowkm['MaKm'] ?>"><?php echo $rowkm['tenkm'];?></option>
                <?php
                     }
                     }
                     else
                     {
                     echo "<h2>Hiện tại chưa có KM...</h2>";
                     }
                     ?>
            </select>
        </div>
    </div>
    <!-- TIME START AND END DISCOUNT -->
    <!-- <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">TG bắt đầu và kết thúc <span
                class="text-danger">*</span></label>
        <div class="col-sm-10">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="tgbatdau" value="<?php echo date("Y-m-d")?>">
                </div>
                <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="tgketthuc" value="<?php echo date("Y-m-d")?>">
                </div>
            </div>
        </div>
    </div> -->
    <!--INFO DISCOUNT-->
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">thông tin CT</span></label>
        <div class="col-sm-10">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputState">Sale (%)</label>
                    <input type="number" class="form-control" placeholder="50" name="htkm">
                </div>
            </div>
        </div>
    </div>
    <!-- /DISCOUNT -->
    <!-- DESCRIPTION -->
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Mô tả <span class="text-danger">*</span></label><i
            class="fas fa-signal-slash"></i></label>
        <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="motaCTKM"></textarea>
            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["motaCTKM"])) {
                                    echo "<span class='text-danger'>Mô tả chương trình KM cần phải điền!</span>";
                                }
                            }
         ?>
        </div>
    </div>
    <!-- PRODUCT -->
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Sản phẩm khuyến mãi <span
                class="text-danger">*</span></label><i class="fas fa-signal-slash"></i></label>
        <div class="col-sm-10">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Chọn</th>
                        <th>Mã Sản Phẩm</th>
                        <th class="respon-800">Loại</th>
                        <th>Tên Sản Phẩm</th>
                        <th class="respon-375">Giá</th>
                        <th class="respon-600">Số Lượng</th>
                        <th class="respon-800">Trạng Thái</th>
                    </tr>
                </thead>
                <tbody id="productTable">

           
                </tbody>
            </table><!-- list product -->
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-12 col-form-label text-danger">* thông tin bắt buột</label><i
            class="fas fa-signal-slash"></i></label>
    </div>
    <!-- BUTTON SEND -->
    <div class="form-group row text-center">
        <div class="col-sm-12 col-sm-custom">
            <button type="submit" name="submit" class="btn btn-warning">Thêm chương trình khuyến mãi</button>
        </div>
    </div>
</form>
<!-- END FORM -->