<?php 
    include('../../connect.php');

    if(isset($_POST["checkbox_value"]))
    {
        for($count = 0; $count < count($_POST["checkbox_value"]); $count++)
        {
            $query = "DELETE FROM sp WHERE sp.MaSP ='".$_POST['checkbox_value'][$count]."'";
            $statement = $conn->prepare($query);
            $statement->execute();
        }
    }

?>