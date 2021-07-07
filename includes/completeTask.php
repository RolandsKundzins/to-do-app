<?php
    //This file changes the complete state for a task. When a checkbox is clicked it saves task completion status in the database.
    include_once 'database.php';

    $id = $_REQUEST['id'];

    $sql = "SELECT completion FROM tasks WHERE id = $id;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //when the checkbox is clicked it will change the status of the completion. So if status is 1 it will change it to 0 and if it is set to 0 it will change to 1.
    if($row['completion'] == 0){  
        $completionStatus = 1;
    } else{
        $completionStatus = 0;
    }
    
    $sql2 = "UPDATE tasks SET completion = $completionStatus WHERE id = $id";
    mysqli_query($conn, $sql2);
      
    header("Location: ../public/index.php?taskCompletionChanged");
    exit();

?>