<?php 
include('../../connect.php');
include('../../select.php');
        if(isset($_POST["codekm"]))
        {
            $itemKM = $_POST["codekm"];
            $output = '';
            $queryKM = query_select("select * from sp where masp not in (select masp from ctkm where ctkm.MaKm='$itemKM')");
            $countKM = $queryKM ->rowCount();
            $querySP = query_select("select * from sp");
            $countSP = $querySP ->rowCount();
            if($countKM > 0)
            {
                foreach ($queryKM as $rowKM) {
     

                                ?>
                        <tr>
                        <td><input type="checkbox" id="subscribeNews" name="check_product[]"
                             value="<?php echo $rowKM['MaSP']?>"></td>
                        <td><?php echo $rowKM['MaSP'] ?></td>
                        <td class="respon-800"><?php echo $rowKM['Maloai'] ?></td>
                        <td><?php echo $rowKM['Tensp'] ?></td>
                        <td class="respon-375"><?php echo $rowKM['Gia'] ?></td>
                        <td class="respon-600"><?php echo $rowKM['Soluong'] ?></td>
                        <td class="respon-800"><?php echo $rowKM['trangthai'] ?></td>
                        </tr>
                        
                        <?php
                            
                        
                        
                    
                }
            }else{
                $querySP = query_select("select * from sp");
                $countSP = $querySP ->rowCount();
                if($countSP > 0){
                    foreach ($querySP as $rowSP){
            ?>
<tr>
                        <td><input type="checkbox" id="subscribeNews" name="check_product[]"
                             value="<?php echo $rowSP['MaSP']?>"></td>
                        <td><?php echo $rowSP['MaSP'] ?></td>
                        <td><?php echo $rowSP['Maloai'] ?></td>
                        <td><?php echo $rowSP['Tensp'] ?></td>
                        <td><?php echo $rowSP['Gia'] ?></td>
                        <td><?php echo $rowSP['Soluong'] ?></td>
                        <td><?php echo $rowSP['trangthai'] ?></td>
                        </tr>
            <?php
            }
        }
        }
    }
    
        echo $output;
?>
