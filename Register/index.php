<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" media="screen" href="../css/style.css">
    <style>
        body {
            margin: 0 auto;
        }
        .register {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-content: center;
            width: 300px;
            margin: auto;
            margin-top: 170px;
        }
        a {
            display: block;
            color: black;
            text-decoration: none;
        }
        input {
            margin-top: 10px;
            width: 15vw;
            height: 3vh;
        }
        .buttons {
            margin-top: 10px;
            width: 295px;
            height: 3vh;
            cursor: pointer;
        }
        .error {
            font-size: 15px;
            color: red;
        }
    </style>
</head>
<body>
<div id="particles-js">
    <div class="register">
        <form method="POST" action="register.php" enctype="multipart/form-data">
            <?php if(isset($_GET["regSuccess"])) { ?>
                <script>alert("რეგისტრაცია წარმატებით გაიარეთ!")</script>
            <?php } ?>
            <input type="text" name="username" placeholder="Enter your username..." value="<?php
            if (isset($_GET["username"])) {
                echo $_GET["username"];
            }
            ?>">
            <?php if (isset($_GET["usernameError"])) { ?>
            <div class="error">* <?php echo $_GET["usernameError"];?></div>
            <?php } ?>
            <input type="text" name="fname" placeholder="Enter your first name..." value="<?php
            if (isset($_GET["fname"])) {
                echo $_GET["fname"];
            }
            ?>">
            <?php if (isset($_GET["firstNameError"])) { ?>
            <div class="error">* <?php echo $_GET["firstNameError"];?></div>
            <?php } ?>
            <input type="text" name="lname" placeholder="Enter your last name..." value="<?php
            if (isset($_GET["lname"])) {
                echo $_GET["lname"];
            }
            ?>">
            <?php if (isset($_GET["lastNameError"])) { ?>
            <div class="error">* <?php echo $_GET["lastNameError"];?></div>
            <?php } ?>
            <input type="text" name="age" placeholder="Enter your age..." value="<?php
            if (isset($_GET["age"])) {
                echo $_GET["age"];
            }
            ?>">
            <?php if (isset($_GET["ageError"])) { ?>
            <div class="error">* <?php echo $_GET["ageError"];?></div>
            <?php } ?>
            <input type="text" name="email" placeholder="Enter your email..." value="<?php
            if (isset($_GET["email"])) {
                echo $_GET["email"];
            }
            ?>">
            <?php if (isset($_GET["emailError"])) { ?>
            <div class="error">* <?php echo $_GET["emailError"];?></div>
            <?php } ?>
            <input type="password" name="password" placeholder="Enter your password...">
            <?php if (isset($_GET["passError"])) { ?>
            <div class="error">* <?php echo $_GET["passError"];?></div>
            <?php } ?>
            <input type="password" name="verifyPassword" placeholder="Verify your password...">
            <?php if (isset($_GET["verifyPassError"])) { ?>
            <div class="error">* <?php echo $_GET["verifyPassError"];?></div>
            <?php } ?>
            <input type="text" name="phone" placeholder="Enter your phone number..." value="<?php
            if (isset($_GET["phone"])) {
                echo $_GET["phone"];
            }
            ?>">
            <?php if (isset($_GET["phoneError"])) { ?>
            <div class="error">* <?php echo $_GET["phoneError"];?></div>
            <?php } ?>
            <input style="color: white;" type="file" name="profilePhoto" id="profilePhoto">
            <?php if (isset($_GET["profilePhotoError"])) { ?>
            <div class="error">* <?php echo $_GET["profilePhotoError"];?></div>
            <?php } ?>
            <input class="buttons" type="submit" value="Register" name="register">
            <button class="buttons"><a href="../index.php">Back</a></button>
        </form>
    </div>
</div>
<!-- scripts -->
<script src="../particles.js"></script>
<script src="../js/app.js"></script>
</body>
</html>
