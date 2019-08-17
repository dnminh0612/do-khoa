<?php 

function update_loai($maloai,$tenloai,$mota)
{
    try {
        include '../connect.php';
        $table=query_select("select * from loaisp where MaLoai='".$maloai."'");
        $count=$table->rowCount();
        if ($count==0)
            {
                echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
            }
        else {
        $sql = "update loaisp set TenLoai='$tenloai', Mota='$mota' where MaLoai='$maloai'";
        $conn->exec($sql);
        $conn=null;   
        echo '<script type="text/javascript">';

        echo "setTimeout(function () { Swal.fire({
                      type: 'success',
                      title: 'Đã cập nhật loại sản phẩm !',
                      showConfirmButton: false,
                      timer: 1500
                      });";

        echo '}, 500);</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}


function update_sanpham($masp, $maloai, $tensp, $gia, $soluong, $mancc, $ngaysanxuat, $hansudung, $dungtich, $motaSP, $ngaynhaphang, $trangthai)
{
    $sql = "UPDATE sp SET MaSP='$masp', Maloai='$maloai', Tensp='$tensp', Gia='$gia', Soluong='$soluong', MaNcc='$mancc', Ngaysanxuat='$ngaysanxuat', hansudung='$hansudung', dungtich='$dungtich', MotaSP='$motaSP', Ngaynhaphang='$ngaynhaphang', trangthai='$trangthai' WHERE sp.MaSP='$masp'";
    include '../connect.php';

    if($conn->query($sql))
    {
        echo 
            "
            <script type='text/javascript'>
                setTimeout(function () { 
                    Swal.fire({
                        type: 'success',
                        title: 'Cập nhật thành công !',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }, 1);
            </script>
        ";
    }
}

function update_admin($tentk, $matkhau, $quyen)
{
    try {
        include '../connect.php';
        // include '.\..\..\select.php';
        $table=query_select("select * from qttk where tentk='".$tentk."'");
        $count=$table->rowCount();
        if ($count==0)
            {
                echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
            }
        else {

        $sql = "update qttk set matkhau='$matkhau',quyen='$quyen' where tentk='$tentk'";
        $conn->exec($sql);
        $conn=null;             
        echo "<script>alert('đã cập nhật dữ liệu')</script>";
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}
    
// DONE
function update_password($tentk, $matkhau, $matkhaumoi)
{
    try {
        include '../connect.php';
        $table=query_select("SELECT * FROM qttk WHERE qttk.TenTK ='".$tentk."' AND qttk.Matkhau ='".$matkhau."'");
        $count=$table->rowCount();
        if ($count==0)
            {
                echo '<script type="text/javascript">';
                echo "
                setTimeout(function () { 
                    Swal.fire({
                        type: 'error',
                        title: 'Mật khẩu cũ nhập sai !',
                        showConfirmButton: false,
                        timer: 1500
                    });";
                echo '});</script>';
            }
        else 
        {
            $sql = "UPDATE qttk SET Matkhau = '$matkhaumoi' WHERE qttk.TenTK = '$tentk'";
            $conn->exec($sql);
            $conn=null;             
            echo '<script type="text/javascript">';

            echo "setTimeout(function () { Swal.fire({
                    type: 'success',
                    title: 'Đổi mật khẩu thành công!',
                    showConfirmButton: false,
                    timer: 1500
                    });";
            echo '});</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

// DONE
function update_ncc( $mancc, $tenncc,$diachi,$masothue,$mota)
{
    try {
        include '../connect.php';
        // include '../select.php';
        $table=query_select("select * from nhacungcap where mancc='".$mancc."'");
        $count=$table->rowCount();
        if ($count==0)
            {
                echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
            }else{
                $sql = "update nhacungcap set tenncc='$tenncc',diachi='$diachi',masothue='$masothue',gioithieu='$mota' where mancc='$mancc'";
                $conn->exec($sql);
                $conn=null;             
                echo '<script type="text/javascript">';

                echo "setTimeout(function () { Swal.fire({
                            type: 'success',
                            title: 'Đã cập nhật nhà cung cấp !',
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
function update_ctkm( $makm, $masp , $tilegiamgia , $ghichu)
{
    try {
        include '../connect.php';
        $table=query_select("select * from ctkm where makm='".$makm."' and masp='".$masp."'");
        $count=$table->rowCount();
        if ($count==0)
            {
                echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
            }
        else {
        $sql = "update ctkm set ghichu='$ghichu',tilegiamgia='$tilegiamgia' where makm='$makm' and masp='$masp'";
        $conn->exec($sql);
        $conn=null;   
        echo '<script type="text/javascript">';

        echo "setTimeout(function () { Swal.fire({
                      type: 'success',
                      title: 'Đã cập nhật chương trình khuyến mãi !',
                      showConfirmButton: false,
                      timer: 1500
                      });";

        echo '}, 500);</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function update_kmai($htkm,$makm,$tenkm,$tgbd,$tgkt)
{
    try {
        include '../connect.php';
        $table=query_select("select * from kmai where makm='".$makm."'");
        $count=$table->rowCount();
        if ($count==0)
            {
                echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
            }
        else {
        $sql = "update  kmai set htkm='$htkm',tenkm='$tenkm',tgbd='$tgbd',tgkt='$tgkt'  where makm='$makm'";
        $conn->exec($sql);
        $conn=null;             
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire({
                      type: 'success',
                      title: 'Đã cập nhật khuyến mãi !',
                      showConfirmButton: false,
                      timer: 1500
                      });";

        echo '}, 500);</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

// function update_quanly($manv,$maql)
// {
//     try {
//         include '.\..\..\connect.php';
//         include '.\..\..\select.php';
//         $table=query_select("select * from quanly where manv='".$manv."' and maql='".$maql."'");
//         $count=$table->rowCount();
//         if ($count==0)
//             {
//                 echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
//             }
//         else {
//         $sql = "update quanly (manv,maql) values ('$manv','$maql')";
//         $conn->exec($sql);
//         $conn=null;             
//         echo "<script>alert('đã cập nhật dữ liệu')</script>";
//         }
//     } catch (PDOException $e) {
//         echo "connection failed: " . $e->getMessage();
//     }
// }


// function update_sp($masp,$tensp,$gia,$maloai,$soluong,$mancc,$ngaynhaphang,$ngaysanxuat,$trangthai,$mota,$hansudung,$dungtich)
// {
//     try {
//         include '.\..\..\connect.php';
//         include '.\..\..\select.php';
//         $table=query_select("select * from sp where masp='".$masp."'");
//         $count=$table->rowCount();
//         if ($count==0)
//             {
//                 echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
//             }
//         else {
//         $sql = "update sp set tensp='$tensp',gia='$gia', maloai='$maloai',soluong='$soluong',mancc='$mancc',ngaynhaphang='$ngaynhaphang',ngaysanxuat='$ngaysanxuat',trangthai='$trangthai',mota='$mota',hansudung='$hansudung',dungtich='$dungtich' where masp='$masp'";
//         $conn->exec($sql);
//         $conn=null;             
//         echo "<script>alert('đã cập nhật dữ liệu')</script>";
//         }
//     } catch (PDOException $e) {
//         echo "connection failed: " . $e->getMessage();
//     }
// }
// DONE
function update_tintuc($ID, $masp,$noidung,$tieude)
{
    try {
        include '../connect.php';
        // include '.\..\..\select.php';
        $table=query_select("select * from tintuc where matin='".$ID."'");
        $count=$table->rowCount();
        if ($count==0)
            {
                echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
            }
        else {
        $sql = "update  tintuc set MaSP = '$masp', Noidung='$noidung', Tieude='$tieude' where matin='$ID'";
        $conn->exec($sql);
        $conn=null;             
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire({
            type: 'success',
            title: 'Sửa tin tức thành công!',
            showConfirmButton: false,
            timer: 1500
        });";
       echo '}, 1000);</script>';
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function update_video($mamulti,$masp, $matin,$makh,$urlhinh,$urlvideo)
{
    try {
        include '.\..\..\connect.php';
        include '.\..\..\select.php';
        $table=query_select("select * from video where mamulti='".$mamulti."'");
        $count=$table->rowCount();
        if ($count==0)
            {
                echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
            }
        else {
        $sql = "update video set masp='$masp',matin='$matin',makh='$makh',urlhinh='$urlhinh',urlvideo='$urlvideo' where mamulti='$mamulti'";
        $conn->exec($sql);
        $conn=null;             
        echo "<script>alert('đã cập nhật dữ liệu')</script>";
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function update_khachhang($makh,$hoten,$namsinh,$gioitinh,$socmnd,$dienthoai,$DKTT,$DCHT,$ghichu)
{
    try {
        include '.\..\..\connect.php';
        include '.\..\..\select.php';
        $table=query_select("select * from khachhang where makh='".$makh."'");
        $count=$table->rowCount();
        if ($count==0)
            {
                echo "<script>alert('Không tìm thấy dữ liệu cần cập nhật')</script>";
            }
        else {
        $sql = "update khachhang set hoten='$hoten', namsinh='$namsinh',gioitinh='$gioitinh',socmnd='$socmnd',dienthoai='$dienthoai',DKTT='$DKTT',DCHT='$DCHT',ghichu='$ghichu' where makh='$makh'";
        $conn->exec($sql);
        $conn=null;             
        echo "<script>alert('đã cập nhật dữ liệu')</script>";
        }
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

?>