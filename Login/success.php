<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Document</title>
  <meta http-equiv="cache-control" content="no-cache"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="../css/style.css">
  <link rel="stylesheet" media="screen" href="style.css">
</head>
<body>
<!-- particles.js container -->
<div id="particles-js">
  <div id="profile">
    <div id="profile-pic">
      <?php
      $myfile = fopen("../text.txt", "a+") or die("Unable to open file!");
      if (filesize("../text.txt") != 0) {
        while (!feof($myfile)) {
          $checkUser = explode(" ", fgets($myfile));
          if ($_GET["username"] == $checkUser[0] && (isset($checkUser[7]))) { ?>
          <img id="photo" src="<?php echo $checkUser[7]; ?>">
          <?php break;}
        }
      }
      fclose($myfile);
      ?>
    </div>
    <p><?php echo $checkUser[1]." ".$checkUser[2]; ?></p>
    <a href="../index.php"><button>Logout</button></a>
  </div>
</div>

<!-- scripts -->
<script src="../particles.js"></script>
<script src="../js/app.js"></script>
</body>
</html>
