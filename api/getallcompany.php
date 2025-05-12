<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$response=array();
$result = mysqli_query($conn , "select * from tbl_company");
while($row=mysqli_fetch_assoc($result))
{
    $response[]=$row;
}
echo json_encode($response);
?>