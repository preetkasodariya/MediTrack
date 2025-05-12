<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include '../admin/connetion.php';
$response=array();
$result = mysqli_query($conn , "SELECT 
    SUM(bill_amount) AS today_sale
FROM 
    tbl_treatment
WHERE 
    DATE(invoicedate) = CURDATE()");

$row=mysqli_fetch_assoc($result);
$response["today_sale"] = $row["today_sale"];

$result = mysqli_query($conn , "SELECT 
    SUM(bill_amount) AS week_sale
FROM 
    tbl_treatment
WHERE 
    YEARWEEK(invoicedate, 1) = YEARWEEK(CURDATE(), 1)");

$row=mysqli_fetch_assoc($result);
$response["week_sale"] = $row["week_sale"];


$result = mysqli_query($conn , "SELECT 
    SUM(bill_amount) AS month_sale
FROM 
    tbl_treatment
WHERE 
    YEAR(invoicedate) = YEAR(CURDATE())
    AND MONTH(invoicedate) = MONTH(CURDATE())");

$row=mysqli_fetch_assoc($result);
$response["month_sale"] = $row["month_sale"];


echo json_encode($response);