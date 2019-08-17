<?php
if(isset($_GET['id'])){
    $ID = $_GET['id'];
    $table=query_select("select * from kmai where MaKm='".$ID."'");
    $count=$table->rowCount();
         if ($count>0)
             {
                foreach ($table as $row) {
                    $tenkmOld = $row['tenkm'];
                    $htkmOld = $row['HTKM'];
                    $TGBDOld = $row['TGBD'];
                    $TGKTOld = $row['TGKT'];
                }
             }
    
   if (isset($_POST["submit"])&& $_POST['randcheck']==$_SESSION['rand']) {
       if ($_POST['tenkm'] != "" && $_POST['HTKM'] != "") {
           try {
               $makm = $ID;
               $tenkm = $_POST['tenkm'];
               $htkm = $_POST['HTKM'];
               $tgbd = $_POST['tgbatdau'];
               $tgkt = $_POST['tgketthuc'];
               update_kmai($htkm,$makm,$tenkm,$tgbd,$tgkt);
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
}
   ?>
      <div class="row">
    <div class="col-12">
        <h4>
            <i class="fas fa-plus-circle"></i> Sửa Khuyến Mãi
            <small class="float-right"><a href="indexAdmin.php?page=list_km"><i class="fas fa-undo-alt"></i> Trở lại</a></small>
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
   <!-- INFO DISCOUNT -->
   <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Tên khuyến mãi<span
         class="text-danger">*</span></label>
      <div class="col-sm-10">
         <div class="form-row">
            <div class="form-group col-md-12">
               <input type="text" class="form-control" name="tenkm" placeholder="sale, new , hot ,..." value="<?php echo $tenkmOld;?>">
            </div>
         </div>
      </div>
   </div>
   <!-- DESCRIPTION -->
   <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Hình thức Khuyến mãi<span
         class="text-danger">*</span></label>
      <div class="col-sm-10">
         <input type="text" class="form-control" placeholder="giảm giá , combo , mua 1 tặng 1..." name="HTKM" value="<?php echo $htkmOld;?>">
      </div>
   </div>
   <!-- TIME START AND END DISCOUNT -->
   <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">TG bắt đầu và kết thúc <span
                class="text-danger">*</span></label>
        <div class="col-sm-10">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="tgbatdau" value="<?php echo $TGBDOld?>">
                </div>
                <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="tgketthuc" value="<?php echo $TGKTOld?>">
                </div>
            </div>
        </div>
    </div>
   <div class="form-group row">
      <label for="inputPassword3" class="col-sm-12 col-form-label text-danger">* thông tin bắt buột</label><i
         class="fas fa-signal-slash"></i></label>
   </div>
   <!-- BUTTON SEND -->
   <div class="form-group row text-center">
      <div class="col-sm-12 col-sm-custom">
         <button type="submit" name="submit" class="btn btn-warning">Sửa khuyến mãi</button>
      </div>
   </div>
</form>
<!-- END FORM -->