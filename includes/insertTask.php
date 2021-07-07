<?php
    //This file is used to add new tasks to database after clicking add button in the add new page. Completion status for new tasks is set to 0 (not completed) as default.
    include_once 'database.php';
    //add database connection

    
    if(isset($_POST['submit']))
    {
        $taskTitle = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['taskTitle']));   
        $taskDescription = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['taskDescription']));
        
        $sql = "INSERT INTO tasks (title, descriptions) VALUES ('$taskTitle', '$taskDescription');";
        mysqli_query($conn, $sql);

        header("Location: ../public/index.php?tasksubmittedsuccessfully&taskTitle=".$taskTitle);
        exit();   
    }


?>