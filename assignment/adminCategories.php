<?php
session_start();
// it checks weather the email is stored in the session or not
if (isset($_SESSION['email'])) {

    // it gets the email from the session
    $email = $_SESSION['email'];
    echo "Welcome, " . $email;

} 

// Includes the database connection file
include 'connection.php';

// SQL query to select all the category
$dbs = "SELECT * FROM category";

// Executes the SQL query
$fetchResult = $connects->query($dbs);

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
				<li><a href="addCategory.php">Add Category</a></li>
				<li><a href="adminPage.php">Admin Home</a></li>
			</ul>
		</nav>
		<img src="images/banners/1.jpg">
		
		<main>
			<nav>
				<ul>
					<!--it checks whether the user is logged in or not if it is logged in then it shows the logout option-->
					<?php if(isset($_SESSION['email'])) { ?>
						<li><a href="logout.php">Logout</a></li>
						
						<!--if user is not logged in it shows the login and register option from where they are directed to respective page-->
					<?php } else { ?>
						<li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
					<?php } ?>
				</ul>
			</nav>

			<article>
                    <table>
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

						// this code loops usng while loop to fetch categories from the database and displays them in the table
						// code to use while loop from https://www.w3schools.com/php/php_looping_do_while.asp
                        while ($row = $fetchResult->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td><a href='editCategory.php?id=" . $row['id'] . "'>Edit</a> | <a href='deleteCategory.php?id=" . $row['id'] . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    </table>
			
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>


