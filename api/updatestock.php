<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';
$id=$_POST["id"];
$retailer_id = $_POST["rid"];
$medicine_id = $_POST["mid"];
$quantity = $_POST["qty"];
$ispay = $_POST["pay"];

$result = mysqli_query($conn,"update tbl_stock set Retailer_id='$retailer_id',  medicine_id='$medicine_id' , quantity='$quantity' , ispay='$ispay' where stock_id='$id'");

if($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>