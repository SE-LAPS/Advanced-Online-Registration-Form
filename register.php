<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM login WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO login (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('❤-User Registration Completed-❤')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('😭-OOPS! Something Wrong Went-😭')</script>";
			}
		} else {
			echo "<script>alert('😴-OOPS! Email Already Exists-😴')</script>";
		}
		
	} else {
		echo "<script>alert('😥-Password Not Matching-😥')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login And Registration Form</title>
</head>


<body>

<div class="container">
		

        <div class="card">
        <div class="inner-box"   id="card">
        <div class="card-front">
                        <h2>REGISTER</h2>
                        <br>
                    
                            <form action="" method="POST" class="login-email">

		<form action="" method="POST" class="login-email">
           
				<input type="text" placeholder="Username" class="input-box" name="username" value="<?php echo $username; ?>" required>


                
			
			
				<input type="email" placeholder="Email" class="input-box" name="email" value="<?php echo $email; ?>" required>
		
			


				<input type="password" placeholder="Password" class="input-box" name="password" value="<?php echo $_POST['password']; ?>" required>
           
                



				<input type="password" placeholder="Confirm Password" class="input-box" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
		




				<button type="submit" name="submit" class="Submit-btn">Register</button>



             <!--   
			
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>

-->

            <button type="button" class="btn" onclick="openLogin()">Have an account? <a href="index.php">Login Here</a> </button>
                        <a href="">Frogot Password</a>

		</form>
	</div>
                </div>
    </div>
    </div>





<--

    <script>

var card = document.getElementById("card")

function openRegister(){
    card.style.transform ="rotateY(-180deg)";

}

function openLogin(){
     card.style.transform ="rotateY(0deg)";

}


</script>


-->
</body>
</html>