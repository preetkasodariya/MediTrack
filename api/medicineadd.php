<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

//Image uplaod
$ext = pathinfo($_FILES["medimg"]["name"],PATHINFO_EXTENSION);
$filename = time().rand(1111,9999).".".$ext;
move_uploaded_file($_FILES["medimg"]["tmp_name"],"uploads/".$filename);
//Image upload

$medname = $_POST['mednm'];
$medimage = $filename;
$company_id =$_POST['cid'];
$retail_price = $_POST['retprice'];
$sell_price = $_POST['sellprice'];
$result = mysqli_query($conn , "insert into tbl_medicines (medicine_name,medicine_image,company_id,retail_price,sell_price) values ('$medname','$medimage','$company_id','$retail_price','$sell_price')");


if($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>