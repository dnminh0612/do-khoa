<?php 
    $masp = $_GET['masp'];
    include("./../connect.php");

    if(isset($_GET['masp']) )
    {
        echo "
        <script type='text/javascript'>
            setTimeout(function () { 
                Swal.fire({
                  position: 'center',
                  type: 'success',
                  title: `
                    Thêm thành công
                    Chọn ảnh cho sản phẩm
                  `,
                  showConfirmButton: true
                })
            });
        </script>";
    }
?>

<div class="row">
    <div class="col-12">
        <h4>
            <i class="fas fa-images"></i> Thêm ảnh sản phẩm
        </h4>
    </div>
</div><br>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="padding-bottom: 25px;">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div style="height:24px;width:100%;">
                        <?php
                            if(isset($_POST['submit'])  && $_POST['randcheck_add_img']==$_SESSION['rand_add_img'] ){
                                
                                // File upload configuration
                                $targetDir = "./../picture/";
                                $allowTypes = array(
                                    'Jpg','JPj','JPG','jpg',
                                    'Png','PNg','PNG','png',
                                    'Jpeg','JPeg','JPEg','JPEG','jpeg',
                                    'Git','GIt','GIT','gif'
                                );
                                
                                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
                                if(!empty(array_filter($_FILES['files']['name']))){
                                    foreach($_FILES['files']['name'] as $key=>$val){
                                        // File upload path
                                        $fileName = basename($_FILES['files']['name'][$key]);
                                        $targetFilePath = $targetDir . $fileName;
                                        
                                        // Check whether file type is valid
                                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                                        if(in_array($fileType, $allowTypes)){
                                            // Upload file to server
                                            if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                                                // Image db insert sql
                                                $insertValuesSQL .= "('','','./picture/".$fileName."','".$masp."','','', NOW()),";
                                            }else{
                                                $errorUpload .= $_FILES['files']['name'][$key].', ';
                                            }
                                        }else{
                                            $errorUploadType .= $_FILES['files']['name'][$key].', ';
                                        }
                                    }
                                    
                                    if(!empty($insertValuesSQL)){
                                        $insertValuesSQL = trim($insertValuesSQL,',');
                                        // Insert image file name into database
                                        $insert = $conn->query("INSERT INTO video (MaMulti,URLVideo,URLHinh,MaSP,MaTin,CMND_KH,update_on) VALUES  $insertValuesSQL");
                                        if($insert){
                                            $errorUpload = !empty($errorUpload)?'Lỗi tải lên: '.$errorUpload:'';
                                            $errorUploadType = !empty($errorUploadType)?'Lỗi loại tệp: '.$errorUploadType:'';
                                            $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                                            $statusMsg = "
                                                <script type='text/javascript'>
                                                    setTimeout(function () { 
                                                        Swal.fire({
                                                            type: 'success',
                                                            title: 'Thêm ảnh thành công !',
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        });
                                                    });
                                                </script>
                                            ".$errorMsg;
                                        }
                                        else
                                        {
                                            $statusMsg = "Sorry, there was an error uploading your file.";
                                        }
                                    }
                                }else{
                                    $statusMsg = "
                                        <script type='text/javascript'>
                                            setTimeout(function () { 
                                                Swal.fire({
                                                  type: 'error',
                                                  title: 'Oops...',
                                                  text: 'Vui lòng chọn một tập tin để tải lên!'
                                                })
                                            });
                                        </script>
                                    ";
                                }
                                
                                // Display status message
                                echo $statusMsg;
                            }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <!-- deactive reload -->
                                <?php $rand=rand(); $_SESSION['rand_add_img']=$rand; ?>
                                <input type="hidden" value="<?php echo $rand; ?>" name="randcheck_add_img" />

                                <input type="file" name="files[]" multiple >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button 
                                name="submit" 
                                type="submit" 
                                class="btn btn-info"
                            >Upload</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <?php 
                    $table = query_select("SELECT * FROM sp, video WHERE sp.MaSP = video.MaSP AND sp.MaSP = '$masp'");
                    $count = $table->rowCount();
                    if($count > 0)
                    {
                        foreach ($table as $row) {
                ?>
                <div class="col-md-2" style="margin-bottom:15px;">
                    <img class="img-thumbnail" src="./../<?php echo $row['URLHinh'] ?>" style="height:190px;">
                </div>
                <?php
                        }
                    ?>
                <div class="col-md-2 row" style="margin-bottom:15px;font-size:20px;display: flex;align-items:center;">
                    <div class="col-md-6">
                        <a href="?page=them_san_pham"><button class="btn btn-primary" >Thêm tiếp</button></a>
                    </div>
                    <div class="col-md-6">
                        <a href="indexAdmin.php"><button class="btn btn-secondary">Trở lại</button></a>
                    </div>
                </div> 
                    <?php
                    }

                    else
                    {
                        echo "<div class='container'><h5 class='text-center text-warning'>Sản phẩm chưa có ảnh. Vui lòng tải ảnh cho sản phẩm !</h5></div>";
                    }

                ?>
                
            </div>  
        </div>
        <!-- /.card -->
    </div>
</div>