<?php
// Starts the session
session_start();
// Includes the database connection file
include 'connection.php';
if (isset($_POST['submit'])) {

    // Gets the values from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to check whether the user exists or doesnt exists
    $dbs = "SELECT * FROM registers WHERE email = '$email' AND password = '$password'";

    // it executes the SQL query
    $fetchResult = $connects->query($dbs);

    // Checks if the user exists
    if ($fetchResult->rowCount() > 0) {
        //  if the user exists it starts a session, redirects to a page
		$_SESSION['email'] = $email;
		
		if ($email == 'admin') {
			header('location:adminpage.php');
		} else {
			header('location:index.php');
		}
    } else {
        // if the user doesn't exists then it displays the message to user
        echo "The username and password combination is incorrect.";
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Latest Articles</a></li>
				<li><a href="#">Select Category</a>
					<ul>
						<li><a class="articleLink" href="#">Category 1</a></li>
						<li><a class="articleLink" href="#">Category 2</a></li>
						<li><a class="articleLink" href="#">Category 3</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<img src="images/banners/1.jpg">
		<main>
	
			<nav>
				<ul>
					<li></li>
					<li><a href="register.php">New user? Register Here</a></li>
				</ul>
</nav>

			<article>
				<h2>LOGIN PAGE</h2>
				
				<form action="login.php" method="post">
					<label>email</label> <input type="text" name="email" />
					<label>Password</label> <input type="password" name="password" />

					<input type="submit" name="submit" value="Submit" />
</form>


			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>



