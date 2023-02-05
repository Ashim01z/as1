<?php
// Shows all the syntax errors or errors occurred
//code for showing all the serrors from https://stackify.com/display-php-errors/
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Includes the database connection file
include 'connection.php';

// Gets all the categories from the category table of databse(as1)
//code to fetch data from https://www.geeksforgeeks.org/how-to-fetch-data-from-the-database-in-php/
$dbs = "SELECT * FROM category";
$fetchResult = $connects->query($dbs);
$categories = $fetchResult->fetchAll();

//code for using isset fucntion from https://www.javatpoint.com/php-isset-function
if (isset($_POST['submit'])) {
    // Gets the values from form
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryId = $_POST['category'];
    $publishDate = date("Y-m-d H:i:s");

    // SQL statement to insert into the article
    $dbs = "INSERT INTO article (title, content, categoryId, publishDate)
            VALUES ('$title', '$content', $categoryId, '$publishDate')";

    // Executes the SQL statement
    $connects->query($dbs);

    // It Redirects back to the adminArticles page
    header('location:adminArticles.php');
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
				<li><a href="adminPage.php">Home</a></li>
		</nav>
		<img src="images/banners/1.jpg">
		
		<main>
			
			<nav>
				<ul>
				</ul>
			</nav>

			<article>
				<h2>Add Article</h2>
		
					<form action="addArticle.php" method="post">
						<label>Title</label>
						<input type="text" name="title" required>

						<label>Content</label>
						<textarea name="content" required></textarea>

						<label for="categories">Choose a cateogry:</label>
						
						<select id="category" name="category">

							 <!-- It Loops through the categories and displays all of them in the dropdown menue as choices-->
							<!--code used from slide provided from university -->

							<?php foreach ($categories as $category) { ?>
							<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
							<?php } ?>
				</select>
							<!-- For submit button-->
				<input type="submit" name="submit" value="Submit">
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
