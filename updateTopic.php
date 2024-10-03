<html>

<head>
    <?php include("header.php"); ?>
</head>

<body>
    <meta charset='utf-8'>
    <br /><br /><br><br>
    <form action='updateTopicCheck.php' method='post'>


        <?php
        $T_ID = $_GET['T_ID'];

        $link =  @mysqli_connect('localhost', 'root', '', 'phpproject2');;
        mysqli_set_charset($link, "utf8");
        $SQL = "SELECT * FROM topic WHERE T_ID=$T_ID";
        if ($result = mysqli_query($link, $SQL)) {
            $row = mysqli_fetch_assoc($result);

            $t_id = $row['T_ID'];
            $t_name = $row['T_name'];
            $t_number = $row['T_number'];
            $t_price = $row['T_price'];
            $t_long = $row['T_long'];
            $t_star = $row['T_star'];
            $t_information = $row['T_information'];
            $k_id = $row['K_ID'];
            $t_exist = $row['t_exist'];
        }

        echo "<input type='hidden' name='T_ID' value='" . $T_ID . "'><br/>";
        echo "名稱:<input type='text' size='80' name='T_name' value='" . $t_name . "'><br/><br/>";
        echo "人數:<input type='text' name='T_number' value='" . $t_number . "'><br/><br/>";
        echo "價錢:<input type='text' name='T_price' value='" . $t_price . "'><br/><br/>";
        echo "時長:<input type='text' name='T_long' value='" . $t_long . "'><br/><br/>";
        echo "難度:<input type='text' name='T_star' value='" . $t_star . "'><br/><br/>";
        echo "介紹:<br><textarea rows='10' cols='50' name='T_information' value='>" . $t_information . "'<br/></textarea><br/><br/>";
        // echo "種類:<input type='text' name='K_ID' value='" . $k_id . "'><br/><br/>";



        $link =  @mysqli_connect('localhost', 'root', '', 'phpproject2');;
        mysqli_set_charset($link, "utf8");
        $sql2 = "SELECT * FROM kind";

        if ($result2 = mysqli_query($link, $sql2)) {
            echo "遊戲種類: <br/>";
            while ($row2 = mysqli_fetch_assoc($result2)) {
                echo "<input type='radio' name='K_ID' value='K_NAME' >" . $row2['K_NAME'] . "<br/>";
            }
        }
        ?>

        <input type='submit'>

    </form>
</body>

</html>