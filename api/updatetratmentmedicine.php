<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$id=$_POST["id"];
$qty=$_POST["qty"];

$response=array();
$result = mysqli_query($conn , "update tbl_treatmentmedicine set qty='$qty' where tm_id='$id'");
if($result)
{
    $response["status"]=true;
    $response["message"] = "Record Deleted";
}
else
{
    
    $response["status"]=false;
    $response["message"] = "Error";
}
if($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
echo json_encode($response);
?>