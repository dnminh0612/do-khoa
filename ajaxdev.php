<?php
include 'select.php';

if (isset($_POST["matp"]) )
{
    
    $table = query_select("SELECT DISTINCT maqh,name FROM devvn_quanhuyen where matp='".$_POST['matp']."' order by maqh");
    $count = $table->rowCount();
    if ($count>0)
    {
         echo'<option value="">Select Quan</option>';
        foreach($table as $row)
        {
            echo '<option value="'.$row['maqh'].'">'.$row['name'].'</option>';

        }
    }
    else {
        echo'<option value="">Selection not Available</option>';
    }
       
}

if (isset($_POST["maqh"]) && !empty($_POST["maqh"]))
{
    $table = query_select("SELECT DISTINCT name FROM devvn_xaphuongthitran where maqh='".$_POST['maqh']."' order by name");
    $count = $table->rowCount();
    if ($count>0)
    {
         echo'<option value="">Select Phuong</option>';
        foreach($table as $row)
        {
            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';

        }
    }
    else {
        echo'<option value="">Selection not Available</option>';
    }
       
}
?>