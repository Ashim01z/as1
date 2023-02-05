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
		<img src="images/banners/1.jpg">
		
		<main>
			<nav>
				<ul>
				<li><a href="adminPage.php">Home</a></li>
				</ul>
			</nav>

			<article>
				<h2>Add Cateogry</h2>
	
				<form action="addCategory.php" method="post">
                    <label>Name:</label>
                    <input type="text" name="name" required>
                    <input type="submit" name="submit" value="Submit">
                </form>

			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>

<?php
session_start();
// Includes the database connection file
include 'connection.php';

if (isset($_POST['submit'])) {

    // Gets the values from form
    $name = $_POST['name'];

    // SQL statement to insert the data into the database
    $dbs = "INSERT INTO category (name) VALUES ('$name')";

    // Executes the SQL statement
	
    $connects->query($dbs);
	header("location:adminCategories.php");
}

?>

