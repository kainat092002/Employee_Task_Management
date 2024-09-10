<?php
    session_start();
include('../includes/connection.php');
if(isset($_POST['create_task'])){
    $query = "insert into tasks values(null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task Created Successfully');
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
// Function to fetch total tasks with status = 'Not Started' from the 'tasks' table
function getTotalTasks($connection) {
    $sql = "SELECT COUNT(*) as totalTasks FROM tasks WHERE status = 'Not Started'";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['totalTasks'];
    } else {
        return 0;
    }
}

// Fetch total tasks count
$totalTasks = getTotalTasks($connection);


// Function to fetch total users
function getTotalUsers($connection) {
    $sql = "SELECT COUNT(*) as totalUsers FROM users";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['totalUsers'];
    } else {
        return 0;
    }
}
$totalUsers = getTotalUsers($connection);

// Function to fetch total users
function getTotalApplications($connection) {
    $sql = "SELECT COUNT(*) as totalApplication FROM leaves WHERE status = 'No Action'";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['totalApplication'];
    } else {
        return 0;
    }
}
$totalApplication = getTotalApplications($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!--External CSS file-->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!----===== Iconscout CSS ===== -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Total Users</span>
                        <span class="number"><?php echo $totalUsers; ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Total Pending Tasks</span>
                        <span class="number"><?php echo $totalTasks; ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-file-question-alt"></i>
                        <span class="text">Leave Applications</span>
                        <span class="number"><?php echo $totalApplication ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Instruction for Admin</span>
                </div>

                <div class="activity-data">
                   <h4>1.All employees should mark their attendance daily.</h4>
                   <h4>2.Everyone must complete the task assigned to them.</h4>
                   <h4>3.Kindly maintain decorum of the office.</h4>
                   <h4>4.Keep the office area neat and clean.</h4>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/script.js"></script>
</body>
</html>