<html>

<head>
    <?php
    include("header.php");
    ?>
</head>

<body>
    <!-- 修改intro -->
    <form action='updateIntroCheck.php' method='post'>

        <?php


        echo "<br><br><br><br><div>";
        $link = @mysqli_connect('localhost', 'root', '', 'phpproject2');
        mysqli_set_charset($link, "utf8");
        $SQL = "SELECT home_intro FROM intro";
        if ($result = mysqli_query($link, $SQL)) {
            $row = mysqli_fetch_assoc($result);
            $home_intro = $row['home_intro'];
        }

        echo "home_intro:<br><textarea rows='10' cols='50' name='home_intro' >" . $home_intro . "</textarea><br/>";

        echo "</div>";
        ?>
        <input type='submit'>
    </form>
    <!-- 修改intro end-->

</body>

</html>