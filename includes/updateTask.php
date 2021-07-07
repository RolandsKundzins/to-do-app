<?php
    //This file is responsible for updating an existing task and saving changes in the database. 
    //I made sure to inlcude some safety precautions when saving user input with the functions htmlspecialchars() and mysqli_real_escape_string()
    include_once 'database.php';

    if(isset($_POST['submit']))
    {
        $id = $_REQUEST['id'];
        $taskTitle = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['taskTitle']));
        $taskDescription = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['taskDescription']));

        $sql = "UPDATE tasks SET title = '$taskTitle', descriptions = '$taskDescription' WHERE id = $id;";
        mysqli_query($conn, $sql);
        
        header("Location: ../public/index.php?taskchangedsuccessfully&taskTitle=".$taskTitle);
        exit();
    }
?>