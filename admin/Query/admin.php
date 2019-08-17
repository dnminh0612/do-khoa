
<?php


function insert_loaisp($maloai, $tenloai)
{
    try {
        include 'connect.php';
        $sql = "Insert into loaisp(maloai, tenloai) values ('$maloai','$tenloai') ";
        $conn->exec($sql);
        $conn=null;
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}


function insert_admin($tentk, $matkhau, $quyen)
{
    try {
        include 'connect.php';
        $sql = "Insert into qttk (matkhau, quyen, tentk) values ('$matkhau',$quyen,'$tentk')";
        $conn->exec($sql);
        $conn=null;
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function insert_ncc( $mancc, $tenncc,$diachi,$masothue)
{
    try {
        include 'connect.php';
        $sql = "Insert into nhacungcap (mancc,tenncc,diachi,masothue) values ('$mancc','$tenncc','$diachi','masothue')";
        $conn->exec($sql);
        $conn=null;
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function insert_ctkm( $makm, $masp,$tgbd,$tgkt,$tilegiamgia,$ghichu)
{
    try {
        include 'connect.php';
        $sql = "Insert into ctkm (ghichu, makm, masp, tgbd,tgkt,tilegiamgia) values ('$ghichu','$makm','$masp',$tgbd,$tgkt,$tilegiamgia)";
        $conn->exec($sql);
        $conn=null;
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

function insert_kmai($htkm,$makm,$tenkm)
{
    try {
        include 'connect.php';
        $sql = "Insert into kmai (htkm,makm,tenkm) values ('$htkm','$makm','$tenkm')";
        $conn->exec($sql);
        $conn=null;
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
}

?>