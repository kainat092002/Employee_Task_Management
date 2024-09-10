<?php
 include('../includes/connection.php');
 $query = "delete from users where uid = $_GET[id]";
 $query_run = mysqli_query($connection,$query);
 if($query_run){
    echo "<script type='text/javascript'>
        alert('Task Deleted Successfully');
        window.location.href = 'admin_dashboard.php';
        </script>  
        "; 
 }
 else{
    echo "<script type='text/javascript'>
        alert('Error!Please try again');
        window.location.href = 'admin_dashboard.php';
        </script>  
        "; 
 }
?>