<?php
   include('../includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
</head>
<body>
    <center><h2 style="margin-top: 5%">All Leave Applications</h2></center><br>
    <table class="table" tyle=" width:100%; border-radius:6px;">
      <tr>
        <th>S.NO</th>
        <th>User</th>
        <th>Subject</th>
        <th style="width:40%">Description</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <?php
       $sno = 1;
       $query = "select * from leaves";
       $query_run = mysqli_query($connection,$query);
       while($row = mysqli_fetch_assoc($query_run)){
          ?>
          <tr>
            <td><?php echo $sno; ?></td>
            <?php
            $query1 = "select name from users where uid = $row[uid] ";
            $query_run1 = mysqli_query($connection,$query1);
            while($row1 = mysqli_fetch_assoc($query_run1)){
               ?>
               <td><?php echo $row1['name']; ?></td>
               <?php
            }
            ?>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td style="width: 17%;"><a style="background-color:#28a745; color:#fff;" href="approve_leave.php?id=<?php echo $row['lid']; ?>"> Approve</a> &nbsp;| &nbsp; <a style="background-color:#dc3545; color:#fff;" href="reject_leave.php?id=<?php echo $row['lid']; ?>">Reject</a> </td>
          </tr>
          <?php
          $sno = $sno + 1;
       }
      ?>
</table>
</body>
</html>