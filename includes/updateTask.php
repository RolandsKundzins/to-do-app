<?php

    include_once 'database.php';

    if(isset($_POST['submit']))
    {
        $id = $_REQUEST['id'];
        $taskTitle = $_POST['taskTitle'];
        $taskDescription = $_POST['taskDescription'];


        $sql = "UPDATE tasks SET title = '$taskTitle', descriptions = '$taskDescription' WHERE id = $id;";
        mysqli_query($conn, $sql);
        
        header("Location: ../index.php?taskchangedsuccessfully&taskTitle=".$taskTitle);
        exit();
    }

    

?>