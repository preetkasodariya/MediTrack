<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';


$rid = $_POST['rid'];
$mid =$_POST['mid'];
$qty = $_POST['qty'];
$pay = $_POST['pay'];
$result = mysqli_query($conn , "insert into tbl_stock (Retailer_id,medicine_id,quantity,ispay) values ('$rid','$mid','$qty','$pay')");


if($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>