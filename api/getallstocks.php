<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$response=array();
$result = mysqli_query($conn , "select * from tbl_stock as s left join tbl_retailer as r on s.Retailer_id=r.Retailer_id   
                                                             left join tbl_medicines as m on m.medicine_id=s.medicine_id");
while($row=mysqli_fetch_assoc($result))
{
   
    $response[]=$row;
}
echo json_encode($response);
?>