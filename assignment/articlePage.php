<?php
// Shows all the syntax errors or errors occurred
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'connection.php';

// it gets the article id from the URL
$articleId = $_GET['categoryId'];

// now fetches the article data from the database
$articleSql = "SELECT * FROM article WHERE categoryId = :id";
$articleStmt = $connects->prepare($articleSql);
$articleStmt->execute(array(':id' => $articleId));
$article = $articleStmt->fetch();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<!-- title of the article-->
		<title><?php echo $article['title']; ?> - Northampton News</title>
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
		//conects to the database
			require 'connection.php';

			//selecting all the categeory from database
			$inquire = "SELECT * FROM category";

			//preparing executing and fetching the statement
			$sqlStatement = $connects->prepare($inquire);
			$sqlStatement->execute();
			$categories = $sqlStatement->fetchAll();

			//usign for each loop to fetch everyting  in array
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
			</nav>
			<!--passing article title and content from php-->
			<article>
				<h1><?php echo $article['title']; ?></h1>
				<p><?php echo $article['content']; ?></p>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
