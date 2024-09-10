<?php
    include('../includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <style>
    td button a{
      color:#fff;
    }
    td button a:hover{
      color:#fff;
    }
    tr th{
      padding:5px 0px;
    }
  </style>
<body>
  <center><h2 style="margin-top: 5%">All Users</h2></center><br>
  <table class="table" style=" width:100%; border-radius:6px;">
    <tr>
        <th>S.No</th>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile No.</th>
        <th>Action</th>
        
    </tr>
       <?php
          $sno = 1;
          $query = "select * from users";
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($query_run)){
            ?>
        <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $row['uid']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><a style="background-color:#007bff; color:#fff;" href="edit_user.php?id=<?php echo $row['uid']; ?>">Edit</a>&nbsp; | &nbsp; <a style="background-color:#dc3545; color:#fff;" href="delete_user.php?id=<?php echo $row['uid']; ?>">Delete</a> </td>
        </tr>
             <?php
             $sno = $sno + 1;
          }
       ?>
  </table>  
</body>
</html>