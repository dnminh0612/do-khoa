<?php 
        include('../select.php');
        if(isset($_POST["district"]))
        {
            $item33 = $_POST["district"];
            $output = '';
            $query33 = query_select("select * from devvn_xaphuongthitran where maqh='$item33'");
            $count33 = $query33->rowCount();
            if($count33 > 0)
            {
                foreach ($query33 as $row33) {
                    echo '<option  value="'.$row33['xaid'].'">'.$row33['name'].'</option>';
                }
            }
            else
            {
                echo '<option  value="">Chọn quận huyện trước</option>';
            }
        }
?>
