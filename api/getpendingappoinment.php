<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$response=array();
$result = mysqli_query($conn , "select * from tbl_appointment as ap left join tbl_patients as p on ap.patient_id=p.	patient_id   
                                                                    left JOIN tbl_doctors as d on ap.doctor_id = d.doctor_id  left join tbl_treatment as t on t.appointment_id=ap.appointment_id where t.medicine_take='no'");
while($row=mysqli_fetch_assoc($result))
{
   
    $response[]=$row;
}
echo json_encode($response);
?>