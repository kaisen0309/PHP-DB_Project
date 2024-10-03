<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <title>訂單管理</title>
    <?php
    include("header.php");
    ?>
</head>

<body>
    <style>
        .book_container-top {
            background-color: #939393;
            margin-top: 200px;
            margin-left: 150px;
            padding: 15px;
            border-radius: 20px;
            font-weight: bold;
            width: 1000px;
            font-weight: bold;

        }

        .book_container-top h1 {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .cell {
            padding: 10px;
            border: 1px solid #ccc;
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f9f9;
            text-align: center;
            box-sizing: border-box;
        }


        .header-cell {
            font-weight: bold;
            background-color: #e0e0e0;
            text-align: center;
            width: 100px;
        }

        .header-cell tr {
            padding: auto;
        }


        .spacer-cell {
            border: none;
        }

        table {
            display: block;
        }

        .nothing {
            text-align: center;
            font-size: 25px;
        }
    </style>
    <div class="book_container-top">
        <h1>預約訂單</h1>
        <?php
        $link = mysqli_connect('localhost', 'root', '', 'phpproject2');

        if (isset($_POST['o_id']) && isset($_POST['o_finish'])) {
            $o_id = $_POST['o_id'];
            $o_finish = $_POST['o_finish'];

            $updateQuery = "UPDATE orders SET o_finish='$o_finish' WHERE o_id='$o_id';";
            mysqli_query($link, $updateQuery);
        }

        $SQL = "SELECT orders.o_id, orders.o_time, orders.o_date, customer.c_name, customer.c_id, topic.t_name, schedules.s_time, customer.c_phone, customer.c_mail, orders.o_finish
        FROM customer
        JOIN orders ON customer.C_ID = orders.C_ID
        JOIN topic ON orders.T_ID = topic.T_ID
        JOIN schedules ON orders.S_ID = schedules.s_ID
        WHERE orders.o_finish = 0;";


        $result = mysqli_query($link, $SQL);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table4_12'>";
            echo "<tr>";
            echo "<td class='header-cell' >  編號 </td>";
            echo "<td class='header-cell'>下單時間</td>";
            echo "<td class='header-cell'>姓名 </td>";
            echo "<td class='header-cell'>遊戲主題 </td>";
            echo "<td class='header-cell'> 日期  </td>";
            echo "<td class='header-cell'>時間 </td>";
            echo "<td class='header-cell'>預約電話</td>";
            echo "<td class='header-cell'>預約信箱</td>";
            echo "<td class='header-cell'>訂單 </td>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                $o_id = $row['o_id'];
                $o_time = $row['o_time'];
                $c_name = $row['c_name'];
                $t_name = $row['t_name'];
                $o_date = $row['o_date'];
                $s_time = $row['s_time'];
                $c_phone = $row['c_phone'];
                $c_mail = $row['c_mail'];
                $o_finish = $row['o_finish'];

                echo "<tr>";
                echo "<td class='cell'>&emsp; $o_id &emsp; </td>";
                echo "<td class='cell'>&emsp; $o_time &emsp; </td>";
                echo "<td class='cell'>&emsp; $c_name &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_name &emsp; </td>";
                echo "<td class='cell'>&emsp; $o_date &emsp; </td>";
                echo "<td class='cell'>&emsp; $s_time &emsp; </td>";
                echo "<td class='cell'>&emsp; $c_phone &emsp; </td>";
                echo "<td class='cell'>&emsp; $c_mail &emsp; </td>";
                echo "<td class='cell'>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='o_id' value='$o_id'>";
                echo "<select name='o_finish' onchange='this.form.submit()'>";
                echo " &emsp;<option value='0'" . ($o_finish == '0' ? ' selected' : '') . ">未完成</option>";
                echo " &emsp;<option value='1'" . ($o_finish == '1' ? ' selected' : '') . ">已完成</option>";
                echo "</select>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='nothing'>目前沒有預約訂單資料。</p>";
        }

        mysqli_close($link);
        ?>
        <br>
        <h1>已完成訂單</h1>
        <?php
        $link = mysqli_connect('localhost', 'root', '', 'phpproject2');

        $SQL = "SELECT orders.o_id, orders.o_time, orders.o_date, customer.c_name, customer.c_id, topic.t_name, schedules.s_time, customer.c_phone, customer.c_mail, orders.o_finish
        FROM customer
        JOIN orders ON customer.C_ID = orders.C_ID
        JOIN topic ON orders.T_ID = topic.T_ID
        JOIN schedules ON orders.S_ID = schedules.s_ID
        WHERE orders.o_finish = 1;";


        $result = mysqli_query($link, $SQL);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table4_12'>";
            echo "<tr>";
            echo "<td class='header-cell'>編號</td>";
            echo "<td class='header-cell'>下單時間</td>";
            echo "<td class='header-cell'>姓名</td>";
            echo "<td class='header-cell'>遊戲主題</td>";
            echo "<td class='header-cell'>日期</td>";
            echo "<td class='header-cell'>時間</td>";
            echo "<td class='header-cell'>預約電話</td>";
            echo "<td class='header-cell'>預約信箱</td>";
            echo "<td class='header-cell'>訂單完成</td>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                $o_id = $row['o_id'];
                $o_time = $row['o_time'];
                $c_name = $row['c_name'];
                $t_name = $row['t_name'];
                $o_date = $row['o_date'];
                $s_time = $row['s_time'];
                $c_phone = $row['c_phone'];
                $c_mail = $row['c_mail'];
                $o_finish = $row['o_finish'];

                echo "<tr>";
                echo "<td class='cell'>&emsp; $o_id &emsp; </td>";
                echo "<td class='cell'>&emsp; $o_time &emsp; </td>";
                echo "<td class='cell'>&emsp; $c_name &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_name &emsp; </td>";
                echo "<td class='cell'>&emsp; $o_date &emsp; </td>";
                echo "<td class='cell'>&emsp; $s_time &emsp; </td>";
                echo "<td class='cell'>&emsp; $c_phone &emsp; </td>";
                echo "<td class='cell'>&emsp; $c_mail &emsp; </td>";
                echo "<td class='cell'>&emsp; 完成&emsp;</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>目前沒有已完成訂單資料。</p>";
        }

        mysqli_close($link);
        ?>
    </div>
</body>

</html>