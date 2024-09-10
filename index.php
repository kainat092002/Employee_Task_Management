<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
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
            <div class="overview">
                <div class="title">
                    <i class="uil uil-grin"></i>
                    <span class="text">Hey Welcome Back!</span>
                </div>

                <div class="boxes">
                    <a href="user_login.php" class="box box1">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Login as</span>
                        <span class="number">User</span>
                    </a>
                    <a href="admin/admin_login.php" class="box box2">
                        <i class="uil uil-user"></i>
                        <span class="text">Login as</span>
                        <span class="number">Admin</span>
                    </a>
                    <a href="register.php" class="box box3">
                        <i class="uil uil-user-plus"></i>
                        <span class="text">Register as</span>                       
                        <span class="number">New User</span>
                    </a>
                </div>
            </div>

           

              
            </div>
        </div>
    </section>


    
   


   <script src="js/script.js"></script>
</body>
</html>