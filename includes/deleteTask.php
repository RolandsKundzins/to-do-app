<?php

    include_once 'database.php';

    //if(isset($_POST['delete']))
    
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM tasks WHERE id = $id;";
    mysqli_query($conn, $sql);

    
    header("Location: ../index.php?taskdeleted&taskTitle=".$taskTitle);
    exit();

?>