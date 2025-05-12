<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';

$id=$_POST["id"];
$total=0;
$response=array();
$result = mysqli_query($conn , "select * from tbl_treatmentmedicine as tm left join tbl_appointment as ap on tm.appointment_id=ap.appointment_id   
                                 left join tbl_medicines as m on tm.medicine_id=m.medicine_id where ap.appointment_id='$id' and tm.isdelete='no'");
                                 while($row=mysqli_fetch_assoc($result))
                                 {
                                    $total=$total + ($row["qty"] * $row["finalprice"]);
                                     $response["data"][]=$row;
                                 }

                              $response["total"] = $total;   
echo json_encode($response);
?>