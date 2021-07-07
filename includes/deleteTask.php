<?php
    //This file is responsible for deleting a task and saving changes in the database. This file is called when the user clicks the delete button which is located in the editing window.
    include_once 'database.php';

    
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM tasks WHERE id = $id;";
    mysqli_query($conn, $sql);

    
    header("Location: ../public/index.php?taskdeleted&taskTitle=".$taskTitle);
    exit();

?>