<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';
    $mid = $_POST['mid'];
    $medname = $_POST['mednm'];
   
    $company_id =$_POST['cid'];
    $retail_price = $_POST['retprice'];
    $sell_price = $_POST['sellprice'];
//Image uplaod
if(!empty($_FILES["medimg"]["name"]))
{
    $ext = pathinfo($_FILES["medimg"]["name"],PATHINFO_EXTENSION);
    $filename = time().rand(1111,9999).".".$ext;
    move_uploaded_file($_FILES["medimg"]["tmp_name"],"uploads/".$filename);
    $medimage = $filename;
    $result = mysqli_query($conn , "update tbl_medicines set medicine_name='$medname',medicine_image='$medimage',company_id='$company_id',retail_price='$retail_price',sell_price='$sell_price' where medicine_id='$mid'");
}
else
{
    $result = mysqli_query($conn , "update tbl_medicines set medicine_name='$medname',company_id='$company_id',retail_price='$retail_price',sell_price='$sell_price' where medicine_id='$mid'");
}
//Image upload




if($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>