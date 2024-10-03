<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <?php

    include("header.php");

    ?>
</head>

<body>

</body>

<body style="height:1100px">

    <form action="order.php" method="post">
        <style>
            .book_container {
                background-color: #939393;
                /* margin: 0px 500px 0px 500px; */
                margin: 10px 440px 10px 440px;
                padding: 15px;
                border-radius: 20px;
                font-weight: bold;
            }

            .book_container img {
                width: 20px;
                height: 20px;
            }

            .book_container-top {
                background-color: #939393;
                margin: 90px 440px 10px 440px;
                padding: 15px;
                border-radius: 20px;
                font-weight: bold;
            }

            .input-top {
                background-color: #D3D3D3;
                width: 350px;
                padding: 12px 0px 12px 10px;
                margin: 400px 700px 0px 220px;
                font-size: 20px;
                font-weight: bold;
            }

            .input-left {
                background-color: #D3D3D3;
                width: 350px;
                padding: 12px 0px 12px 10px;
                margin: 10px 700px 0px 220px;
                font-size: 20px;
                font-weight: bold;
            }

            .input-right {
                background-color: #D3D3D3;
                width: 350px;
                padding: 12px 0 12px 10px;
                margin: 109px 220px 0px 700px;
                font-size: 20px;
                font-weight: bold;
            }

            .form-group {
                margin-bottom: 10px;
                display: flex;
                align-items: center;
            }

            .form-group label {
                flex-basis: 100px;
                font-weight: bold;
                padding-right: 10px;
                text-align: right;
            }

            .form-group input[type="text"],
            .form-group input[type="number"],
            .form-group input[type="email"],
            .form-group input[type="date"],
            .form-group select {
                flex-grow: 1;
                padding: 5px;
                border-radius: 20px;
                border: 1px solid #ccc;
            }

            .form-group select .form-group select {
                height: 30px;
                margin-top: 109px;
            }


            .test input[type="radio"] {
                display: none;
            }

            .test input:checked+.button {
                background: #5e7380;
                color: #fff;
                cursor: default;
            }

            .test .button {
                display: inline-block;
                margin: 0 5px 10px 0;
                padding: 5px 10px;
                background: #f7f7f7;
                color: #333;
                cursor: pointer;
            }

            .test .button:hover {
                background: #bbb;
                color: #fff;
            }

            .test .round {
                border-radius: 5px;
            }


            .submit-btn {
                margin-top: 10px;
                text-align: right;
            }

            .submit-btn input[type="submit"] {
                padding: 10px 20px;
                border: none;
                border-radius: 20px;
                background-color: white;
                color: black;
                font-weight: bold;
                cursor: pointer;
            }

            .submit-btn input[type="submit"]:hover {
                background-color: black;
                color: white;
            }
        </style>

        <div class="book_container-top">

            <?php
            if (!isset($_SESSION['login'])) {
                header('Location: login.php');
                exit();
            }
            $link = mysqli_connect('localhost', 'root', '', 'phpproject2');

            $login = $_SESSION['login'];
            $mail = $_SESSION['C_mail'];

            $SQL = "SELECT  C_ID, customer.c_name, customer.c_id,  customer.c_phone, customer.c_mail
                FROM customer
                WHERE customer.C_mail = '$mail';";

            if ($result = mysqli_query($link, $SQL)) {
                $row = mysqli_fetch_assoc($result);
                echo "<div class='form-group'>";
                // new
                echo "<input type='hidden' name='C_ID' value='" . $row['C_ID'] . "' >";


                echo "<label for='name'>*姓名:</label>";
                echo "<input type='text' name='name' value='" . $row['c_name'] . "' readonly='readonly' required>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='phone'>*電話:</label>";
                echo "<input type='text' name='phone'  value='" . $row['c_phone'] . "' readonly='readonly' required>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='email'>*電子郵件:</label>";
                echo "<input type='email' name='mail'  value='" . $row['c_mail'] . "' readonly='readonly' required>";
                echo "</div>";
            } else {
                echo "查詢失敗!<br/>";
            }
            mysqli_close($link);
            ?>

            <?php
            $T_ID = $_GET['T_ID'];

            $link = mysqli_connect('localhost', 'root', '', 'phpproject2');

            $SQL = "SELECT * FROM topic WHERE T_ID=$T_ID;";
            if ($result = mysqli_query($link, $SQL)) {

                $row = mysqli_fetch_assoc($result);
                echo "<div class='form-group'>";
                echo "<label for='game'>*遊戲名稱:</label>";
                echo "<input type='text' name='game' value='" . $row['T_name'] . "' readonly='readonly'></br>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='number'>*人數:</label>";
                echo "<input type='number' name='number' value='" . $row['T_number'] . "'min='1' max='10' placeholder='建議人數:" . $row['T_number'] . "' required>";
                echo "</div>";

                // echo "日期:<a href='bookdate.php'>點此</a>";
                echo "<div class='form-group'>";
                echo "<label for='date'>*日期</label>";
                echo "<input type='date' id='date' name='date'  min='";
                echo date('Y-m-d');
                echo "'max='";
                echo date('Y-m-d', strtotime('+1 month'));
                echo "'required> <br><br>";

                echo "</div>";
            }
            mysqli_close($link);

            //$O_date = $_GET['date'];
            $link = mysqli_connect('localhost', 'root', '', 'phpproject2');
            $tidInorder = "SELECT * from topic where T_ID=$T_ID";

            if ($result5 = mysqli_query($link, $tidInorder)) {
                if (mysqli_num_rows($result5)  > 0) {
                    $SQL = "SELECT DISTINCT(s.S_time) FROM schedule_detail sd join orders o on o.T_ID=sd.T_ID && o.T_ID=$T_ID join schedules s on sd.S_ID=s.S_ID WHERE sd.S_ID NOT IN (o.S_ID) ORDER BY `s`.`S_time` ASC;";
                } else {
                    $SQL = "SELECT  DISTINCT(s.S_time) FROM schedule_detail sd join orders o on o.T_ID=sd.T_ID && o.T_ID=$T_ID join schedules s on sd.S_ID=s.S_ID ORDER BY `s`.`S_time` ASC;";
                }
            }
            if ($result = mysqli_query($link, $SQL)) {
                echo "<div class='form-froup'>";
                echo "<div class='test' id='radio'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<input type='radio' id='" . $row['S_time'] . "' name='time' value='" . $row['S_time'] . "' required>";
                    echo "<label class='button round' for='" . $row['S_time'] . "'>";
                    echo $row['S_time'];
                    echo "</label>";
                }
                echo "</div>";
                echo "</div>";
                echo "<div class='submit-btn'>";
                echo "<input type='submit' name='submit' value='提交'>";
                echo "</div>";
            } else {
                echo "查詢失敗!<br/>";
            }
            mysqli_close($link);
            ?>


        </div>
        <div>
            <div class="book_container">
                <img src="images/warning.png" width="10" height="50">注意事項</br>
                <p>一、請勿同時預約2場以上</br>
                    二、欲取消預約請提前來電</br>
                    三、請務必確認遊戲人數</br>
                    四、場次保留十分鐘，可提早五分鐘到場，</br>
                    若前面無場次可提前開始遊戲。</p>
            </div>
        </div>
    </form>
</body>

</html>