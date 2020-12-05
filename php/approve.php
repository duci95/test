<?php
include  'connection.php';
if(isset($_POST['btn']) && $_SERVER["REQUEST_METHOD"]  === "POST") {

    $id = $_POST['id'];

    $query = "UPDATE comments SET approved = 1 WHERE id = :id";
    $prepare = $connection->prepare($query);

    $prepare->bindParam(":id", $id);

    try{
        $prepare->execute();
        header("Location:../admin.php");
    }
    catch(PDOException $e){
        $e->getMessage();
    }
}