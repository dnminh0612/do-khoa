<?php
if(isset($_GET['id'])){
 $ID = $_GET['id'];
 $table=query_select("select * from tintuc where matin='".$ID."'");
 $count=$table->rowCount();
 if ($count>0)
 {
   foreach ($table as $row) {
    $name = $row['Tieude'];
    $content = $row['Noidung'];
  }
}
}
if (isset($_POST["submit"])&& $_POST['randcheck']==$_SESSION['rand']) {
 if ($_POST['EdittenTin'] != ""&& $_POST['EditnoidungTin'] != "" && $_POST['slMaSP'] ) {
   try {
    $tieude = $_POST['EdittenTin'];
    $noidung = $_POST['EditnoidungTin'];
    $masp = $_POST['slMaSP'];
    update_tintuc($ID, $masp,$noidung,$tieude);
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
            <i class="fas fa-plus-circle"></i> Sửa Tin Tức
            <small class="float-right"><a href="indexAdmin.php?page=list_tin_tuc"><i class="fas fa-undo-alt"></i> Trở
                    lại</a></small>
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
 <!-- TIME START AND END DISCOUNT -->
 <div class="form-group row">
  <label for="inputEmail3" class="col-sm-2 col-form-label">Tin tức<span
   class="text-danger">*</span></label>
   <div class="col-sm-10">
     <div class="form-row">
            <!-- <div class="form-group col-md-6">
               <input type="text" class="form-control" placeholder="Mã tin tức" name="maTin" >
             </div> -->
             <div class="form-group col-md-12">
               <input type="text" class="form-control" placeholder="Tên tin tức" name="EdittenTin" value="<?php echo $name?>">
               <?php
               if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["EdittenTin"])) {
                  echo "<span class='text-danger'>Tên tin cần phải điền!</span>";
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>

      <!-- TIME START AND END DISCOUNT -->
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Mã sản phẩm <span class="text-danger">*</span></label>
        <div class="col-sm-10">
         <div class="form-row">
          <select 
          id="inputState" 
          class="form-control"
          name="slMaSP"
          >
          <option value="<?php echo $row['MaSP']; ?>"><?php echo $row['MaSP']; ?></option>
          <?php 
          $table = query_select("SELECT * FROM sp");
          $count = $table->rowCount();
          if ($count > 0) {
           foreach ($table as $row) {
             ?>
             <option value="<?php echo $row['MaSP'] ?>"><?php echo $row['MaSP']; ?> - <?php echo $row['Tensp']; ?></option>
             <?php
           }
         }
         ?>
       </select>
     </div>
   </div>
 </div>

 <!-- DESCRIPTION -->
 <div class="form-group row">
  <label class="col-sm-2 col-form-label">Mô tả <span class="text-danger">*</span></label><i
  class="fas fa-signal-slash"></i></label>
  <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="EditnoidungTin"><?php echo $content?></textarea>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["EditnoidungTin"])) {
        echo "<span class='text-danger'>Nội dung tin cần phải điền!</span>";
      }
    }
    ?>
  </div>
</div>

<!-- BUTTON SEND -->
<div class="form-group row text-center">
  <div class="col-sm-12 col-sm-custom">
   <button type="submit" name="submit" class="btn btn-warning">Sửa tin tức</button>
 </div>
</div>
</form>
<!-- END FORM -->