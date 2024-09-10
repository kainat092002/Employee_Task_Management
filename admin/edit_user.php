<?php
    session_start();
    include('../includes/connection.php');
    
    // Check if the form is submitted
    if(isset($_POST['edit_user'])){
        // Retrieve form data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        
        // Update query
        $query = "UPDATE users SET name = '$name', email = '$email', mobile = '$mobile' WHERE uid = $id";
        $query_run = mysqli_query($connection, $query);
        
        // Check if query executed successfully
        if($query_run){
            echo "<script type='text/javascript'>
                alert('User Updated Successfully');
                window.location.href = 'admin_dashboard.php';
                </script>"; 
        } else {
            echo "<script type='text/javascript'>
                alert('Error! Please try again');
                window.location.href = 'admin_dashboard.php';
                </script>"; 
        }
    }

    // Fetch user information based on the user ID from URL parameter
    $user_id = $_GET['id'];
    $query = "SELECT * FROM users WHERE uid = $user_id";
    $query_run = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($query_run);
?>

<!DOCTYPE html>
<html lang="en">
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
            <div class="col-md-4 m-auto" >
                <br>
                <center><h2>Edit User</h2><br></center>
                
                <form action="" method="post">
                    <?php
                        if($row) {
                    ?>
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['uid']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Name:</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label class="mb-2">Email:</label>
                        <input type="email" class="form-control mb-4" name="email" value="<?php echo $row['email']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label class="mb-2">Mobile No.:</label>
                        <input type="text" class="form-control mb-4" name="mobile" value="<?php echo $row['mobile']; ?>" required>
                    </div><br>
                    <input type="submit" class="btn btn-success" name="edit_user" value="Update">
                    <?php
                        }
                    ?>
                </form><br>
            </div>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>
