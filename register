<?php
$checkUsername = $checkEmail = $checkPhone = 0;
$myfile = fopen("../text.txt", "a+") or die("Unable to open file!");
if (filesize("../text.txt") != 0) {
    while (!feof($myfile)) {
        $check = explode(" ", fgets($myfile));
        if (!empty($_POST["username"]) && $_POST["username"] == $check[0]) {
            $checkUsername++;
        }
        if (!empty($_POST["email"]) && $_POST["email"] == $check[4]) {
            $checkEmail++;
        }
        if (!empty($_POST["phone"]) && $_POST["phone"] == $check[6]) {
            $checkPhone++;
        }
    }
}
fclose($myfile);

$username = $fname = $lname = $age = $email = $password = $phone = "";
$usernameError = $firstNameError = $lastNameError = $ageError = $emailError = $passError
= $verifyPassError = $phoneError = $profilePhotoError = "";
$errArr = [];
$sucArr =[];

function pushError(&$errArr, $errName, $error) {
    if (!empty($error)) {
        $errArr[$errName] = $error;
    } 
}

function pushSuccess(&$sucArr, $sucName, $success) {
    if (!empty($success)) {
        $sucArr[$sucName] = $success;
    } 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameError = "Username is required";
    } else {
        if (!preg_match("/\w/", $_POST["username"])) {
            $usernameError = "Only letters and numbers are allowed";
        } elseif ($checkUsername != 0) {
            $usernameError = "This username already exists";
        } else {
            if (filesize("../text.txt") == 0) {
                $username = $_POST["username"]." ";
            } else {
                $username = "\n".$_POST["username"]." ";
            }
        }
    }
    pushError($errArr, "usernameError", $usernameError);
    pushSuccess($sucArr, "username", $username);

    if (empty($_POST["fname"])) {
        $firstNameError = "First Name is required";
    } else {
        $fname = $_POST["fname"];
        $fname = ucfirst($fname);
        $fname = modify_input($fname)." ";
    }
    pushError($errArr, "firstnameError", $firstNameError);
    pushSuccess($sucArr, "fname", $fname);

    if (empty($_POST["lname"])) {
        $lastNameError = "Last Name is required";
    } else {
        $lname = $_POST["lname"];
        $lname = ucfirst($lname);
        $lname = modify_input($lname)." ";
    }
    pushError($errArr, "lastNameError", $lastNameError);
    pushSuccess($sucArr, "lname", $lname);

    if (empty($_POST["age"])) {
        $ageError = "Age is required";
    } else {
        if (!is_numeric($_POST["age"])) {
            $ageError = "Only numbers allowed";
        } elseif (intval($_POST["age"]) < 18) {
            $ageError = "You should be over 18";
        } else {
            $age = $_POST["age"];
            $age = modify_input($age)." ";
        }
    }
    pushError($errArr, "ageError", $ageError);
    pushSuccess($sucArr, "age", $age);

    if (empty($_POST["email"])) {
        $emailError = "Email is required";
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
        } elseif ($checkEmail != 0) {
            $emailError = "User with this email is already registered";
        } else {
            $email = $_POST["email"]." ";
        }
    }
    pushError($errArr, "emailError", $emailError);
    pushSuccess($sucArr, "email", $email);

    if (empty($_POST["password"])) {
        $passError = "Password is required";
    } else {
        if (strlen($_POST["password"]) < 8) {
            $passError = "Password must be at least 8 characters in length";
        } elseif (!preg_match("/^\S*(?=\S*[a-z])(?=\S*[\W])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $_POST["password"])) {
            $passError = "Password must include one uppercase, lowercase and special characters";
        }
    }
    pushError($errArr, "passError", $passError);

    if (empty($_POST["verifyPassword"])) {
        $verifyPassError = "You must verify password";
    } else {
        if ($_POST["password"] !== $_POST["verifyPassword"]) {
            $verifyPassError = "Password don't match";
        } else {
            $password = $_POST["verifyPassword"]." ";
        }
    }
    pushError($errArr, "verifyPassError", $verifyPassError);

    if (empty($_POST["phone"])) {
        $phoneError = "Phone number is required";
    } else {
        if (strlen($_POST["phone"]) < 9) {
            $phoneError = "Invalid phone number";
        } elseif ($checkPhone != 0) {
            $phoneError = "User with this phone number is already registered";
        } else {
            $phone = $_POST["phone"];
        }
    }
    pushError($errArr, "phoneError", $phoneError);
    pushSuccess($sucArr, "phone", $phone);

    // Photo Upload System

    $target_dir = "../uploads/";
    $target_file = $target_dir.basename($_FILES["profilePhoto"]["name"]);
    $uploadOk = 0;
    $fileType = strtolower(basename($_FILES["profilePhoto"]["type"]));

    if (!empty($_FILES["profilePhoto"]["name"])) {
        $checkPhoto = getimagesize($_FILES["profilePhoto"]["tmp_name"]);
        if ($checkPhoto !== false) {
            if ($_FILES["profilePhoto"]["size"] < 500000000) {
                if ($fileType == "jpg" || $fileType == "jpeg" || $fileType == "png") {
                    if (!file_exists($target_file)) {
                        if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $target_file)) {
                        $profilePhoto = $target_file;
                        } else {
                        $profilePhotoError = "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        $profilePhotoError = "Sorry, file already exists.";
                    }
                } else {
                    $profilePhotoError = "Sorry, only JPG, JPEG & PNG files are allowed.";
                }
            } else {
                $profilePhotoError = "Sorry, your file is too large.";
            }
            $uploadOk = 1;
        } else {
            $profilePhotoError = "File is not an image.";
        }
    }
    pushError($errArr, "profilePhotoError", $profilePhotoError);
}

$data = [$username, $fname, $lname, $age, $email, $password, $phone];
$myfile = fopen("../text.txt", "a+") or die("Unable to open file!");
if ($usernameError == "" && $firstNameError == "" && $lastNameError == "" && $ageError == "" && 
$emailError == "" && $passError == "" && $verifyPassError == "" && $phoneError == "" && $profilePhotoError == "") {
    foreach ($data as $key => $value) {
        fwrite($myfile, $value);
    }
    $regSuccess = "რეგისტრაცია წარმატებით გაიარეთ!";
    if ($uploadOk == 1) {
        fwrite($myfile, " ".$profilePhoto);
    } else {
        fwrite($myfile, " ../uploads/random.png");
    }
}
fclose($myfile);

function modify_input($data) {
    $data = trim($data);
    return $data;
}

if (count($errArr) > 0) {
    $link = "index.php?".http_build_query($errArr)."&".http_build_query($sucArr);
} else {
    $link = "index.php?regSuccess=".$regSuccess;
}

header("Location: ".$link);
var_dump($errArr);
echo "<br>";
var_dump($sucArr);
echo "<br>";
echo $link;

?>
