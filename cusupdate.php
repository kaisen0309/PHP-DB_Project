<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <?php
    include("header.php");
    ?>
</head>

<body style="height:1100px">
    <form style="margin-top:100px" form action=" " method="post">

        <style>
            .btn1-group {
                padding: 10px 20px;
                border: none;
                border-radius: 20px;
                background-color: white;
                color: black;
                font-weight: bold;
                cursor: pointer;
                margin-top: 60px;
                text-align: right;
                MARGIN-RIGHT: 540PX;
                MARGIN-LEFT: 570PX;
                TEXT-ALIGN: center;
            }

            .btn1-group:hover {
                background: #bbb;
                color: #fff;
            }
        </style>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $C_name = $_POST['C_name'];
            $C_sex = $_POST['C_sex'];
            $C_mail = $_POST['C_mail'];
            $C_password = $_POST['C_password'];
            $C_phone = $_POST['C_phone'];

            $link = mysqli_connect('localhost', 'root', '', 'phpproject2');
            mysqli_set_charset($link, "utf8");

            $query = "UPDATE customer SET C_name='$C_name', C_sex='$C_sex', C_mail='$C_mail', C_password='$C_password' WHERE C_phone='$C_phone'";
            $result = mysqli_query($link, $query);

            if ($result) {
                echo "<font size='10'><b><center>修改成功！</center></b></font><br><br>";
            } else {
                echo "<font size='10'><b><center>修改失敗！</center></b></font><br><br>";
            }
            mysqli_close($link);
        }
        ?>

        <div>
            <a href='index.php' class="btn1-group">回首頁</a>
        </div>
    </form>
</body>

</html>