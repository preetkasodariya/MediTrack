<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';
$retailer_name = $_POST["Retname"];
$retailer_address = $_POST["Retadd"];
$retailer_number = $_POST["Retcontact"];
$retailer_email = $_POST["RetEmail"];

$result = mysqli_query($conn,"insert into tbl_retailer (name,address,mobile_no,email_id) values ('$retailer_name','$retailer_address','$retailer_number','$retailer_email')");

if($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>