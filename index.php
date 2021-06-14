<?php
    require_once 'includes/database.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
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
                    <div class="CB-title">
                        <input type="checkbox" id="check" class="CB">
                        <h2><?php echo $row['title']; ?></h2>
                    </div>               
                    <p>Task description:</p>                    
                    <h3><?php echo $row['descriptions']; ?></h3>
                </div>
                <div class="right-col">
                    <h3><?php echo $row['date']; ?></h3>
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