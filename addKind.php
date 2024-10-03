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
    $K_NAME = $_POST["K_NAME"];

    // 檢查名稱是否已存在
    $sql = "SELECT * FROM kind WHERE K_NAME = '$K_NAME'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        // 名稱已存在，顯示錯誤訊息
        echo "<div style='position:absolute;top: 280px;left: 580px;'>
        <font color='red'>此主題已存在，請重新輸入。</font></div>";
    } else {
        $sql = "INSERT INTO kind (K_NAME) VALUES ('$K_NAME')";
        if ($link->query($sql) === TRUE) {
            echo "<div style='position:absolute;top: 280px;left: 580px;'>
            <font color='red'>主題新增成功。</font></div>";
        } else {
            echo "發生錯誤: " . $link->error;
        }
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

        <div style="height:420px">
            <div class='book_container-top' style='margin-top:150px'>
                <h2><b>新增主題</b></h2><br />
                主題名稱: <input type="text" name="K_NAME"><br><br>
                <input type='submit' value='新增'>
            </div>
        </div>

    </form>

</body>

</html>