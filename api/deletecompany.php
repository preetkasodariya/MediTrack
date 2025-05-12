<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$company_id = $_POST["company_id"];

$response=array();
$result = mysqli_query($conn , "delete from tbl_company where company_id='$company_id'");
if($result)
{
    echo "yes";
}
else
{
    echo "no";
}
?>