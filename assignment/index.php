<?php
//starts the session
session_start();

// Check whether the email is stored in the session or not
if (isset($_SESSION['email'])) {

    // obtain the email from the session
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
				<li><a href="index.php">Latest Articles</a></li>
				<li><a href="#">Select Category</a>						
	<ul>
		<?php
		//includes the database connection file
			require 'connection.php';
			//selects category tabel from database
			$inquire = "SELECT * FROM category";
			//prepares executes and fetches the query
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
				<h1>Latest Articles</h1>
				<br><br>
			<?php
				//connects to database
					include 'connection.php';
						//prepares and executes the SELECT statement
						$sqlStatement = $connects->prepare("SELECT title, publishDate FROM article ORDER BY publishDate DESC LIMIT 10");
						$sqlStatement->execute();
							//fetches the result of the executed system
						$fetchResult = $sqlStatement->fetchAll();
					
						//using for each loop to to loop through the result array
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
