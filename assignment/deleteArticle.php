<?php
// Includes the database connection file
include 'connection.php';

// It Gets all the articles from the article table of database(as1)
$dbs = "SELECT * FROM article";
$fetchResult = $connects->query($dbs);
$articles = $fetchResult->fetchAll();

if (isset($_GET['delete'])) {
    // this gets the ID of the article which is to be deleted
    $id = $_GET['delete'];

    // SQL statement to delete the article
    $dbs = "DELETE FROM article WHERE categoryId = $id";

    // Executes the SQL statement
    $connects->query($dbs);

    // It redirects back to the adminArticles page
    header('location:adminArticles.php');
}
?>