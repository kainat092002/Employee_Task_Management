<?php
session_start();
if(isset($_SESSION['email'])){
   include('includes/connection.php');
?>
<html lang="en">
<body>
    <center><h2 style="margin-top: 5%">Your Leave Applications</h2></center><br>
    <table class="table">
    <tr>
        <th>S.No</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Status</th>
    </tr>
    <?php
    $sno = 1;
    $query = "SELECT * FROM leaves WHERE uid = $_SESSION[uid]";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $status_color = '';
        // Set background color based on status
        switch ($row['status']) {
            case 'Approved':
                $status_color = '#28a745';
                break;
            case 'Rejected':
                $status_color = '#dc3545';
                break;
            case 'No Action':
                $status_color = '#007bff';
                break;
            default:
                $status_color = ''; // Default color
        }
        ?>
        <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><a  style=" color:#fff; background-color: <?php echo $status_color; ?>"><?php echo $row['status']; ?></a></td>
        </tr>
        <?php
        $sno++;
    }
    ?>
</table>


</body>
</html>
<?php
   }
   else{
    header('Location:user_login.php');
   }