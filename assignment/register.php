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
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>

			<article>
				<h2>REGISTER</h2>
				
				<form action="register.php" method="post">
					<label>E-mail</label> <input type="text" name="email"/>
					<label>	Name</label> <input type="text" name="username"/>
					<label>Password</label> <input type="password" name="password"/>
					<input type="submit" name="submit" value="Register"/>
				</form>

			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>

<?php
//including the connection file
require_once 'connection.php';
//checking whether the submit button was clicked or not
if (isset($_POST['submit'])) {
	//assigning values from the form inputs to variables
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
//preparing sqlquery with placeholders for data
  $dbs = "INSERT INTO registers (email, name, password) VALUES ('$email', '$username', '$password')";

  //using prepared query to execute thea SQL query and insert data
    $sqlStatement = $connects->prepare($dbs);
    $sqlStatement->execute();
    echo "New record created successfully";

  
}
?>
