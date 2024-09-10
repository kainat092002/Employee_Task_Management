<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .lform form input[type=date]{
    width: 100%;
    padding: 5px 8px;
    background-color: transparent;
    border: 1px solid var(--input-border-color);
    color: var(--text-color);
    border-radius: 5px;
}
    </style>
</head>

<body>
    
    <div class="lform" style="padding:5% 20%;">
        <center><h2 >Create a new task</h2><br></center>
        <div class="row">
        <div class="col-md-6">
        <form action="" method="post">
            <div class="form-group">
              <label class="mb-2">Select user:</label><br>
              <select class="form-control mb-4" name="id">
                <option>-Select-</option>
                <?php
                include('../includes/connection.php');
                $query = "select uid,name from users";
                $query_run = mysqli_query($connection,$query);
                if(mysqli_num_rows($query_run)){
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <option value="<?php echo $row['uid'];?>"><?php echo $row['name']; ?>

                        </option>
                        <?php 
                    }
                }
                ?>
              </select>
            </div><br>
            <div class="form-group">
                <label class="mb-2">Description:</label>
                <textarea class="form-control mb-4"  rows="5"  name="description" placeholder="Mention the task"></textarea>
            </div><br>
            <div class="form-group">
                <label class="mb-2">Start date:</label>
                <input type="date" class="form-control mb-4" name="start_date">
            </div><br>
            <div class="form-group">
                <label class="mb-2">End date:</label>
                <input type="date" class="form-control mb-4" name="end_date">
            </div><br>
            <input type="submit" class="btn btn-success" name="create_task" value="Create">
        </form>
        </div>
    </div>
    </div>
</body>
</html>