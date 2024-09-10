<?php
   session_start();
   if(isset($_SESSION['email'])){
   include('includes/connection.php');
   if(isset($_POST['submit_leave'])){
    $query = "insert into leaves values(null,$_SESSION[uid],'$_POST[subject]','$_POST[message]','No Action')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Form Submitted Successfully');
        window.location.href = 'user_dashboard.php';
        </script>  
        "; 
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error!Please try again');
        window.location.href = 'user_dashboard.php';
        </script>  
        "; 
    }
   }
    
   // Function to fetch total tasks assigned to the user
    function getTotalUserTasks($connection, $userId) {
        $sql = "SELECT COUNT(*) as totalUserTasks FROM tasks WHERE uid = $userId";
        $result = mysqli_query($connection, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['totalUserTasks'];
        } else {
            return 0;
        }
    }

    // Fetch total tasks count for the logged-in user
    $userId = $_SESSION['uid'];
    $totalUserTasks = getTotalUserTasks($connection, $userId);

    // Function to fetch total completed tasks assigned to the user
    function getTotalCompletedUserTasks($connection, $userId) {
        $sql = "SELECT COUNT(*) as totalCompletedUserTasks FROM tasks WHERE status = 'Completed' and  uid = $userId";
        $result = mysqli_query($connection, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['totalCompletedUserTasks'];
        } else {
            return 0;
        }
    }

    // Fetch total completed tasks count for the logged-in user
    $userId = $_SESSION['uid'];
    $totalCompletedUserTasks = getTotalCompletedUserTasks($connection, $userId);

     // Function to fetch total in-progress tasks assigned to the user
     function getTotalInProgressUserTasks($connection, $userId) {
        $sql = "SELECT COUNT(*) as totalInProgressUserTasks FROM tasks WHERE status = 'In-Progress' and  uid = $userId";
        $result = mysqli_query($connection, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['totalInProgressUserTasks'];
        } else {
            return 0;
        }
    }

    // Fetch total in-progress tasks count for the logged-in user
    $userId = $_SESSION['uid'];
    $totalInProgressUserTasks = getTotalInProgressUserTasks($connection, $userId);

    // Function to fetch total Not Started tasks assigned to the user
    function getTotalNotStartedUserTasks($connection, $userId) {
        $sql = "SELECT COUNT(*) as totalNotStartedUserTasks FROM tasks WHERE status = 'Not Started' and  uid = $userId";
        $result = mysqli_query($connection, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['totalNotStartedUserTasks'];
        } else {
            return 0;
        }
    }

    // Fetch total Not Started tasks count for the logged-in user
    $userId = $_SESSION['uid'];
    $totalNotStartedUserTasks = getTotalNotStartedUserTasks($connection, $userId);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
    <link rel="stylesheet" type="text/css" href="css/style.css">

<style>
    .dash-content .boxes .box{
    width: calc(100% / 4 - 15px);
}
</style>
    <!--jQuery code-->
    <script type="text/javascript">     
      $(document).ready(function(){   
        $("#manage_task").click(function(){              
          $(".dash-content").load("task.php");
        });             
      });                        
      $(document).ready(function(){   
        $("#apply_leave").click(function(){              
          $(".dash-content").load("leaveform.php");
        });             
      });        
      $(document).ready(function(){   
        $("#leave_status").click(function(){              
          $(".dash-content").load("leave_status.php");
        });             
      });                                                
                        
    </script>   
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/tms.png" alt="">
            </div>

            <span class="logo_name">Task Managment</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="user_dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="#" id="manage_task">
                    <i class="uil uil-clipboard-notes"></i>
                    <span class="link-name">Update Task</span>
                </a></li>
                <li><a href="#" id="apply_leave">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Apply Leave</span>
                </a></li>
                <li><a href="#" id="leave_status">
                    <i class="uil uil-file-question-alt"></i>
                    <span class="link-name">Leave status</span>
                </a></li>
                
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php" id="logout_link">
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
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-file-alt"></i>
                        <span class="text">Total Tasks</span>
                        <span class="number"><?php echo $totalUserTasks; ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-file-check-alt"></i>
                        <span class="text">Completed Tasks</span>
                        <span class="number"><?php echo $totalCompletedUserTasks; ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-file-edit-alt"></i>
                        <span class="text">In-Progress Tasks</span>
                        <span class="number"><?php echo $totalInProgressUserTasks; ?></span>
                    </div>
                    <div class="box box4">
                        <i class="uil uil-file-exclamation-alt"></i>
                        <span class="text">Not Started Tasks</span>
                        <span class="number"><?php echo $totalNotStartedUserTasks; ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Instruction for Employees</span>
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

    <script src="js/script.js"></script>
</body>
</html>
<?php
   }
   else{
    header('Location:user_login.php');
   }