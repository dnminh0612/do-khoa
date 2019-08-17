<?php
   if (isset($_POST["submittt"])) {
       if ($_POST['name-custom'] != "" && $_POST['code-certificate'] != "" && $_POST['dob'] != "" && $_POST['phone'] != "" && $_POST['email'] != "" && $_POST['City'] != "") {
           try {
         
            $hoten = strtoupper($_POST['name-custom']);
            $namsinh = $_POST['dob'];
            $gioitinh = $_POST['gender'];
            $socmnd = $_POST['code-certificate'];
            $dienthoai = $_POST['phone'];
            $maTP = $_POST['City'];
            $maQuan = $_POST['District'];
            $maPhuong = $_POST['Ward'];
            $DKTT = $_POST['addressMain'];
            $ghichu = "Người bảo trợ: ";
            $ghichu .= $_POST['code-patron'];
            $ghichu .= " - ";
            $ghichu .= $_POST['name-patron'];

            // cmnd before
            $file = $_FILES['img-mt']['tmp_name'];
            $path = "./picture/".$_FILES['img-mt']['name'];
            if(move_uploaded_file($file, $path)){
                insert_video1('','',$socmnd,$path,'','');
            }
            // cmnd after
            $file1 = $_FILES['img-ms']['tmp_name'];
            $path1 = "./picture/".$_FILES['img-ms']['name'];
            if(move_uploaded_file($file1, $path1)){
                insert_video1('','',$socmnd,$path1,'','');
            }

            // CITY
            $query = query_select("select * from devvn_tinhthanhpho where matp='$maTP'");
            $count = $query->rowCount();
            if($count > 0)
            {
                foreach ($query as $row) {
                    $DKTT .= "/";
                    $DKTT .= $row['name'];
                    $DKTT .= "/";
                }
            }
            // DISTRICT
            $query2 = query_select("select * from devvn_quanhuyen where maqh='$maQuan'");
            $count2 = $query2->rowCount();
            if($count2 > 0)
            {
                foreach ($query2 as $row2) {
                    $DKTT .= $row2['name'];
                    $DKTT .= "/";
                }
            }

            // WARD
            $query3 = query_select("select * from devvn_xaphuongthitran where xaid='$maPhuong'");
            $count3 = $query3->rowCount();
            if($count3 > 0)
            {
                foreach ($query3 as $row3) {
                    $DKTT .= $row3['name'];
                }
            }
            insert_khachhang($hoten,$namsinh,$gioitinh,$socmnd,$dienthoai,$DKTT,$ghichu);
            
            
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { 
               Swal.fire({
               type: 'success',
               title: 'Đăng ký khách hàng thành công !',
               showConfirmButton: false,
               timer: 1500
           });";
            echo '}, 500);</script>';
            $DKTT = "";
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
          echo '}, 0);</script>';
       }
    }
?>
<!-- main -->
<main id="main">

    <!-- main 1 -->
    <div class="main-1 m-container">
        <!-- banner advertisement -->
        <div class="bannerAdvertisement">
            <section class="advertisement">
                <div class="ba-qc">
                    <img src="./assets/img/banner-qc.jpg" alt="">
                </div>
                <div class="ba-qc">
                    <img src="./assets/img/banner-qc-2.jpg" alt="">
                </div>
                <div class="ba-qc">
                    <img src="./assets/img/banner-qc-3.jpg" alt="">
                </div>
            </section>
        </div>

        <!-- product -->
        <div class="boxProduct">

            <!-- combo -->
            <section class="product-1 product-combo">

                <div class="pr-container">

                    <div class="row-1 title">
                        <div class="bg-tt-1 bg-tt-1-form">
                            <h2>ĐĂNG KÝ KHÁCH HÀNG</h2>
                        </div>
                    </div>
                    <!-- bỏ display: flex .row2 -->
                    <div class="row-2 row-2-form box-product">
                        <!-- FORM -->


                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- NAME -->
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Họ và Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Viết hoa không dấu"
                                        name="name-custom">
                                </div>
                            </div>

                            <!-- GENDER -->
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="1"
                                                checked>
                                            <label class="form-check-label" for="inlineRadio1">NAM</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="2">
                                            <label class="form-check-label" for="inlineRadio1">NỮ</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- CODE CERTIFICATE-->
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Số CMND</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="0920xxx"
                                        name="code-certificate">
                                </div>
                            </div>

                            <!-- PICTURE UPLOAD -->
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Ảnh CMND</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-6">
                                            <img id="img" class="img-thumbnail" src="./picture/mt-cmnd.jpg" style="width:100%;height:200px;">
                                            <div class="row">
                                                <div class="col-12 d-flex">
                                                    <input name="img-mt"  type='file' id="upload" onchange="readURL(this)" class="form-control col-12" />
                                                    <script>
                                                    function readURL(input) {
                                                        var url = input.value;
                                                        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                                                        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                                                            var reader = new FileReader();

                                                            reader.onload = function (e) {
                                                                $('#img').attr('src', e.target.result);
                                                            }

                                                            reader.readAsDataURL(input.files[0]);
                                                        }else{
                                                            $('#img').attr('src', 'picture/2.jpg');
                                                        }
                                                    }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <img id="img1" class="img-thumbnail" src="./picture/ms-cmnd.jpg" style="width:100%;height:200px;">
                                            <div class="row">
                                                <div class="col-12 d-flex">
                                                    <input name="img-ms"  type='file' id="upload" onchange="readURL1(this)" class="form-control col-12" />
                                                    <script>
                                                    function readURL1(input) {
                                                        var url = input.value;
                                                        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                                                        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                                                            var reader = new FileReader();

                                                            reader.onload = function (e) {
                                                                $('#img1').attr('src', e.target.result);
                                                            }

                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- BIRTHDAY -->
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Ngày sinh<i
                                        class="fas fa-signal-slash"></i></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" placeholder="Viết hoa không dấu" name="dob"
                                        value="<?php echo date("Y-m-d")?>">
                                </div>
                            </div>

                            <!-- PHONE -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Số ĐT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="091xxx" name="phone">
                                </div>
                            </div>

                            <!-- EMAIL -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="abc@gmai.com"
                                        name="email">
                                </div>
                            </div>

                            <!--REGISTER ADDRESS ALWAY -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ TT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="92 Nguyễn Trãi..."
                                        name="addressMain">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">tỉnh thành</label>
                                            <select id="inputCity" class="form-control" name="City">
                                                <?php
                                                        $tableTp = query_select("SELECT * FROM devvn_tinhthanhpho");
                                                        $countTp = $tableTp->rowCount();
                                                        if ($countTp > 0) {
                                                        foreach ($tableTp as $rowTp) {
                                                        ?>
                                                <option value="<?php echo $rowTp['matp'] ?>">
                                                    <?php echo $rowTp['name'];?></option>
                                                <?php
                                                        }
                                                        }
                                                        else
                                                        {
                                                        echo "<option value=''>Chưa có thành phố</option>";
                                                        }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="district">quận huyện</label>
                                            <select class="form-control" id="district" name="District">
                                                <option value="">Chọn tỉnh thành trước</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="ward">phường xã thị trấn</label>
                                            <select class="form-control" id="ward" name="Ward">
                                                <option value="">Chọn quận huyện trước</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- OTHER INFOMATION -->
                            <div class="form-group row">
                                <div class="col-sm-2">Thông tin khác</div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1"
                                            data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                                            aria-controls="collapseExample">
                                        <label class="form-check-label" for="gridCheck1">
                                            Người bảo trợ
                                        </label>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">

                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control"
                                                            placeholder="Mã số người bảo trợ" name="code-patron">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control"
                                                            placeholder="Tên người bảo trợ" name="name-patron">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <p>
                                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                  Link with href
                                                </a>
                                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                  Button with data-target
                                                </button>
                                              </p>
                                              <div class="collapse" id="collapseExample">
                                                <div class="card card-body">
                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                                </div>
                                              </div> -->
                            </div>

                            <!-- BUTTON SEND -->
                            <div class="form-group row ">
                                <div class="col-sm-12 col-sm-custom col-form-sent">
                                    <button type="submit" name="submittt" class="btn btn-warning">ĐĂNG KÝ</button>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM -->
                    </div>

                </div>

            </section>
        </div>
    </div>

</main>