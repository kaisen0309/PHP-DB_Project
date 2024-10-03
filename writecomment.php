<!DOCTYPE html>
<html>

<head>
    <title>寫評論</title>
    <style>
        body {
            background-color: #f2f2f2;
        }

        .book_container-top {
            background-color: #939393;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
            margin-top: 200px;
        }

        .book_container-top h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 100px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            resize: vertical;
        }

        .form-group input[type="submit"],
        .form-group input[type="reset"] {
            background-color: #666;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .form-group input[type="submit"]:hover,
        .form-group input[type="reset"]:hover {
            background-color: #555;
        }
    </style>
    <?php
    include("header.php");
    ?>
</head>

<body>
    <div class="book_container-top">
        <h1>寫評論</h1>
        <?php
        // TID CID要傳過來

        @$T_ID = $_SESSION['T_ID'];
        @$C_ID = $_GET['C_ID'];

        echo "<form action='writecommentCheck.php' method='post'>";
        echo "<input type='hidden' name='T_ID' value='" . $T_ID . "'>";
        echo "<input type='hidden' name='C_ID' value='" . $C_ID . "'>";
        echo "<div class='form-group'>";
        echo "<label for='comments'>請寫下評論:</label><br>";
        echo "<textarea id='comments' rows='10' cols='50' name='comments'></textarea><br/>";
        echo "<input type='submit' name='submit 'value='提交'>";
        echo "<input type='reset' value='重置'><br /><br>";

        echo "<p>親愛的顧客，</p>";
        echo "<p>感謝您光臨我們的密室逃脫店！我們衷心感謝您選擇我們的店鋪，並在這個刺激的逃脫遊戲中度過了寶貴的時光。</p>";
        echo "<p>我們非常重視您的意見和建議。如果您有任何關於遊戲體驗、佈置、服務等方面的反饋，請不要猶豫，與我們分享。我們將非常樂意聆聽您的寶貴意見，以提供更好的服務和更刺激的遊戲體驗。</p>";
        echo "</div>";

        echo "</form>";
        ?>
    </div>

</body>

</html>