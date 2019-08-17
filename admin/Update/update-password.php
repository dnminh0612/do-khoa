<?php
  if (isset($_POST["submit"]) && $_POST['randcheck_up_pass'] == $_SESSION['rand'] ) {
      if ($_POST['old-password'] != "" && $_POST['new-password'] != "" && $_POST['reType-password'] != "" && $_POST['reType-password'] == $_POST['new-password']) {
          try 
          {
              $tentk = $_SESSION['userSession'];
              $matkhau = md5($_POST['old-password']);
              $matkhaumoi = md5($_POST['reType-password']);
              update_password($tentk, $matkhau, $matkhaumoi);
              
          } 
          catch (Throwable $th) {}
      } 
      else 
      {
          echo '<script type="text/javascript">';

          echo "setTimeout(function () { Swal.fire({
              type: 'error',
              title: 'Nhập đầy đủ các trường !',
              showConfirmButton: false,
              timer: 1500
          });";

          echo '});</script>';
      }
  }
?>
<div class="card mx-auto text-center">
    <div class="card-header">
        <?php echo $_SESSION['userSession']; ?>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <!-- deactive reload -->
            <?php $rand_up_pass = rand(); $_SESSION['rand']= $rand_up_pass;?>
            <input type="hidden" value="<?php echo $rand_up_pass; ?>" name="randcheck_up_pass" />

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mật khẩu cũ</label>
                <div class="col-sm-10">
                    <input type="password" name="old-password" class="form-control" placeholder="Nhập mật khẩu cũ">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mật khẩu mới</label>
                <div class="col-sm-10">
                    <input type="password" name="new-password" class="form-control" placeholder="Nhập mật khẩu mới">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nhập lại mật khẩu mới</label>
                <div class="col-sm-10">
                    <input type="password" name="reType-password" class="form-control"
                        placeholder="Nhập lại mật khẩu mới">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" name="submit" class="btn btn-primary">Đổi mật khẩu</button>
                </div>
            </div>
        </form>
    </div>
</div>