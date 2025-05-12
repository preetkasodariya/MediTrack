<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$id = $_POST["id"];

$response=array();
$result = mysqli_query($conn , "select * from tbl_medicines as m left join tbl_company as c on m.company_id=c.company_id where m.medicine_id='$id'");
$row=mysqli_fetch_assoc($result);
$row["medicine_image"]="http://localhost/MediTrack/api/uploads/".$row["medicine_image"];
$response=$row;
echo json_encode($response);
?>