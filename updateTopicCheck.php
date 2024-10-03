<?php
//0511
?>

<meta charset="utf-8">

<?php

$t_id = $_POST['T_ID'];
$t_name = $_POST['T_name'];
$t_number = $_POST['T_number'];
$t_price = $_POST['T_price'];
$t_long = $_POST['T_long'];
$t_star = $_POST['T_star'];
$t_information = $_POST['T_information'];
$k_id = $_POST['K_ID'];

$link =  @mysqli_connect('localhost', 'root', '', 'phpproject2');;
mysqli_set_charset($link, "utf8");
$SQL = "UPDATE topic 
SET T_ID='$t_id', T_name='$t_name', T_number='$t_number', T_price='$t_price', T_long='$t_long', T_star='$t_star', T_information='$t_information', K_ID='$k_id' WHERE T_ID='$t_id'";

if (mysqli_query($link, $SQL)) {
    header("Location:delTopic.php");
}

?>