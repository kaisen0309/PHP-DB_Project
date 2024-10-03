<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <title>歷史訂單</title>
    <?php
    include("header.php");
    ?>
    <style>
        body {
            background-attachment: fixed;
            background-color: gray;
            height: 1000px;
        }
    </style>
</head>

<body>
    <style>
        .book_container-top {
            background-color: #939393;
            margin-top: 109px;
            margin-left: 100px;
            padding: 15px;
            border-radius: 20px;
            font-weight: bold;
            width: 1090px;
        }

        .book_container-top h2 {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .cell {
            padding: auto;
            padding-bottom: 10px;
            padding-top: 10px;
            border: 1px solid #ccc;
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f9f9;
            text-align: center;
        }

        .header-cell {
            font-weight: bold;
            background-color: #e0e0e0;
            text-align: center;
        }

        .spacer-cell {
            border: none;
        }
    </style>

    <section style="margin-top:20px">
        <div class="book_container-top">
            <h2>歷史訂單</h2>
            <?php
            if (!isset($_SESSION['login'])) {
                header('Location: login.php');
                exit();
            }

            $link = mysqli_connect('localhost', 'root', '', 'phpproject2');

            $C_mail = $_SESSION['C_mail'];

            // 根據登入使用者顯示對應的資訊
            $SQL = "SELECT orders.o_id, orders.o_time, customer.c_name, customer.c_id, topic.t_name, schedules.s_time, customer.c_phone, customer.c_mail, orders.o_finish
                    FROM customer
                    JOIN orders ON customer.C_ID = orders.C_ID
                    JOIN topic ON orders.T_ID = topic.T_ID
                    JOIN schedules ON orders.S_ID = schedules.S_ID
                    WHERE customer.c_mail = '$C_mail'";


            $result = mysqli_query($link, $SQL);
            if (mysqli_num_rows($result)  > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<td class='header-cell'> 訂單編號 </td>";
                echo "<td class='header-cell'>下單時間 </td>";
                echo "<td class='header-cell'>預約姓名 </td>";
                echo "<td class='header-cell'>遊戲主題 </td>";
                echo "<td class='header-cell'>預約時間 </td>";
                echo "<td class='header-cell'>預約電話 </td>";
                echo "<td class='header-cell'>預約信箱 </td>";
                echo "<td class='header-cell'>訂單狀態 </td>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $o_id = $row['o_id'];
                    $o_time = $row['o_time'];
                    $c_name = $row['c_name'];
                    $t_name = $row['t_name'];
                    $s_time = $row['s_time'];
                    $c_phone = $row['c_phone'];
                    $c_mail = $row['c_mail'];
                    $o_finish = $row['o_finish'];

                    echo "<tr>";
                    echo "<td class='cell'>&emsp;$o_id&emsp;</td>";
                    echo "<td class='cell'>&emsp;$o_time&emsp;</td>";
                    echo "<td class='cell'>&emsp;$c_name&emsp;</td>";
                    echo "<td class='cell'>&emsp;$t_name&emsp;</td>";
                    echo "<td class='cell'>&emsp;$s_time&emsp;</td>";
                    echo "<td class='cell'>&emsp;$c_phone&emsp;</td>";
                    echo "<td class='cell'>&emsp;$c_mail&emsp;</td>";
                    echo "<td class='cell'>";
                    if ($o_finish == 0) {
                        echo "預約中";
                    } else if ($o_finish == 1) {
                        echo "完成</br>";
                        echo "<button class='comment-button'><a href='writecomment.php' style='color: black; font-weight: bold; text-decoration: none;'>評論</a></button>";
                    }
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr><td colspan='8' class='spacer-cell'></td></tr><br/>";
                }
                echo "</table>";
            } else {
                echo "目前沒有歷史訂單資料。";
            }

            mysqli_close($link);
            ?>
        </div>
    </section>
</body>

</html>