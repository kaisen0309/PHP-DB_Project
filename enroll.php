<html>

<head>
    <link rel="stylesheet" href="style1.css" />

</head>

<body style="height:1100px">

    <FORM action=" " method="post" style="margin-top:120px">

    </FORM>

    <?php
    $link = mysqli_connect('localhost', 'root', '', 'phpproject2');

    if (!mysqli_select_db($link, 'phpproject2'))
        die("無法開啟資料庫!<br>");
    else
        echo "資料庫:開啟成功!<br>";

    mysqli_set_charset($link, 'utf8');

    $SQL = 'SELECT * FROM customer';
    if ($result = mysqli_query($link, $SQL)) {
        header("Refresh:0.1;url=enrolladd.php");
    } else {
        echo "資料庫查詢失敗";
    }

    mysqli_close($link);

    ?>

</body>

</html>