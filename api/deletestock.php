<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$stock_id = $_POST["stock_id"];

$response=array();
$result = mysqli_query($conn , "delete from tbl_stock where stock_id='$stock_id'");
if($result)
{
    echo "yes";
}
else
{
    echo "no";
}
?>