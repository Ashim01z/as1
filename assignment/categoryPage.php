<?php

//starts the session
session_start();

// Check weather the email is stored in the session or note
if (isset($_SESSION['email'])) {

    // it gets the email from the session
    $email = $_SESSION['email'];
    echo "Welcome, " . $email;
} 
	//connects to the database
	require 'connection.php';

	//Selects the categoryId, title, and publishDate of articles where the categoryId is equal to the id from the GET request
	$inquire = "SELECT categoryId, title, publishDate FROM article WHERE categoryId = :id";
	//prepares, executes and fetches the query
	$sqlStatement = $connects->prepare($inquire);
	$sqlStatement->execute(array(':id' => $_GET['id']));
	$articles = $sqlStatement->fetchAll();
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
		<?php
		//connects to database
			require 'connection.php';
			//selects category table from database
			$inquire = "SELECT * FROM category";

			//prepares, executes and fetches the query
			$sqlStatement = $connects->prepare($inquire);
			$sqlStatement->execute();
			$categories = $sqlStatement->fetchAll();
			//using for each loop to fetch everything in the array 
			foreach($categories as $category) {
				echo '<li><a class="articleLink" href="categoryPage.php?id='.$category['id'].'">'.$category['name'].'</a></li>';
			}
		?>
	</ul>
</li>

			</ul>
		</nav>
		<img src="images/banners/1.jpg">
		
		<main>
	
			<nav>
				<ul>
					<!--checks whether the user is logged in or not -->
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
            <h1>Articles in this category</h1>
	<ul>
		<?php
		//using for each loop to take articles from the article table
			foreach($articles as $article) {
				echo '<li><a class="articleLink" href="articlePage.php?categoryId='.$article['categoryId'].'">'.$article['title'].'</a> - '.$article['publishDate'].'</li>';

			}
		?>
	</ul>
		
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>










    
	