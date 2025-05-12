<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';
$uname = $_POST["uname"];
$pwd = $_POST["pwd"];

$result = mysqli_query($conn,"select * from tbl_staff where username = '$uname' and password = '$pwd' and type='Pharmacist'");

$response=array();

if(mysqli_num_rows($result)<=0)
{
    $response["status"] = false;
    $response["message"] = "Login Fail";
}
else
{
    $response["status"] = true;
    $response["message"] = "Login Success";
    $response["userdata"] = mysqli_fetch_assoc($result);
}
echo json_encode($response);
?>