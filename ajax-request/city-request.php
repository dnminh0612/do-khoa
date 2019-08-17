<?php 
        include('../select.php');
        if(isset($_POST["city"]))
        {
            $item22 = $_POST["city"];
            $output = '';
            $query22 = query_select("select * from devvn_quanhuyen where matp='$item22'");
            $count22 = $query22->rowCount();
            if($count22 > 0)
            {
                foreach ($query22 as $row22) {
                    echo '<option  value="'.$row22['maqh'].'">'.$row22['name'].'</option>';
                }
            }
            else
            {
                echo '<option  value="">Chọn thành phố trước</option>';
            }
        }
        // echo $output;
?>
