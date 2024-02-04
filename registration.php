<?php
session_start();
if (isset($_SESSION["user"])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSSFOLDER/style.css">
</head>
<body>

<div class="container">
<?php
if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    
    if (empty($firstname) OR empty($lastname) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
        array_push($errors,"All fields are required");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        array_push($errors,"Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
        array_push($errors,"Example: Password123#.");

    }
    if ($password!==$passwordRepeat) {
        array_push($errors,"Password does not match");
    }

    require_once "conn.php"; //THIS IS FOR CONNECTING TO DATABASE
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    $rowCount = mysqli_num_rows($result);
    if($rowCount>0) {
        array_push($errors, "Email already exists!");
    }


    if (count($errors)>0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }

    }else{

     $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)";
     $stmt = mysqli_stmt_init($conn);
     $preparestmt = mysqli_stmt_prepare($stmt);
     if ($preparestmt) {
        mysqli_stmt_bind_param($stmt,"ssss",$firstname, $lastname, $email, $passwordHash);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>Registration Successful.</div";
    }else{
        die("Something went wrong");
    }
    }
}
?>
    <form action="registration.php" method="post">

    <div class="title">
            <h1>REGISTRATION</h1>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="firstname" placeholder="First Name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>

        <div class="form-group">
        <small>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</small>  
            <input type="password" class="form-control" name="password" placeholder="Password: Ex.Password123#">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
        </div>

        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </div>

        <div class="form-group">
        <div><p>Already have an account ? <a href="login.php">Click Here</a></p></div>
        </div>

    </form>
</div>
    
</body>
</html>