<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <?php
    include("header.php");
    ?>
</head>

<body>

</body>

<body style="height:1100px">

    <form action="enrolladdcheck.php" method="post">
        <style>
            .book_container-top {
                background-color: #939393;
                margin: 0px 500px 0px 500px;
                padding: 15px;
                border-radius: 20px;
                font-weight: bold;
            }

            .book_container-top {
                background-color: #939393;
                margin: 109px 440px 10px 440px;
                padding: 15px;
                border-radius: 20px;
                font-weight: bold;
            }

            .input-top {
                background-color: #D3D3D3;
                width: 350px;
                padding: 12px 0px 12px 10px;
                margin: 400px 700px 0px 220px;
                font-size: 20px;
                font-weight: bold;
            }

            .input-left {
                background-color: #D3D3D3;
                width: 350px;
                padding: 12px 0px 12px 10px;
                margin: 10px 700px 0px 220px;
                font-size: 20px;
                font-weight: bold;
            }

            .input-right {
                background-color: #D3D3D3;
                width: 350px;
                padding: 12px 0 12px 10px;
                margin: 109px 220px 0px 700px;
                font-size: 20px;
                font-weight: bold;
            }

            .form-group {
                margin-bottom: 10px;
                display: flex;
                align-items: center;
            }

            .form-group label {
                flex-basis: 100px;
                font-weight: bold;
                padding-right: 10px;
                text-align: right;
            }

            .form-group input[type="text"],
            .form-group input[type="number"],
            .form-group input[type="email"],
            .form-group input[type="radio"],
            .form-group select {
                flex-grow: 1;
                padding: 5px;
                border-radius: 20px;
                border: 1px solid #ccc;
            }

            .form-group select .form-group select {
                height: 30px;
                margin-top: 109px;
            }


            .test input[type="radio"] {
                display: none;
            }

            .test input:checked+.button {
                background: #5e7380;
                color: #fff;
                cursor: default;
            }

            .test .button {
                display: inline-block;
                margin: 0 5px 10px 0;
                padding: 5px 10px;
                background: #f7f7f7;
                color: #333;
                cursor: pointer;
            }

            .test .button:hover {
                background: #bbb;
                color: #fff;
            }

            .test .round {
                border-radius: 5px;
            }


            .submit-btn {
                margin-top: 10px;
                text-align: right;
            }

            .submit-btn input[type="submit"] {
                padding: 10px 20px;
                border: none;
                border-radius: 20px;
                background-color: white;
                color: black;
                font-weight: bold;
                cursor: pointer;
                margin-right: 580px;
            }

            .submit-btn input[type="submit"]:hover {
                background-color: black;
                color: white;
            }
        </style>

        <div>
            <form action="" method="POST">
                <div class="book_container-top">
                    <div class="form-group">
                        <label for="name">*姓名:</label>
                        <input type="text" name='C_name' required><br>
                    </div>
                    <div class="form-group">
                        <label for="sex">*性別:</label>
                        <input type="radio" name="C_sex" value="male" required>男生
                        <input type="radio" name="C_sex" value="female">女生<br>
                    </div>
                    <div class="form-group">
                        <label for="phone">*電話:</label>
                        <input type="text" name='C_phone' required><br>
                    </div>
                    <div class="form-group">
                        <label for="email">*電子郵件:</label>
                        <input type="email" name='C_mail' required><br>

                    </div>
                    <div class="form-group">
                        <label for="password">*密碼:</label>
                        <input type="text" name='C_password' required><br>
                    </div>
                </div>
                <div class="submit-btn">
                    <input type="submit" value="送出">
                </div>
        </div>
    </form>
    </div>
</body>

</html>