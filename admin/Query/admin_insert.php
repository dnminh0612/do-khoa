
<?php
function insert_loaisp($maloai, $tenloai,$mota)
{
    try {
        include '../connect.php';
        // include '.\..\..\select.php';
        $table=query_select("select * from loaisp where maloai='".$maloai."'");
        $count=$table->rowCount();
        if ($count>0)
            {
                echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'error',
                    title: 'Loại đã tồn tại !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
                echo '}, 500);</script>';
            }
        else {
            $sql = "Insert into loaisp(maloai, tenloai,mota) values ('$maloai','$tenloai','$mota') ";
            $conn->exec($sql);
            $conn=null;
            echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'success',
                    title: 'Thêm loại thành công !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
                echo '}, 500);</script>';
        }
       
        
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}
function insert_adminMAIN($tentk, $matkhau, $quyen)
{
    try {
        include '../connect.php';
        $table=query_select("select * from qttk where tentk='".$tentk."'");
        $count=$table->rowCount();
        if ($count>0)
            {
                echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'error',
                    title: 'Tài khoản đã tồn tại !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
                echo '}, 500);</script>';
            }
        else {

        $sql = "Insert into qttk (matkhau, quyen, tentk) values ('$matkhau',$quyen,'$tentk')";
        $conn->exec($sql);
        $conn=null;
        echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'success',
                    title: 'Đăng ký thành công !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
        echo '}, 500);</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}
// DONE
function insert_admin($tentk, $matkhau, $quyen)
{
    try {
        include 'connect.php';
        include 'select.php';
        $table=query_select("select * from qttk where tentk='".$tentk."'");
        $count=$table->rowCount();
        if ($count>0)
            {
                echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'error',
                    title: 'Tài khoản đã tồn tại !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
                echo '}, 500);</script>';
            }
        else {

        $sql = "Insert into qttk (matkhau, quyen, tentk) values ('$matkhau',$quyen,'$tentk')";
        $conn->exec($sql);
        $conn=null;
        echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'success',
                    title: 'Đăng ký thành công !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
        echo '}, 500);</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}
//DONE
function insert_ncc( $mancc, $tenncc,$diachi,$masothue,$mota)
{
    try {
        include '../connect.php';
        // include '../select.php';
        $table=query_select("select * from nhacungcap where mancc='".$mancc."'");
        $count=$table->rowCount();
        if ($count>0)
            {
                echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'error',
                    title: 'Mã nhà cung cấp đã tồn tại !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
                echo '}, 500);</script>';
            }else{
                $sql = "Insert into nhacungcap (mancc,tenncc,diachi,masothue,gioithieu) values ('$mancc','$tenncc','$diachi','$masothue','$mota')";
                $conn->exec($sql);
                $conn=null;
                echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'success',
                    title: 'Thêm nhà cung cấp thành công !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
                echo '}, 500);</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}
//DONE
function insert_ctkm($makm,$masp,$member,$tilegiamgia,$ghichu)
{
    try {
        include '../connect.php';
        $table=query_select("select * from ctkm where makm='".$makm."' and masp='".$masp."'");
        $count=$table->rowCount();
        if ($count>0)
            {
                echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'error',
                    title: 'Sản phẩm ".$masp." khuyến mãi đã tồn tại !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
                echo '}, 500);</script>';
            }
        else {
        $sql = "Insert into ctkm (ghichu, makm, masp,tilegiamgia,member) values ('$ghichu','$makm','$masp','$tilegiamgia','$member')";
        $conn->exec($sql);
        $conn=null;
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire({
            type: 'success',
            title: 'Thêm chương trình khuyến mãi thành công!',
            showConfirmButton: false,
            timer: 1500
          });";
        echo '}, 500);</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}
//DONE
function insert_kmai($htkm,$makm,$tenkm,$tgbd,$tgkt)
{
    try {
        include '../connect.php';
        // include '.\..\..\select.php';
        $table=query_select("select * from kmai where makm='".$makm."'");
        $count=$table->rowCount();
        if ($count>0)
            {
                echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'error',
                    title: 'Khuyến mãi đã tồn tại !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
                echo '}, 500);</script>';
            }
        else {
        $sql = "Insert into kmai (htkm,makm,tenkm,TGBD,TGKT) values ('$htkm','$makm','$tenkm','$tgbd','$tgkt')";
        $conn->exec($sql);
        $conn=null;
        echo '<script type="text/javascript">';
                echo "setTimeout(function () { Swal.fire({
                    type: 'success',
                    title: 'Thêm khuyến mãi thành công !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
                echo '}, 500);</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function insert_quanly($manv,$maql)
{
    try {
        include '.\..\..\connect.php';
        include '.\..\..\select.php';
        $table=query_select("select * from quanly where manv='".$manv."' and maql='".$maql."'");
        $count=$table->rowCount();
        if ($count>0)
            {
               echo "<script>alert('Mã quản lý của nhân viên này đã tồn tại')</script>";
            }
        else {
        $sql = "Insert into quanly (manv,maql) values ('$manv','$maql')";
        $conn->exec($sql);
        $conn=null;
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

//DONE
function insert_sp($masp, $maloai, $tensp, $gia, $soluong, $mancc, $ngaysanxuat, $hansudung, $dungtich, $motaSP, $ngaynhaphang, $trangthai)
{
    try {
        include '../connect.php';
        $table = query_select("SELECT * FROM sp WHERE sp.MaSP='".$masp."'");
        $count = $table->rowCount();
        if ($count > 0)
            {
                echo "<script>alert('Mã sản phẩm này đã tồn tại')</script>";
            }
        else {
            $sql = "INSERT INTO `sp`(`MaSP`, `Maloai`, `Tensp`, `Gia`, `Soluong`, `MaNcc`, `Ngaysanxuat`, `hansudung`, `dungtich`, `MotaSP`, `Ngaynhaphang`, `trangthai`) VALUES ('$masp', '$maloai', '$tensp', '$gia', '$soluong', '$mancc', '$ngaysanxuat', '$hansudung', '$dungtich', '$motaSP', '$ngaynhaphang', '$trangthai')";
            $conn->exec($sql);
            $conn=null;
            echo '<script> window.location = "?page=upload&&masp='.$masp.'"; </script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}
function insert_khachhang($hoten,$namsinh,$gioitinh,$socmnd,$dienthoai,$DKTT,$ghichu)
{
    try {
        include 'connect.php';
        $table = query_select("SELECT * FROM khachhang WHERE khachhang.Socmnd='".$socmnd."'");
        $count = $table->rowCount();
        if($count > 0){
            echo "<script>alert('Bạn đã là thành viên trước đó của shop')</script>";
        }
        else {
            $sql = "Insert into khachhang (hoten,Namsinh,gioitinh,socmnd,dienthoai,DKTT,ghichu) values ('$hoten','$namsinh','$gioitinh','$socmnd','$dienthoai','$DKTT','$ghichu')";
            $conn->exec($sql);
            $conn=null;
        }
        // }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}


// DONE
function insert_tintuc($masp, $noidung, $tieude)
{
    try {
        include '../connect.php';
       
        $sql = "Insert into tintuc (MaSP, Noidung, Tieude) values ('$masp','$tieude','$noidung')";
        $conn->exec($sql);
        $conn=null;
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire({
                    type: 'success',
                    title: 'Thêm tin tức thành công !',
                    showConfirmButton: false,
                    timer: 1500
                  });";
        echo '}, 500);</script>';
        
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function insert_video($masp, $matin,$makh,$urlhinh,$urlvideo)
{
    try {
        include '../connect.php';
       
        $sql = "Insert into video ( MaSP,MaTin,MaKH,URLHinh,URLVideo) values ('$masp','$matin','$makh','$urlhinh','$urlvideo')";
        $conn->exec($sql);
        $conn=null;
          } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}



function insert_video1($masp,$matin,$cmnd_kh,$urlhinh,$urlvideo,$date)
{
    try {
        include 'connect.php';
        $sql = "INSERT INTO video (MaSP,MaTin,CMND_KH,URLHinh,URLVideo,update_on) values ('$masp','$matin','$cmnd_kh','$urlhinh','$urlvideo','$date')";
        $conn->exec($sql);
        $conn=null;
          } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}
function insert_video2($masp,$matin,$cmnd_kh,$urlhinh,$urlvideo,$date)
{
    try {
        include '../connect.php';
        $sql = "INSERT INTO video (MaSP,MaTin,CMND_KH,URLHinh,URLVideo,update_on) values ('$masp','$matin','$cmnd_kh','$urlhinh','$urlvideo','$date')";
        $conn->exec($sql);
        $conn=null;
          } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}


?>