<?php
/*session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
    header("Location:./");
    exit;
}*/
session_start();
include 'desktop.html';
include '../DBConnection.php';

$conn = OpenCon();
?>
<?php if (isset($_GET['error'])) 
    { 
        ?>
            <center><p class="error"><?php echo $_GET['error']; ?></p></center>
        <?php 
    }
?> 
   
                  