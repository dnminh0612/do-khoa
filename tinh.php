<?php


function query_select($sql)
{
    $table = array();
    try {
        include 'connect.php';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $table = $stmt;
        $conn = null;
    } catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
    }
    return $table;
}

$table = query_select("SELECT DISTINCT matp,name FROM devvn_tinhthanhpho order by matp");
$count = $table->rowCount();

 

?>
<html>
    <head>

  
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
// $(document).ready(function(){
//     $("select.tinh").change(function(){
//         var selectTinh=$(this).children("option:selected").val();
          
//         $.ajax({
//         alert:"aa";
//         //    type:'POST',
//         //    url:'ajax.php',
//         //    data:'matp='+selectTinh,
//         //    success:function(html){
//         //     $('#quan').html(html);
//         //     $('#phuong').html('<option value="">Chọn Quận/Huyện</option>');
//         // }
//         })
//   $(document).ready(function(){
//     $('select.tinh').change(function(){
//     var tinhID=$(this).val();

//     // alert (tinhID);
// //     if (tinhID)
// // {
//     $.ajax({
//            url:'ajaxdev.php',
//            type:'POST',
           
//            data:{matp:tinhID},
//            alert: "vidu",
//            success:function(html){
//             $('#quan').html(html);
//             $('#phuong').html('<option value="">Chọn Quận/Huyện</option>');
//         }
//         });
// // };
      
$(document).ready(function(){
    $('select.tinh').change(function(){
    var tinhID=$(this).val();
    if (tinhID){
        $.ajax({
         url:'ajaxdev.php',
           type:'POST',
           
           data:'matp='+tinhID,
           success:function(html){
            $('#quan').html(html);
            $('#phuong').html('<option value="">Chọn Quận/Huyện</option>');
        }
        });
      
    }else{
        $('#quan').html('<option value="">Chọn Tỉnh/TP</option>');
        $('#phuong').html('<option value="">Chọn Phường/Xã</option>');

    }
});

$('select.quan').change(function(){
    var quanID=$(this).val();
    if (quanID){
        $.ajax({
            url:'ajaxdev.php',
            type:'POST',
           
           
            data: 'maqh='+quanID,
            success:function(html){
                $('#phuong').html(html);
            }
        });
    }else{
        $('#phuong').html('<option value="">Chọn Quận/Huyện</option>');
    }
    });
});
       
</script>
</head>
<body>
    <select class="tinh" id="tinh">
        <option value="">Chon Tinh</option>
    
   <?php
   if ($count > 0) {
    foreach ($table as $row) { 
   echo'<option value="'.$row['matp'].'">'.$row['name'].'</option>';
    }
}
    else {
        echo'<option value="">Vui long chon tinh</option>';
    }
   ?>
   </select>
   <select class="quan" id="quan">
       <option value="">chon Quan</option>
   </select>
   <select class="phuong" id="phuong">
       <option value="">chon Phuong</option>
   </select>
  
</body>

</html>