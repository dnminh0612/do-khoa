<?php
if(isset($_GET['id'])){
    $tentk = $_GET['id'];
    delete_admin($tentk);
    // PREVIOUS PAGE
    $_SESSION['DeleteCheck'] = true;
    echo '<script>javascript:history.go(-1);</script>';
}else{
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire({
            type: 'error',
            title: 'Lỗi truy vấn dữ liệu. Vui lòng quay lại trang trước!',
            showConfirmButton: false,
            timer: 1500
        });";
    echo '}, 1000);</script>';
}
?>