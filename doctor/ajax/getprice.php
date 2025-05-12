<?php
include '../connetion.php';
$mid = $_POST["mid"];
$result = mysqli_query($conn , "select *,IFNULL((select sum(quantity) from tbl_stock where medicine_id=m.medicine_id),0) as totalstock,
                                         IFNULL((select sum(qty) from tbl_treatmentmedicine where medicine_id=m.medicine_id),0) as totalsell 
                                         from tbl_medicines as m left join tbl_company as c on m.company_id=c.company_id where m.medicine_id='$mid'");
$row=mysqli_fetch_assoc($result);
$stock = $row["totalstock"] - $row["totalsell"];
echo $stock;