<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$id=$_POST["id"];
$total=$_POST["total"];

$response=array();
$result = mysqli_query($conn , "update tbl_treatment set medicine_take='yes',bill_amount='$total' where appointment_id='$id'");
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
echo json_encode($response);
?>