<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" media="screen" href="../css/style.css">
    <style>
        .login {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: grid;
            align-content: center;
            justify-content: space-around;
            grid-gap: 10px;
            height: 80vh;
        }
        a {
            display: block;
            color: black;
            text-decoration: none;
        }
        input {
            width: 15vw;
            height: 3vh;
        }
        .buttons {
            width: 295px;
            height: 3vh;
        }
        #warning {
            font-size: 15px;
            text-align: center;
            color: red;
        }
        #success {
            font-size: 15px;
            text-align: center;
            color: green;
        }
    </style>
</head>
<body>
    <div id="particles-js">
        <div class="login">
            <form class="login" method="POST" action="login.php">
                <?php if (isset($_GET["warning"])) { ?>
                    <p id="warning"><?php echo $_GET["warning"]; ?></p>
                <?php } ?>
                <?php if (isset($_GET["success"])) { ?>
                    <p id = "success"><?php echo $_GET["success"]; ?></p>
                <?php } ?>
                <input type="text" name="username" placeholder="Enter your username...">
                <input type="password" name="password" placeholder="Enter your password...">
                <input class="buttons" type="submit">
                <button class="buttons"><a href="../index.php">Back</a></button>
            </form>
        </div>
    </div>
<!-- scripts -->
<script src="../particles.js"></script>
<script src="../js/app.js"></script>
</body>
</html>
