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


<?php 
    include_once 'includes/database.php';
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM tasks WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $titlePH = $row['title'];  
    $descriptionPH = $row['descriptions'];   
?>

    <div class="navbar">
        <h1><a href="index.php">To do list</a></h1>
    </div>
    
    <section class="form-AN">
        <h2>Edit</h2>
        <?php
        echo "<form action='includes/updateTask.php?id=" . $id .  "' method = 'post'>"  ?>
            <label for="Task-title">Title:</label>
            <input type="text" class="input-box title-box" name = "taskTitle" required value = '<?php echo $titlePH ?>'>

            <label for="Task-description">Description:</label>
            <textarea name="taskDescription" id="description" cols="30" rows="10" class="input-box description-box"><?php echo $descriptionPH ?></textarea>
            
            <div class="btn-box">
                <a href="index.php" class="go-back-btn">Go back</a> 
                <?php echo "<a href='includes/deleteTask.php?id=" . $id . "' class='delete-btn' name = 'delete'>Delete</a>"; ?>             
                <input type="submit" value="Save changes" class="submit-btn" name = "submit">
            </div>
        </form>
    </section>


</body>
</html>