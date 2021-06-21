<?php
$checkUser = 0;
$myfile = fopen("../text.txt", "a+") or die("Unable to open file!");
if (filesize("../text.txt") != 0) {
    while (!feof($myfile)) {
        $check = explode(" ", fgets($myfile));
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $warning = "Incorrect password or username!";
        } else {
            if ($_POST["username"] === $check[0] && $_POST["password"] === $check[5]) {
                $checkUser++;
            }
        }
    }
    if ($checkUser == 0) {
        $warning = "Incorrect password or username!";
    } else {
        $success = "Authorization was successful!";
    }
} else {
    $warning = "Incorrect password or username!";
}
fclose($myfile);

if (isset($warning)) {
    $link = "index.php?warning=".$warning;
} else {
    $link = "success.php?username=".$_POST["username"];
}

header("Location: ".$link);

?>
