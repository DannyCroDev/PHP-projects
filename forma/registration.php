<?php
if (isset($_POST['register'])) {
    // Retrieving form data
    $accountType = $_POST['account'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];


    $errors = [];

    if (empty($accountType)) {
        $errors[] = "Please select an account type.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($password)) {
        $errors[] = "Please enter a password.";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errors[] = "Password must contain at least one uppercase letter.";
    } elseif (!preg_match("/[a-z]/", $password)) {
        $errors[] = "Password must contain at least one lowercase letter.";
    } elseif (!preg_match("/[0-9]/", $password)) {
        $errors[] = "Password must contain at least one digit.";
    } elseif (preg_match("/[#?!@$%^&*-]/", $password)) {
        $errors[] = "Password cannot contain special characters.";
    }

    if (empty($gender)) {
        $errors[] = "Please select a gender.";
    }

    if (!empty($errors)) {
        echo "<script>";
        echo "alert('Registration Failed.\\n" . implode("\\n", $errors) . "');";
        echo "window.location = 'index.php';";
        echo "</script>";
        exit;
    }

    echo "<h2>Registration Successful!</h2>";
    echo "<p>Account Type: $accountType</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Name: $name</p>";
    echo "<p>Password: $password</p>";
    echo "<p>Gender: $gender</p>";
}
?>
