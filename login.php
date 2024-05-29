<?php
session_start();
ob_start();

$username = "";
$password = "";
$error= "";

// Include database connection to check the connection.   
include "database/db.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username) || empty($password)) {
            $error = "Username and password are required.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);


            // Check the from the Plant_service table
            $query = "SELECT ps_id, ps_password, type FROM plant_service WHERE ps_id =?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                $hashed_password = $user["ps_password"];
            
                if (password_verify($password, $hashed_password)) {
                    $_SESSION["user_id"] = $user["ps_id"];
                    $_SESSION["password_hash"] = $hashed_password;
                    $_SESSION["user_role"] = $user["type"];
            
                    if ($user["type"] == "ms") {
                        header("Location: ms/index.php");
                        ob_end_flush();
                        exit;
                    }
                }
            } else{
                // Check the from the Student table
                $query = "SELECT student_id, student_password, type FROM student WHERE student_id =? AND student_password =?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();
                $result = $stmt->get_result();
            
                if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                $_SESSION["user_id"] = $user["student_id"];
                $_SESSION["user_password"] = $user["student_password"];
                $_SESSION["user_role"] = $user["type"];
            
                if ($user["type"] == "student") {
                    header("Location: student/index.php");
                    ob_end_flush();
                    exit;
                    // end of query
            }
        }else{
                // Check the from the Dean table
                $query = "SELECT dean_id, dean_password, type FROM dean WHERE dean_id =? AND dean_password =?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();
                $result = $stmt->get_result();
            
                if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                $_SESSION["user_id"] = $user["dean_id"];
                $_SESSION["dean_id"] = $user["dean_id"];
                $_SESSION["user_password"] = $user["dean_password"];
                $_SESSION["user_role"] = $user["type"];
            
                if ($user["type"] == "dean") {
                    header("Location: dean/index.php");
                    ob_end_flush();
                    exit;
                    // end of query
            }
        }else{
                    // Check the from the Admin table
                    $query = "SELECT username, password, type FROM admin WHERE username =? AND password =?";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("ss", $username, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                
                    if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    $_SESSION["user_id"] = $user["username"];
                    $_SESSION["user_password"] = $user["password"];
                    $_SESSION["user_role"] = $user["type"];
                
                    if ($user["type"] == "admin") {
                        header("Location: admin/index.php");
                        ob_end_flush();
                        exit;
                        // end of query
        }
            
        }
        else {
            $_SESSION['error'] = "Username or Password is incorrect!";
            header("Location: index.php");
            exit;
        }
    }
    }
}
}}
ob_end_flush();




?>