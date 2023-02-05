<?php 
//Shows all the syntax errors or errors occurred
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php';

// It Gets all the articles from the article table of database(as1)
$dbs = "SELECT * FROM article";
$fetchResult = $connects->query($dbs);
$articles = $fetchResult->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
        <title>Northampton News - Admin Articles</title>
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
                <li><a href="addArticle.php">Add Article</a></li>			
            </ul>
        </nav>
        <img src="images/banners/1.jpg">
        
        <main>
            <nav>
                <ul>
                    
                </ul>
            </nav>

            <article>
                <h2>Admin Articles</h2>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Publish Date</th>
                        <th>Actions</th>
                    </tr>
                    <!--using for each loop on articles to display all the articles in the list-->
                    <?php foreach ($articles as $article) { ?>
                    <tr>
                        <!-- It Displays the title and publishdate of the article-->
                        <td><?php echo $article['title']; ?></td>
                        <td><?php echo $article['publishDate']; ?></td>
                        <td>
                            <a href="editArticle.php?edit=<?php echo $article['categoryId']; ?>">Edit</a>
                            <a href="deleteArticle.php?delete=<?php echo $article['categoryId']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php 
                    } 
                    ?>
					</article>
