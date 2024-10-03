<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <title>編輯遊戲主題</title>
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
        <h1>已上架遊戲</h1>
        <?php
        $link = mysqli_connect('localhost', 'root', '', 'phpproject2');

        if (isset($_POST['t_id']) && isset($_POST['t_exist'])) {
            $t_id = $_POST['t_id'];
            $t_exist = $_POST['t_exist'];

            $updateQuery = "UPDATE topic SET t_exist='$t_exist' WHERE t_id='$t_id';";
            mysqli_query($link, $updateQuery);
        }

        $SQL = "SELECT *from topic where t_exist='1'";


        $result = mysqli_query($link, $SQL);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table4_12'>";
            echo "<tr>";

            echo "<td class='hidden'>&emsp;&emsp; </td>";

            echo "<td class='header-cell' ;> &emsp; 編號&emsp; </td>";
            echo "<td class='header-cell'>&emsp;名稱 &emsp;</td>";
            echo "<td class='header-cell'>&emsp; 人數&emsp; </td>";
            echo "<td class='header-cell'>&emsp; 價格 &emsp; </td>";
            echo "<td class='header-cell'>&emsp;時長 &emsp;  </td>";
            echo "<td class='header-cell'>&emsp;難度&emsp; </td>";
            // echo "<td class='header-cell'>&emsp;資訊&emsp; </td>";
            echo "<td class='header-cell'>&emsp;種類&emsp; </td>";
            echo "<td class='header-cell'>&emsp; 狀態 &emsp;  </td>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                $t_id = $row['T_ID'];
                $t_name = $row['T_name'];
                $t_number = $row['T_number'];
                $t_price = $row['T_price'];
                $t_long = $row['T_long'];
                $t_star = $row['T_star'];
                $t_information = $row['T_information'];
                $k_id = $row['K_ID'];
                $t_exist = $row['t_exist'];



                echo "<tr>";
                echo "<td class='hidden'>&emsp;&emsp; </td>";

                echo "<td class='cell'>&emsp; $t_id &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_name &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_number &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_price &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_long &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_star &emsp; </td>";
                // echo "<td class='cell'>&emsp; $t_information &emsp; </td>";
                echo "<td class='cell'>&emsp; $k_id &emsp; </td>";
                echo "<td class='cell'>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='t_id' value='$t_id'>";
                echo "<select name='t_exist' onchange='this.form.submit()'>";
                echo " &emsp;<option value='0'" . ($t_exist == '0' ? ' selected' : '') . ">下架</option>";
                echo " &emsp;<option value='1'" . ($t_exist == '1' ? ' selected' : '') . ">上架</option>";
                echo "</select>";
                echo "<br><br/><a href='updateTopic.php?T_ID=" . $row['T_ID'] . "'>edit</a>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='nothing'>目前沒有資料。</p>";
        }

        mysqli_close($link);
        ?>
        <br>
        <h1>已下架</h1>
        <?php
        $link = mysqli_connect('localhost', 'root', '', 'phpproject2');

        // if (isset($_POST['o_id']) && isset($_POST['o_finish'])) {
        //     $o_id = $_POST['o_id'];
        //     $o_finish = $_POST['o_finish'];

        //     $updateQuery = "UPDATE orders SET o_finish='$o_finish' WHERE o_id='$o_id';";
        //     mysqli_query($link, $updateQuery);
        // }

        $SQL = "SELECT *from topic where t_exist='0'";


        $result = mysqli_query($link, $SQL);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table4_12'>";
            echo "<tr>";

            echo "<td class='hidden'>&emsp;&emsp; </td>";

            echo "<td class='header-cell' ;> &emsp; 編號&emsp; </td>";
            echo "<td class='header-cell'>&emsp;名稱 &emsp;</td>";
            echo "<td class='header-cell'>&emsp; 人數&emsp; </td>";
            echo "<td class='header-cell'>&emsp; &emsp;&emsp; 價格&emsp; &emsp;&emsp; </td>";
            echo "<td class='header-cell'>&emsp; &emsp;時長 &emsp;&emsp;  </td>";
            echo "<td class='header-cell'>&emsp;難度&emsp; </td>";
            // echo "<td class='header-cell'>&emsp;資訊&emsp; </td>";
            echo "<td class='header-cell'>&emsp;種類&emsp; </td>";
            echo "<td class='header-cell'>&emsp; &emsp; 狀態&emsp; &emsp;  </td>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                $t_id = $row['T_ID'];
                $t_name = $row['T_name'];
                $t_number = $row['T_number'];
                $t_price = $row['T_price'];
                $t_long = $row['T_long'];
                $t_star = $row['T_star'];
                $t_information = $row['T_information'];
                $k_id = $row['K_ID'];
                $t_exist = $row['t_exist'];



                echo "<tr>";
                echo "<td class='hidden'>&emsp;&emsp; </td>";

                echo "<td class='cell'>&emsp; $t_id &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_name &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_number &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_price &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_long &emsp; </td>";
                echo "<td class='cell'>&emsp; $t_star &emsp; </td>";
                // echo "<td class='cell'>&emsp; $t_information &emsp; </td>";
                echo "<td class='cell'>&emsp; $k_id &emsp; </td>";
                echo "<td class='cell'>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='t_id' value='$t_id'>";
                echo "<select name='t_exist' onchange='this.form.submit()'>";
                echo " &emsp;<option value='0'" . ($t_exist == '0' ? ' selected' : '') . ">下架</option>";
                echo " &emsp;<option value='1'" . ($t_exist == '1' ? ' selected' : '') . ">上架</option>";
                echo "</select>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='nothing'>目前沒有資料。</p>";
        }

        mysqli_close($link);
        ?>
    </div>
</body>

</html>