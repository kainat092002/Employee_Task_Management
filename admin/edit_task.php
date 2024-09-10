<?php
    session_start();
     include('../includes/connection.php');
     if(isset($_POST['edit_task'])){
        $query = "update tasks set uid = $_POST[id],description = '$_POST[description]',start_date = '$_POST[start_date]',end_date = '$_POST[end_date]' where tid = $_GET[id]";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
        alert('Task Updated Successfully');
        window.location.href = 'admin_dashboard.php';
        </script>  
        "; 
        }
        else{
            echo "<script type='text/javascript'>
        alert('Error! Please try again');
        window.location.href = 'admin_dashboard.php';
        </script>  
        "; 
        }
     }
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        textarea{
    background-color:#282828; 
    color:#b3b3b3; 
    border: 1px solid #555;
}
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETMS</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!--External CSS file-->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<!----===== Iconscout CSS ===== -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
     <!--jQuery code-->
     <script type="text/javascript">     
      $(document).ready(function(){   
        $("#create_task").click(function(){              
          $(".dash-content").load("create_task.php");
        });             
      });                                        
      $(document).ready(function(){   
        $("#manage_task").click(function(){              
          $(".dash-content").load("manage_task.php");
        });             
      });                
      $(document).ready(function(){   
        $("#view_leave").click(function(){              
          $(".dash-content").load("view_leave.php");
        });             
      });     
      $(document).ready(function(){   
        $("#view_users").click(function(){              
          $(".dash-content").load("users.php");
        });             
      });                   
    </script>                
</head>
<body>
<nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../images/tms.png" alt="">
            </div>

            <span class="logo_name">Task Management</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin_dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="#" id="view_users">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Users</span>
                </a></li>
                <li><a href="#" id="create_task">
                    <i class="uil uil-file-plus-alt"></i>
                    <span class="link-name">Create Task</span>
                </a></li>
                <li><a href="#" id="manage_task">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Manage Tasks</span>
                </a></li>
                <li><a href="#" id="view_leave">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Leave Applications</span>
                </a></li>
                
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php" id="logout_link">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-user"></i>
                <span><b>Name:</b> <?php echo $_SESSION['name']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Email:</b> <?php echo $_SESSION['email']; ?></span>
                
                
            </div>
            
            <img src="../images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
                <div class="lform">
                    <div class="col-md-4 m-auto" style="color:white;"><br>
                        <center><h2>Edit the task</h2><br></center>
                        <?php
                        
                        $query = "select * from tasks where tid = $_GET[id]";
                        $query_run = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                        <label class="mb-2">Select user:</label>
                        <select class="form-control mb-4" name="id" required>
    <option value="">-Select-</option>
    <?php
    $query1 = "SELECT uid, name FROM users";
    $query_run1 = mysqli_query($connection, $query1);
    if (mysqli_num_rows($query_run1) > 0) {
        while ($row1 = mysqli_fetch_assoc($query_run1)) {
            $selected = ($row1['uid'] == $row['uid']) ? "selected" : ""; // Check if this user is selected for this task
            echo "<option value='" . $row1['uid'] . "' $selected>" . $row1['name'] . "</option>";
        }
    }
    ?>
</select>


                        </div><br>
                        <div class="form-group">
                            <label class="mb-2">Description</label>
                            <textarea class="form-control mb-4"  rows="5" cols="50" name="description" required><?php echo $row['description']; ?></textarea>
                        </div><br>
                        <div class="form-group">
                            <label class="mb-2">Start date:</label>
                            <input type="date" class="form-control mb-4" name="start_date" value="<?php echo $row['start_date']; ?>" required>
                        </div><br>
                        <div class="form-group">
                            <label class="mb-2">End date:</label>
                            <input type="date" class="form-control mb-4" name="end_date" value="<?php echo $row['end_date']; ?>" required>
                        </div><br>
                        <input type="submit" class="btn btn-success" name="edit_task" value="Update" >
                        </form><br>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                </div>



    <script src="../js/script.js"></script>
</body>
</html>