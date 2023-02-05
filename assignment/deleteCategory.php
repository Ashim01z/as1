<?php

// Includes the database connection file
include 'connection.php';

// chekcs whether the delete button has been pressed
if (isset($_GET['id'])) {

    // Gets the id of the category to be deleteted
    $id = $_GET['id'];

    // SQL query to delete the category
    $dbs = "DELETE FROM category WHERE id = $id";

    //  now executes the SQL query
    $connects->query($dbs);

    // Redirects back to the adminCategories page
    header('location:adminCategories.php');
}

?>