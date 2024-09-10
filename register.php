<?php
   include('includes/connection.php');
   if(isset($_POST['userRegistration'])){
    $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
       echo "<script type='text/javascript'>
       alert('User registered successfully!');
       window.location.href = 'index.php';
       </script>
       ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error...Please try again!');
        window.location.href = 'register.php';
        </script>
        "; 
    }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS  |  Register Page</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!----===== Iconscout CSS ===== -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/tms.png" alt="">
            </div>

            <span class="logo_name">Task Management</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Home</span>
                </a></li>
               
            </ul>
            
            <ul class="logout-mode">
                

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
                <span></span>
                
                
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
                <div class="lform">
                    
                    <center><h2 style="margin-bottom: 45px;">User Registration</h2></center>
                    <form action="" method="post"><br>
                    <div class="form-group mb-4">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div><br>
                        <div class="form-group mb-4">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div><br>
                        <div class="form-group mb-4">
                            <label>Create a Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div><br>
                        <div class="form-group mb-4">
                            <label>Mobile No.:</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                        </div><br>
                        <div class="form-group mb-4">
                            <input type="submit" style="background-color: #6E61FE;" name="userRegistration" value="Register" class="btn btn-warning">
                        </div><br>
                    </form>
                   
                    </div>
                
        </div>


        <script src="js/script.js"></script>
</body>
</html>