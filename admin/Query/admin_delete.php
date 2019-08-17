
<?php

function delete_loaisp($maloai)
{
    try {
        include '../connect.php';
        
            $sql = "delete from loaisp where maloai='$maloai'";
            $conn->exec($sql);
            $conn=null;              
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}


function delete_admin($tentk)
{
    try {
        include '../connect.php';
        $sql = "delete from qttk where tentk='$tentk'";
        $conn->exec($sql);
        $conn=null;              
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function delete_ncc( $mancc)
{
    try {
        include '../connect.php';
        
                $sql = "delete from nhacungcap  where mancc='$mancc'";
                $conn->exec($sql);
                $conn=null;                        
        
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function delete_ctkm( $makm,$masp)
{
    try {
        include '../connect.php';
       
        $sql = "delete from ctkm where makm='$makm' and masp='$masp'";
        $conn->exec($sql);
        $conn=null;   
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function delete_kmai($makm)
{
    try {
        include '../connect.php';
        $sql = "delete from kmai where MaKm='$makm'";
        $conn->exec($sql);
        $conn=null;              
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function delete_quanly($manv,$maql)
{
    try {
        include '.\..\..\connect.php';
      
        $sql = "delete from quanly where manv='$manv' and maql='$maql'";
        $conn->exec($sql);
        $conn=null;             
        echo "<script>alert('đã xóa dữ liệu')</script>";
        
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}


function delete_sp($masp)
{
    $sql = "DELETE FROM sp WHERE sp.MaSP ='$masp'";
    include '../connect.php';
    if($conn->query($sql))
    {
        echo 
            "
            <script type='text/javascript'>
                setTimeout(function () { 
                    Swal.fire({
                        type: 'success',
                        title: 'Xóa thành công!',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }, 1);
            </script>
        ";
    }
}
// 
function delete_tintuc($matin)
{
    try {
        include '..\connect.php';
        // include '.\..\..\select.php';
      
        $sql = "delete from tintuc where matin='$matin'";
        $conn->exec($sql);
        $conn=null;
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function delete_video($mamulti,$masp, $matin,$makh,$urlhinh,$urlvideo)
{
    try {
        include '.\..\..\connect.php';
      
        $sql = "delete from video  where mamulti='$mamulti'";
        $conn->exec($sql);
        $conn=null;             
        echo "<script>alert('đã xóa dữ liệu')</script>";
        
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function delete_khachhang($makh,$hoten,$namsinh,$gioitinh,$socmnd,$dienthoai,$DKTT,$DCHT,$ghichu)
{
    try {
        include '.\..\..\connect.php';
        
        $sql = "delete from khachhang  where makh='$makh'";
        $conn->exec($sql);
        $conn=null;             
        echo "<script>alert('đã xóa dữ liệu')</script>";
        
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}


?>