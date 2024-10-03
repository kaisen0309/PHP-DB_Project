<?php
// 資料庫連線設定
$link = @mysqli_connect('localhost', 'root', '', 'phpproject2');;
mysqli_set_charset($link, "utf8");

// 檢查連線是否成功
if ($link->connect_error) {
    die("連線失敗: " . $link->connect_error);
}

// 處理表單提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    // 取得使用者輸入的名稱
    $T_name = $_POST["T_name"];
    $T_photo = $_POST["T_photo"];
    // $T_photo = $_FILES["T_photo"]["name"];
    $T_number = $_POST["T_number"];
    $T_price = $_POST["T_price"];
    $T_long = $_POST["T_long"];
    $T_star = $_POST["T_star"];
    $T_information = $_POST["T_information"];
    $K_ID = $_POST["K_ID"];
    $t_exist = $_POST["t_exist"];


    // 檢查名稱是否已存在
    $sql = "SELECT * FROM topic WHERE T_name = '$T_name'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // 名稱已存在，顯示錯誤訊息
        echo "<div style='position:absolute;top: 280px;left: 580px;'>
        <font color='red'>此遊戲已存在，請重新輸入。</font></div>";
    } else {

        // 照片
        // if (isset($_FILES["topic"]) && $_FILES["topic"]["error"] == 0) {
        //     // 取得檔案資訊
        //     $file_name = $_FILES["topic"]["name"];
        //     $file_tmp = $_FILES["topic"]["tmp_name"];

        //     // 將檔案移到目標位置
        //     $target_dir = "images/"; // 檔案儲存目錄

        //     $target_path = $target_dir . $file_name;
        //     move_uploaded_file($file_tmp, $target_path);

        //     // 將檔案路徑寫入資料庫
        //     $sql = "INSERT INTO topic (T_photo) VALUES ('$target_path')";

        // 名稱不存在，將資料插入資料表
        $sql = "INSERT INTO topic (T_name, T_photo, T_number,T_price,T_long,T_star, T_information,K_ID, t_exist) 
        VALUES ('$T_name', '$T_photo','$T_number','$T_price','$T_long','$T_star', '$T_information','$K_ID', '$t_exist')";
    }
    if ($link->query($sql) === TRUE) {
        echo "<div style='position:absolute;top: 280px;left: 580px;'>
            <font color='red'>遊戲新增成功。</font></div>";
    } else {
        // echo "發生錯誤: " . $link->error;
    }
}


// 關閉資料庫連線
$link->close();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <title>新增遊戲</title>
    <?php
    include("header.php");
    ?>
</head>

<body>
    </form>
    <style>
        .book_container-top {
            background-color: #939393;
            margin: 109px 440px 10px 280px;
            padding: 15px;
            border-radius: 20px;
            font-weight: bold;
            width: 750px;
        }
    </style>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        <div>
            <div class='book_container-top' style='margin-top:150px'>
                <h2><b>新增遊戲</b></h2><br />

                遊戲名稱: <input type='text' name='T_name'> <br><br>
                遊戲照片路徑:<input type='text' name='T_photo'><br><br>


                遊戲人數: <input type='text' name='T_number'> <br><br>

                遊戲價格: <input type='text' name='T_price'> <br><br>

                遊戲時長: <input type='text' name='T_long'> <br><br>

                遊戲難度: <input type='text' name='T_star' min="1" max="5"> <br><br>

                遊戲敘述:<br /> <textarea rows='10' cols='50' name='T_information'> </textarea><br><br>

                遊戲種類: <input type='text' name='K_ID'> <br><br>


                <?php
                $link = @mysqli_connect('localhost', 'root', '', 'phpproject2');;
                mysqli_set_charset($link, "utf8");
                $sql2 = "SELECT * FROM kind";

                if ($result2 = mysqli_query($link, $sql2)) {
                    echo "遊戲種類: <br/>";
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        echo $row2['K_ID'] . "：" . $row2['K_NAME'] . "<br/>";
                    }
                }
                ?>
                <input type='hidden' name='t_exist' value='1'> <br>


                <input type='submit' value='新增'>
            </div>
        </div>

    </form>

</body>

</html>