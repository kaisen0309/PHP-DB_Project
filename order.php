<html>

<head>
    <meta charset="UTF-8">
    <title>訂單確認</title>
</head>

<body>
    <form action=" " method="post">

        <style>
            body {
                height: 800px;
                background-color: #262626;
                margin: 0;
                padding: 0;
            }

            .order_container {
                background-color: #939393;
                margin: 109px 430px 0 430px;
                padding: 10px;
                border-radius: 10px;
            }

            .order_title {
                font-size: 45px;
                text-align: center;
                margin: 10px auto;
            }

            .order_text {
                font-size: 15px;
                text-align: center;
                margin: 10px auto;
            }

            .order_input-label {
                background-color: #D3D3D3;
                width: 350px;
                padding: 12px 0 12px 10px;
                margin: 10px auto;
            }

            .order_button-center {
                display: flex;
                justify-content: center;
            }

            .order_input-button {
                font-size: 14px;
                color: white;
                background-color: #1B1B1B;
                border-radius: 10px;
                border: 0px;
                box-shadow: 3px 5px 5px -2px;
                width: 100px;
                height: 35px;
                margin: 10px 0;
            }

            .order_input-button:first-child {
                margin-right: 30px;
                background-color: red;
            }

            dialog {
                text-align: center;
                margin: 100px auto;
                border: 2px solid black;

                box-shadow: 0 2px 6px #ccc;
                border-radius: 90px 55px 80px 75px;
                width: 550px;
            }

            dialog::backdrop {
                background-color: rgba(0, 0, 0, 0.1);
            }

            .order_header {
                position: fixed;
                width: 100%;
                background-color: #595959;
                left: 0px;
            }

            .order_headerBtn {
                background-color: #a7a5a5;
                width: 150px;
                height: 60px;
                font-size: 20px;
                margin: 15px 8px 5px 15px;
                float: right;
                border: 4px solid #ff0000;
                border-radius: 15px;
            }
        </style>

        <?php
        include("header.php");
        ?>



        <!-- 訂單確認框start -->
        <div class="order_container">
            <?php
            $link = @mysqli_connect('localhost', 'root', '', 'phpproject2');
            mysqli_set_charset($link, "utf8");

            if (isset($_POST["submit"])) {

                @$T_name = $_POST["game"];
                @$O_number = $_POST["number"];
                @$C_name = $_POST["name"];
                @$C_phone = $_POST["phone"];
                @$C_mail = $_POST["mail"];
                @$O_date = $_POST["date"];
                @$S_time = $_POST["time"];
                $C_ID = $_POST['C_ID'];
                $time = $_POST['time'];

                echo '<b><p class="order_title">訂單完成</p></b>';
                echo '<p class="order_input-label">*遊戲名稱：' . @$T_name . '</p>';
                echo '<p class="order_input-label">*人數：' . @$O_number . '</p>';
                echo '<p class="order_input-label">*姓名：' . @$C_name . '</p>';
                echo '<p class="order_input-label">*電話：' . @$C_phone . '</p>';
                echo '<p class="order_input-label">*電子郵件：' . @$C_mail . '</p>';
                echo '<p class="order_input-label">*日期：' . @$O_date . '</p>';
                echo '<p class="order_input-label">*時段：' . @$S_time . '</p>';
                echo '<b><p class="order_text">如需更改或取消訂單請聯絡客服</p></b>';

                // new
                @$SQL1 = "INSERT INTO orders (O_date, C_ID, O_finish, O_number, S_ID, T_ID)
                      SELECT '$O_date','$C_ID','0', '$O_number','$time', T_ID
                      FROM topic
                      WHERE T_name = '$T_name'";

                if (mysqli_query($link, $SQL1)) {
                    @header("Location:index.php");
                }
            }
            ?>
            <!-- 訂單確認按鈕start -->
            <div class="order_button-center">
                <input type="BUTTON" value="訂單完成" name="BUTTON" class="order_input-button" id="correctbutton">
                <dialog id="infoModal2">
                    <b>
                        <br />
                        <p style="color: green; font-size: 55px ; margin:0px 0px 10px 10px">預約成功！</p><br />
                    </b>
                    <!-- <p style="color: #333333; font-size: 30px ; margin:0px 0px 10px 10px">訂單詳情請於信箱確認</p> -->
                    <input type="button" value="返回首頁" name="BUTTON" class="order_input-button" onclick="location.href='index.php'">
                </dialog>
            </div>
            <!-- 訂單確認按鈕end -->
        </div>
        <!-- 訂單確認框end -->

        <script>
            let bt2 = document.querySelector("#correctbutton");
            let infoModal2 = document.querySelector("#infoModal2");
            bt2.addEventListener("click", function() {
                infoModal2.showModal();
            })
        </script>

</body>

</html>