<?php
   if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $table=query_select("select * from loaisp where MaLoai='".$ID."'");
         $count=$table->rowCount();
         if ($count>0)
             {
                foreach ($table as $row) {
                    $tenloaiOld = $row['TenLoai'];
                    $motaOld = $row['Mota'];
                }
             }
    }   
    if (isset($_POST["submit"])&& $_POST['randcheck']==$_SESSION['rand']) {
        if ($_POST['tenLoai'] != "") {
            try {
                $maloai = $ID;
                $tenloai = $_POST['tenLoai'];
                $mota = $_POST['motaLoai'];
                update_loai($maloai,$tenloai,$mota);
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
            <i class="fas fa-plus-circle"></i> Sửa Loại
            <small class="float-right"><a href="indexAdmin.php?page=loai_sp"><i class="fas fa-undo-alt"></i> Trở lại</a></small>
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
      <label for="inputEmail3" class="col-sm-2 col-form-label">Thông tin loại<span
         class="text-danger">*</span></label>
      <div class="col-sm-10">
         <div class="form-row">
            <div class="form-group col-md-12">
               <input type="text" class="form-control" placeholder="For men" name="tenLoai" value="<?php echo $tenloaiOld;?>">
               <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["tenLoai"])) {
                                echo "<span class='text-danger'>Tên loại cần phải điền!</span>";
                            }
                        }
                ?>
            </div>
         </div>
      </div>
   </div>
   <!-- DESCRIPTION -->
   <div class="form-group row">
      <label class="col-sm-2 col-form-label">Mô tả</label><i
         class="fas fa-signal-slash"></i></label>
      <div class="col-sm-10">
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="motaLoai">
         <?php echo $motaOld;?>
         </textarea>
      </div>
   </div>
   <div class="form-group row">
      <label for="inputPassword3" class="col-sm-12 col-form-label text-danger">* thông tin bắt buột</label><i
         class="fas fa-signal-slash"></i></label>
   </div>
   <!-- BUTTON SEND -->
   <div class="form-group row text-center">
      <div class="col-sm-12 col-sm-custom">
         <button type="submit" name="submit" class="btn btn-warning">Sửa Loại</button>
      </div>
   </div>
</form>
<!-- END FORM -->