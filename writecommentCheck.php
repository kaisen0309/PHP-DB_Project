
<?php
session_start();

$comments = $_POST['comments'];



$T_ID = $_POST['T_ID'];
$C_ID = $_POST['C_ID'];
//echo $T_ID . $C_ID;

$link =  @mysqli_connect('localhost', 'root', '', 'phpproject2');;
mysqli_set_charset($link, "utf8");
$SQL = "INSERT INTO comment(Co_recode,  C_ID,T_ID) VALUES('$comments', '$C_ID', '$T_ID')";

// if ($T_ID == 1 && $C_ID == 1) {
//     header("Location:index.php");
// } else {
//     header("Location:writecomment.php");
// }
if (mysqli_query($link, $SQL)) {
    header("Location:index.php");
}
header("Location:index.php");
?>