<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
require('db.php');

if (isset($_REQUEST['username'])){

	$username = stripslashes($_REQUEST['username']);
	$surname = stripslashes($_REQUEST['surname']);        
	$username = mysqli_real_escape_string($con,$username); 
	$surname = mysqli_real_escape_string($con,$surname); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$confirm_password = $_POST['confirm_password'];
	$trn_date = date("Y-m-d H:i:s");
        if ($password==$confirm_password){
        $query = "INSERT into `users` (username, surname, password, email, trn_date)
VALUES ('$username', '$surname', '".md5($password)."', '$email', '$trn_date')";
        
        $result = mysqli_query($con,$query);
    }
    else {
        echo "<div class='form'>
<h3> Nebol/la si zaregistrovaný/á.</h3>
<br/>Skús to znova <a href='registration.php'>Register</a>
<br/>Najčastejšia chyba je v tom že sa heslo nezhodovalo. Daj si pozor!</div>";
    }

        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
    <div class="form">
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="text" name="surname" placeholder="Surname" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="confirm_password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>
        <p>Not registered yet? <a href='login.php'>Login here!</a></p>
    </div>
    <?php 
    }
     ?>
</body>

</html>