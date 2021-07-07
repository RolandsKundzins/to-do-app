<?php
    //This file is responsible for updating an existing task and saving changes in the database. 
    //I made sure to inlcude some safety precautions when saving user input with the functions htmlspecialchars().
    //Updated it to use prepared statements instead of mysqli_real_escape_string.
    include_once 'database.php';

    if(isset($_POST['submit']))
    {
        $id = $_REQUEST['id'];
        $taskTitle = htmlspecialchars($_POST['taskTitle']);
        $taskDescription = htmlspecialchars($_POST['taskDescription']);

        $sql = "UPDATE tasks SET title=?, descriptions=? WHERE id = $id;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL error";
        } else{
            mysqli_stmt_bind_param($stmt, "ss", $taskTitle, $taskDescription);
            mysqli_stmt_execute($stmt);
        }

        header("Location: ../public/index.php?taskchangedsuccessfully&taskTitle=".$taskTitle);
        exit();
    }
?>