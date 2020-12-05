<?php

include "connection.php";

function getProducts()
{
	
    global $connection;

    $query = "SELECT * FROM products";

    $result = $connection->query($query)->fetchAll();
	   
    return $result;
	
}

function getComments()
{
	
    global $connection;
    $query = "SELECT name, email, text, title FROM products p INNER JOIN comments c ON p.id = c.product_id WHERE approved = 1";
    $result = $connection->query($query)->fetchAll();
    return $result;
	
}

function getCommentsForApproval()
{
	
    global $connection;
    $query = "SELECT c.id, name, email, text, title FROM products p INNER JOIN comments c ON p.id = c.product_id WHERE approved = 0";
    $result = $connection->query($query)->fetchAll();
    return $result;
	
}