<?php
//starts the session
session_start();

// Checks if the email is stored in the session or not
if (isset($_SESSION['email'])) {

    // Gets email from the session
    $email = $_SESSION['email'];
    echo "Welcome, " . $email;
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
				<li><a href="adminArticles.php">Articles</a></li>
				<li><a href="adminCategories.php">Categories</a>						
	
</li>

			</ul>
		</nav>
		<img src="images/banners/1.jpg">
		
		<main>
		
			<nav>
				<ul>
					<!--Checks whether the user is logged in or not-->
					<?php if(isset($_SESSION['email'])) { ?>
						<!--if user is logged in it shows logout option from where the user can be logged out after clicking -->
						<li><a href="logout.php">Logout</a></li>
					<?php } else { ?>
						<li></li>
						<li></li>
						<li></li>
						<!--displays a login button if user is not logged in-->
						<li><a href="login.php">Login</a></li>
						<li></li>
						<li></li>
						<!--display register option for the new users-->
						<li><a href="register.php">New user? Register Here</a></li>
					<?php } ?>
				</ul>
			</nav>

			<article>
			<?php
			//includes the connection file
					include 'connection.php';

						//prepares and executes SELECT statement to retrieve latest 10 articles from database(as1) of article table
						$sqlStatement = $connects->prepare("SELECT title, publishDate FROM article ORDER BY publishDate DESC LIMIT 10");
						$sqlStatement->execute();
						//fetches results 
						$fetchResult = $sqlStatement->fetchAll();
					//using for each loop to loop over the data stored in $fetchResult
					foreach($fetchResult as $row) {
						echo "Title: " . $row["title"] . "<br>";
						echo "Publish Date: " . $row["publishDate"] . "<br><br>";
					}
			?>
			
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
