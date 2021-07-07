<!-- This is the main page of the website. Here the user can see all his tasks. From here the user can do some actions, for example, he can change the state of the task by clicking the checkbox, he can also create new tasks by clicking "add new" button or he can click the edit button on a specific task if he would like make some changes. Deleting is available from editing window. -->
<?php
    require_once '../includes/database.php';
    require_once '../includes/taskDate.php'; //taskDate is used to display how long ago the task was created.
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="navbar">
        <h1><a href="index.php">To do list</a></h1>
    </div>


    <div class="task-containers">       
        <?php 
                
        $sql = "SELECT * FROM tasks;";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if($rowCount > 0)
        {
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="individual-tasks">
                <div class="left-col">                    
                    <div class="CB-title" onclick ="window.location = `../includes/completeTask.php?id='<?= $row['id'] . '\'`';?>">
                        <input type="checkbox" id="check" class="CB" <?php echo ($row['completion']==1 ? 'checked' : '');?>>
                        <h2><?php echo $row['title']; ?></h2>
                    </div>                                    
                    <p>Task description:</p>                    
                    <h3><?php echo $row['descriptions']; ?></h3>
                </div>
                <div class="right-col">
                    <h3><?php echo daysAgo($row['date']);?></h3>
                    <?php
                        echo "<a href = 'editTask.php?id=" . $row['id'] . "'>Edit</a>";
                    ?>
                </div>           
            </div>
        <?php 
            }
        }
        else
        {
            echo "no results found";
        } 
        ?>

            
    </div>

    <div class="AN-btn-container">
        <a href="addNew.php" class="AN-btn">Add new</a>
    </div>


</body>
</html>