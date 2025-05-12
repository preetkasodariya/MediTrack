<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$id=$_POST["id"];
$retailer_name = $_POST["Retname"];
$retailer_address = $_POST["Retadd"];
$retailer_number = $_POST["Retcontact"];
$retailer_email = $_POST["RetEmail"];

$response=array();
$result = mysqli_query($conn , "update tbl_retailer set name='$retailer_name', address='$retailer_address', mobile_no='$retailer_number' , email_id='$retailer_email' where Retailer_id='$id'");

if($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>