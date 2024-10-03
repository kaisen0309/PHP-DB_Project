<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <?php
    include("header.php");
    ?>
</head>

<body style="height:1100px">

    <form style="margin-top:100px" form action=" " method="post">
        <?php
        $C_name = $_POST['C_name'];
        $C_sex = $_POST['C_sex'];
        $C_mail = $_POST['C_mail'];
        $C_password = $_POST['C_password'];
        $C_phone = $_POST['C_phone'];


        $link = mysqli_connect('localhost', 'root', '', 'phpproject2');
        mysqli_set_charset($link, "utf8");

        $SQL = "INSERT INTO customer(C_name,C_sex,C_mail,C_password,C_phone) VALUE('$C_name','$C_sex','$C_mail','$C_password','$C_phone')";
        $checkSQL = "SELECT * FROM customer WHERE C_mail = '$C_mail'";
        $checkResult = mysqli_query($link, $checkSQL);

        if ($checkResult && mysqli_num_rows($checkResult) > 0) {
            echo ('<div style="text-align: center;"><span style="font-size:30px; font-weight: bold;">信箱已經註冊了</span></div><br>');
        } else {
            if (mysqli_query($link, $SQL)) {
                echo ('<div style="text-align: center;"><span style="font-size:30px; font-weight: bold;">註冊成功！</span></div>');
            } else {
                echo "註冊失敗";
            }
        }
        ?>
    </form>
    <form action="index.php" method="post">
        <style>
            .btn1-group {
                padding: 10px 20px;
                border: none;
                border-radius: 30px;
                background-color: white;
                color: black;
                font-weight: bold;
                cursor: pointer;
                margin-top: 30px;
                text-align: right;
                MARGIN-RIGHT: 530PX;
                MARGIN-LEFT: 575PX;
                TEXT-ALIGN: center;
            }

            .btn1-group:hover {
                background: #bbb;
                color: #fff;
            }

            .btn2-group {
                padding: 10px 20px;
                border: none;
                border-radius: 30px;
                background-color: white;
                color: black;
                font-weight: bold;
                cursor: pointer;
                margin-top: 30px;
                text-align: right;
                MARGIN-RIGHT: 530PX;
                MARGIN-LEFT: 540PX;
                margin-top: 60px;
                TEXT-ALIGN: center;
            }

            .btn2-group:hover {
                background: #bbb;
                color: #fff;
            }
        </style>

        <div>
            <form action=" " method="POST">
                <div>
                    <a href="enrolladd.php" class="btn1-group">重新註冊</a><br><br><br><br>
                </div>
                <div>
                    <a href="index.php" class="btn2-group">進入首頁看看吧！</a>
                </div>
        </div>
    </form>
</body>

</html>