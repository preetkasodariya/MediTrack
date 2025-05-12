<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$id=$_POST["id"];
$company_name = $_POST["cmpnyname"];


$response=array();
$result = mysqli_query($conn , "update tbl_company set company_name='$company_name' where company_id='$id'");
if($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>