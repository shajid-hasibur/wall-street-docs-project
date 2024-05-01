<?php
session_start();

require_once __DIR__ . '/../src/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = $_POST["email"];

        if (!isset($_SESSION["registered_emails"]) || !in_array($email, $_SESSION["registered_emails"])) {
            
            $_SESSION["registered_emails"][] = $email;

            $user = new User($email);

            $_SESSION["users"][$email] = $user;

            $_SESSION["message"] = "Registration successful!";
    
            header("location: movie_list.php");
            
        } else {
            $_SESSION["message"] = "Email already registered.";
            header("location: movie_list.php");
        }
    } else {
        $_SESSION["message"] = "Email is required.";
    }
} else {
    $_SESSION["message"] = "Invalid request method."; 
}
