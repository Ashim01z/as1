<?php

// Includes the database connection file
include 'connection.php';

if (isset($_POST['submit'])) {
    // Gets the values from the form
    $name = $_POST['name'];
    $id = $_POST['id'];

    // SQL query to update the category
    $dbs = "UPDATE category SET name = '$name' WHERE id = $id";

    // this runs the SQL query
    $connects->query($dbs);

    // it redirects back to the adminCategories page
    header('location:adminCategories.php');
}

// obtains the category data from the database(as1)
$id = $_GET['id'];

//this line is a SQL statement to select all columns from the "category" table where the 
//"id" column matches the value stored in the "$id" variable 
$dbs = "SELECT * FROM category WHERE id = $id";

$fetchResult = $connects->query($dbs);
$category = $fetchResult->fetch();

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
				
			</ul>
		</nav>

		<article>
			<h2>Edit Category</h2>
	
			<form action="editCategory.php" method="post">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $category['name']; ?>" required>
                <input type="hidden" name="id" value="<?php echo $category['id']; ?>">

                <input type="submit" name="submit" value="Submit">
            </form>

		</article>
	</main>

	<footer>
		&copy; Northampton News 2017
	</footer>

</body>
