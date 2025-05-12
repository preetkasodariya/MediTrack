<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$medicine_id = $_POST["medicine_id"];

$response=array();
$result = mysqli_query($conn , "delete from tbl_medicines where medicine_id= '$medicine_id' ");
if($result)
{
    echo "yes";
}
else
{
    echo "no";
}
?>