<?php
    //This file is used to add new tasks to database after clicking add button in the add new page. Completion status for new tasks is set to 0 (not completed) as default.
    //Updated it to use prepared statements instead of mysqli_real_escape_string.
    
    include_once 'database.php';
    //add database connection

    
    if(isset($_POST['submit']))
    {
        $taskTitle = htmlspecialchars($_POST['taskTitle']);   
        $taskDescription = htmlspecialchars($_POST['taskDescription']);
        
        $sql = "INSERT INTO tasks (title, descriptions) VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL error";
        } else{
            mysqli_stmt_bind_param($stmt, "ss", $taskTitle, $taskDescription);
            mysqli_stmt_execute($stmt);
        }

        header("Location: ../public/index.php?tasksubmittedsuccessfully&taskTitle=".$taskTitle);
        exit();   
    }
?>