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
    
    <?php


?>
    <?php  
        
        
        //echo daysAgo('2021-07-07 18:30:58');
        /*
        function daysAgo($timestamp){           
            date_default_timezone_set('Europe/Riga');  
            $time_ago = strtotime($timestamp);  
            //echo date("Y-m-d H:i:s", $time_ago);
            $current_time = time(); 
            //echo date("Y-m-d H:i:s", time());
            //echo $current_time . " and time ago " . $time_ago; 
            $time_difference = $current_time - $time_ago;  
            //echo $time_difference;
            $seconds = $time_difference;  
            $minutes      = round($seconds / 60 );           // value 60 is seconds  
            $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
            $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
            $weeks          = round($seconds / 604800);          // 7*24*60*60;  
            $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
            $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
            if($seconds <= 60)  
            {  
                return "Just Now";  
            }  
            else if($minutes <=60)  
            {  
                if($minutes==1)  
                {  
                    return "one minute ago";  
                }  
                else  
                {  
                    return "$minutes minutes ago";  
                }  
            }  
            else if($hours <=24)  
            {  
                if($hours==1)  
                {  
                    return "an hour ago";  
                }    
                else  
                {  
                    return "$hours hrs ago";  
                }  
            }  
            else if($days <= 7)  
            {  
                if($days==1)  
                {  
                    return "yesterday";  
                }  
                else  
                {  
                    return "$days days ago";  
                }  
            }  
            else if($weeks <= 4.3) //4.3 == 52/12  
            {  
                if($weeks==1)  
                {  
                    return "a week ago";  
                }  
                else  
                {  
                    return "$weeks weeks ago";  
                }  
            }  
            else if($months <=12)  
            {  
                if($months==1)  
                {  
                    return "a month ago";  
                }  
                else  
                {  
                    return "$months months ago";  
                }  
            }  
            else  
            {  
                if($years==1)  
                {  
                    return "one year ago";  
                }  
                else  
                {  
                    return "$years years ago";  
                }  
            }  
        }
        */  

        
        
    ?>
</body>
</html>