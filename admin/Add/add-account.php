<?php
   if (isset($_POST["submit"]) && $_POST['randcheck']==$_SESSION['rand'])
    {
       if ( $_POST['tenTK'] != "") {
           try {
            $tentk = $_POST['tenTK'];
            $matkhau =  md5("123");
            $quyen = $_POST['role'];
            insert_adminMAIN($tentk, $matkhau, $quyen);
           } catch (Throwable $th) {
               echo $th;
           }
       } else {
           echo '<script type="text/javascript">';
           echo "setTimeout(function () { Swal.fire({
               type: 'error',
               title: 'Nhập đầy đủ các trường !',
               showConfirmButton: true,
           });";
          echo '});</script>';
       }
   }
   ?>
<div class="row">
    <div class="col-12">
        <h4>
            <i class="fas fa-plus-circle"></i> Thêm Tài Khoản Quản Trị
            <small class="float-right"><a href="indexAdmin.php?page=list_account"><i class="fas fa-undo-alt"></i> Trở
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
    <!-- deactive reload -->
    <?php
      $rand=rand();
      $_SESSION['rand']=$rand;
   ?>
    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

    <!-- Name Account -->
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tài khoản <span class="text-danger">*</span></label>
        <div class="col-sm-10">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" placeholder="nhập tài khoản" name="tenTK">
                </div>
            </div>
        </div>
    </div>

    <!-- Role -->
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Quyền</label>
        <div class="col-sm-10">
            <div class="form-row">
                <select id="inputState" class="form-control" name="role">
                    <option value="1">Quyền đầy đủ</option>
                    <option value="2" selected>Quyền hạn chế</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-form-label text-muted"><span class="text-danger">*</span>Lưu ý: Tài khoản quản trị khi tạo thành công sẽ có mật khẩu mặc định là "<span class="text-danger">123</span>" , vui lòng đổi mật khẩu ngay !</label>
    </div>

    <!-- BUTTON SEND -->
    <div class="form-group row text-center">
        <div class="col-sm-12 col-sm-custom">
            <button type="submit" name="submit" class="btn btn-warning">Thêm Tài Khoản</button>
        </div>
    </div>
</form>
<!-- END FORM -->