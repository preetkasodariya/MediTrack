<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$response=array();
$result = mysqli_query($conn , "select *,IFNULL((select sum(quantity) from tbl_stock where medicine_id=m.medicine_id),0) as totalstock,
                                        IFNULL((select sum(qty) from tbl_treatmentmedicine where medicine_id=m.medicine_id),0) as totalsell 
                                        from tbl_medicines as m left join tbl_company as c on m.company_id=c.company_id");
while($row=mysqli_fetch_assoc($result))
{
    $row["medicine_image"]="http://localhost/MediTrack/api/uploads/".$row["medicine_image"];
    $row["stock"] = $row["totalstock"] - $row["totalsell"];
    $response[]=$row;
}
echo json_encode($response);
?>