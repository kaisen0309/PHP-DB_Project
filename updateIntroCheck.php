    <!-- 修改intro check-->
    <?php

    $home_intro = $_POST['home_intro'];

    $link = @mysqli_connect('localhost', 'root', '', 'phpproject2');
    mysqli_set_charset($link, "utf8");
    $SQL = "UPDATE intro SET home_intro='$home_intro' ";
    if (mysqli_query($link, $SQL)) {
        header("Location:index.php");
    }

    ?>
    <!-- 修改intro check end-->