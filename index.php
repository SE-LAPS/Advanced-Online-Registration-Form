<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('🙄-OOPS! Email or Password is Wrong-🙄')</script>";
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
                        <h2>LOGIN</h2>
                        <br>
                            <br>
                            <form action="" method="POST" class="login-email">

				<input type="email"  class="input-box" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			
			
				<input type="password"  class="input-box" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
		
		
				<button type="submit" name="submit" class="Submit-btn">Submit</button>

                <input type="checkbox"><span>Remember Me</span>


                <button type="button" class="btn" onclick="openRegister()"> Don't have an account? <a href="register.php">Register Here</a> </button>
                        <a href="">Frogot Password</a>
		
		<!--	<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
-->

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