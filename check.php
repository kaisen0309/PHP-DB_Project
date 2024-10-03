<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'phpproject2');

if (!mysqli_select_db($link, 'phpproject2'))
    die("無法開啟資料庫!<br>");

mysqli_set_charset($link, 'utf8');

$C_mail = $_POST["C_mail"];
$C_password = $_POST["C_password"];

//使用者
$query = "SELECT * FROM customer WHERE C_mail='$C_mail'";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['C_password'];
    $isManager = $row['is_manager'];
    // newest
    $T_ID = $row['T_ID'];

    // 驗證密碼
    if ($C_password === $storedPassword) {
        // 登入成功
        $_SESSION["C_mail"] = $C_mail;
        $_SESSION['login'] = 'user';
        //new
        $_SESSION['T_ID'] = $T_ID;

        header("Location:index.php");
        exit();
    }
}

//管理者
$query = "SELECT * FROM employee WHERE E_mail='$C_mail'";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['E_password'];
    $isManager = $row['is_manager'];

    // 驗證密碼
    if ($C_password === $storedPassword) {
        // 登入成功
        $_SESSION["C_mail"] = "$C_mail";
        $_SESSION['login'] = 'admin';
        header("Location:index.php");
        exit();
    }
}

// 登入失敗
$_SESSION["login"] = "fail";
header("Location:fail.php");
exit();

mysqli_close($link);
