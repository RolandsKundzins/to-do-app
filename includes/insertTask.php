<?php
    include_once 'database.php';
    //add database connection

    
if(isset($_POST['submit']))
{
    $taskTitle = $_POST['taskTitle'];
    $taskDescription = $_POST['taskDescription'];
    
    if(empty($taskTitle))
    {
        header("Location: ../addNew.php?error=emptyfields");
        exit();
    }
    else
    {

        $sql = "INSERT INTO tasks (title, descriptions) VALUES ('$taskTitle', '$taskDescription');";
        mysqli_query($conn, $sql);

        header("Location: ../index.php?tasksubmittedsuccessfully&taskTitle=".$taskTitle);
        exit();
    }    
}

 
/*
else
{
    $sql = "SELECT title FROM tasks WHERE title = ?"
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../addNew.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $taskTitle); //s is for string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);

        if($rowCount > 0)
        {
            header("Location: ../addNew.php?error=taskalreadyadded");
            exit();
        }
        else
        {
            $sql = "INSERT INTO tasks (title, description) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../addNew.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ss", $taskTitle, $taskDescription); //s is for string
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
        }

    }
}
*/

?>