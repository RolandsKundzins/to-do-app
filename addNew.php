<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New To Do</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <h1><a href="index.php">To do list</a></h1>
    </div>
    
    <section class="form-AN">
        <h2>Add new</h2>
        <form action="includes/insertTask.php" method = "post">
            <label for="Task-title">Title:</label>
            <input type="text" class="input-box title-box" name = "taskTitle" required>

            <label for="Task-description">Description:</label>
            <textarea name="taskDescription" id="description" cols="30" rows="10" class="input-box description-box"></textarea>
            
            <div class="btn-box">
                <a href="index.php" class="go-back-btn">Go back</a>               
                <input type="submit" value="Add" class="submit-btn" name = "submit">
            </div>
        </form>
    </section>

</body>
</html>