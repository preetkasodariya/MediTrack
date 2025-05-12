<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';
$retailer_id = $_POST["rid"];
$medicine_id = $_POST["mid"];
$quantity = $_POST["qty"];
$payment = $_POST["pay"];

$result = mysqli_query($conn,"insert into tbl_retailer (Retailer_id,medicine_id,quantity,ispay) values ('$retailer_id','$medicine_id','$quantity','$payment')");

if($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>