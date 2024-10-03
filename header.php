<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">





    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/lightbox.css">

    <!-- new -->
    <style>
        .nav li.active a {
            color: orange;
        }
    </style>
</head>

<body style="background-color:gray">
    <!-- Sub Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8">
                    <div class="left-content">
                        <p style="margin-top:5px; margin-left:-30px">
                            聯絡資訊: &emsp; 電話: &nbsp; 0912-345-678 &emsp; 地址: &nbsp; 811高雄市楠梓區高雄大學路700號 &emsp; 信箱:&nbsp; @mail.nuk.edu.tw &emsp;
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="right-icons" style="color:white;">

                        <ul>
                            <?php
                            @session_start();
                            $link = @mysqli_connect('localhost', 'root', '', 'phpproject2');;
                            mysqli_set_charset($link, "utf8");

                            if (isset($_SESSION['login'])) {
                                if (isset($_SESSION['login'])) {
                                    echo "您好";
                                    // if ($_SESSION['login'] == 'user') {
                                    //     $SQL = "SELECT C_NAME FROM CUSTOMER ";

                                    //     if ($result = mysqli_query($link, $SQL)) {
                                    //         $row = mysqli_fetch_assoc($result);
                                    //         echo "您好  " . $row['C_NAME'];
                                    //     } else {
                                    //         echo "search error";
                                    //     }
                                    // }
                                    // if ($_SESSION['login'] == 'admin') {
                                    //     $SQL = "SELECT E_name FROM EMPLOYEE ";

                                    //     if ($result = mysqli_query($link, $SQL)) {
                                    //         $row = mysqli_fetch_assoc($result);
                                    //         echo "您好  " . $row['E_name'];
                                    //     } else {
                                    //         echo "search error";
                                    //     }
                                    // }
                                }
                            }
                            ?>
                            <li>
                                <script>
                                    //if (isset($_SESSION['login'])) {
                                    function confirmLogout() {
                                        var logout = confirm("您確定要登出嗎？");
                                        if (logout) {
                                            // 使用者選擇登出，執行登出操作
                                            window.location.href = "logout.php"; // 將此處的 "logout.php" 替換為處理登出的程式檔案的路徑
                                        } else {
                                            // 使用者選擇取消登出
                                            // 可以根據需要執行其他操作或顯示提示訊息
                                        }
                                    }
                                    //}
                                </script>
                                <?php
                                if (isset($_SESSION['login'])) {
                                    echo "<button onclick='confirmLogout()'>登出</button>";
                                } ?>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section <?php if (!isset($_SESSION['login']) && !isset($_GET['page'])) echo 'active'; ?>"><a href="index.php#" onclick="setActiveLink(this)">首頁</a></li>
                            <li class="<?php if (isset($_GET['page']) && $_GET['page'] === 'meetings') echo 'active'; ?>"><a href="index.php#meetings" onclick="setActiveLink(this)">熱門介紹</a></li>
                            <li class="<?php if (isset($_GET['page']) && $_GET['page'] === 'topic') echo 'active'; ?>"><a href="topic.php" onclick="setActiveLink(this)">遊戲介紹</a></li>
                            <?php
                            if (isset($_SESSION["login"])) {
                                if ($_SESSION["login"] == "user") {
                                    echo "<li class='scroll-to-section'><a href='history.php' onclick='setActiveLink(this)'>歷史訂單</a></li>";
                                    echo "<li class='scroll-to-section'><a href='cus.php' onclick='setActiveLink(this)'>會員資料</a></li>";
                                }
                                if ($_SESSION["login"] == "admin") {
                                    echo "<li class='scroll-to-section'><a href='manageorder.php' onclick='setActiveLink(this)'>管理訂單</a></li>";
                                    echo "<li class='scroll-to-section'><a href='admin.php' onclick='setActiveLink(this)'>後臺管理</a></li>";
                                }
                            } else {
                                echo "<li class='scroll-to-section'><a href='login.php' onclick='setActiveLink(this)'>立即登入</a></li>";
                            }
                            ?>
                        </ul>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <script>
        function setActiveLink(element) {
            // 移除所有選單項目的 active 類別
            var menuItems = document.querySelectorAll(".nav li");
            for (var i = 0; i < menuItems.length; i++) {
                menuItems[i].classList.remove("active");
            }

            // 為點擊的選單項目添加 active 類別
            element.parentNode.classList.add("active");

            // 讓點擊的連結所對應的文字選項變為橘色
            var linkId = element.getAttribute("id");
            var textOption = document.querySelector(".nav li a#" + linkId);
            textOption.style.color = "orange";
        }
    </script>

</body>

</html>