<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration form - Daniel</title>
<link rel="stylesheet" href="index.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<style>
.error {
  color: red;
  font-size: 14px;
  margin-top: 5px;
}
</style>
</head>
<body>
    <div class="testbox">
        <h1>Registration</h1>
        <form action="registration.php" method="POST">
            <hr>
            <div class="accounttype">
                <input type="radio" value="personal" id="radioOne" name="account" checked/>
                <label for="radioOne" class="radio">Personal</label>
                <input type="radio" value="company" id="radioTwo" name="account" />
                <label for="radioTwo" class="radio">Company</label>
                <?php if (isset($errors['accountType'])) echo "<div class='error'>{$errors['accountType']}</div>"; ?>

            </div>
            <hr>
            <label id="icon" for="email"><i class="icon-envelope"></i></label>
            <input type="text" name="email" id="email" placeholder="Email" required/>
            <?php if (isset($errors['email'])) echo "<div class='error'>{$errors['email']}</div>"; ?>
            <label id="icon" for="name"><i class="icon-user"></i></label>
            <input type="text" name="name" id="name" placeholder="Name" required/>
            <?php if (isset($errors['name'])) echo "<div class='error'>{$errors['name']}</div>"; ?>
            <label id="icon" for="password"><i class="icon-shield"></i></label>
            <input type="password" name="password" id="password" placeholder="Password" required/>
            <?php if (isset($errors['password'])) echo "<div class='error'>{$errors['password']}</div>"; ?>

            <div class="gender">
                <input type="radio" value="male" id="male" name="gender" checked/>
                <label for="male" class="radio">Male</label>
                <input type="radio" value="female" id="female" name="gender" />
                <label for="female" class="radio">Female</label>
            </div> 
            <p>By clicking Register, you agree to our <a href="#">terms and conditions</a>.</p>
            <button type="submit" name="register" class="button">Register</button>
        </form>
    </div>
</body>
</html>
