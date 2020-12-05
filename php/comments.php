<?php
include 'connection.php';

if(isset($_POST['btn']) && $_SERVER["REQUEST_METHOD"]  === "POST")
{
   $errors = [];

   $product_id = ($_POST["product"]);

   $name = trim($_POST['name']);

   $email = trim($_POST['email']);
   
   $comment = trim($_POST['comment']);

   $regexName = "/^[\w\s]+$/";

   if(!preg_match($regexName, $name)){
       array_push($errors, $name);
   }

   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       array_push($errors, $email);
   }

   if(strlen($comment) < 6){
       array_push($errors, $comment);
   }

   if($product_id === "0"){
       array_push($errors, $product_id);
   }

   if(count($errors) == 0){
       $query = "INSERT INTO comments (name,email,text,product_id) VALUES (:name,:email,:text,:product_id)";

       $prepare = $connection->prepare($query);

       $prepare->bindParam(':name', $name);

       $prepare->bindParam(':email' ,$email);

       $prepare->bindParam(':text' ,$comment);
       
       $prepare->bindParam(':product_id' ,$product_id);

       try{
           $prepare->execute();
           header("Location:../index.php");
       }
       catch(PDOException $e){
            $e->getMessage();
       }
   }
}