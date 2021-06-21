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
            <?php
            $names = ["username", "fname", "lname", "age", "email", "password", "verifyPassword", "phone"];
            $types = ["text", "text", "text", "text", "text", "password", "password", "text", ];
            $placeholders = ["Enter your username...", "Enter your first name...", "Enter your last name...",
                            "Enter your age...", "Enter your email...", "Enter your password...", "Verify your password...", "Enter your phone number..."];
            $errors = ["usernameError", "firstNameError", "lastNameError", "ageError", "emailError", "passError", "verifyPassError", "phoneError"];
            for ($i = 0; $i < 8; $i++) { ?>
                <input type='<?php echo $types[$i];?>' name='<?php echo $names[$i];?>' placeholder='<?php echo $placeholders[$i] ?>' value='<?php
            if (isset($_GET[$names[$i]])) {
                echo $_GET[$names[$i]];
            }
            ?>'>
            <?php if (isset($_GET[$errors[$i]])) { ?>
            <div class="error">* <?php echo $_GET[$errors[$i]];?></div>
            <?php }
            } ?>
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
