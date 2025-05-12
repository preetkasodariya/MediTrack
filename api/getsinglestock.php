<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$id = $_POST["id"];

$response=array();
$result = mysqli_query($conn , "select * from tbl_stock as s left join tbl_medicines as m on s.medicine_id=m.medicine_id
                                                            left join tbl_retailer as r on r.Retailer_id=s.Retailer_id
                                                            where s.stock_id='$id'");
$row=mysqli_fetch_assoc($result);
$response=$row;
echo json_encode($response);
?>