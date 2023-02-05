<?php
ob_start();

//starting the session
session_start();

// Shows all the syntax errors or errors occurred
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Includes the database connection file
include 'connection.php';

// it gets the category data from the category table of database(as1)
$dbs = "SELECT * FROM category";
$fetchResult = $connects->query($dbs);
$categories = $fetchResult->fetchAll();

// it checks whether the edit key exists in the $_GET array or not
if (isset($_GET['edit'])) {

    // retrieves the id of the article to be edited
    $id = $_GET['edit'];

    // retrieves the article data from the article table
    $dbs = "SELECT * FROM article WHERE categoryId = $id";
    $fetchResult = $connects->query($dbs);
    $article = $fetchResult->fetch();
}
 // Check if the id is set in the URL
 if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
if (isset($_POST['submit'])) {
    // obtains the values from the form
    $title = $_POST['title'];
    $content = $_POST['content'];

    // SQL statement to update the article
    $dbs = "UPDATE article SET title = '$title', content = '$content' WHERE categoryId = $id";

    // Execute the SQL statement
    $connects->query($dbs);

    // this redirects back to the adminArticles page
    header('location:adminArticles.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>Northampton News - Edit Article</title>
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
				<li><a href="adminArticles.php">Article List</a></li>
				<li><a href="addArticle.php">Add Article</a></li>
			</ul>
		</nav>
		<article>
  <h2>Edit Article</h2>
  <form action="editArticle.php?id=<?php echo $id; ?>" method="post">
    <label>Title</label>
    <input type="text" name="title" required value="<?php echo $article['title']; ?>">
    <label>Content</label>
    <textarea name="content" required><?php echo $article['content']; ?></textarea>
    <input type="submit" name="submit" value="Submit">
  </form>
</article>
</main>
		<footer>
			&copy; Northampton News 2017
		</footer>
	</body>
</html>
