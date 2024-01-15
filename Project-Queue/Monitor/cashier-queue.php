<?php
include '../queue/queue.php';
$conn = OpenCon();

$sql = "SELECT id FROM transaction_table WHERE status = '2' ORDER BY created_on DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $queue_number = $row["id"];
} else {
    $queue_number = "---";
}

$sql = "Select id From transaction_table WHERE status = 1 ORDER BY created_on DESC LIMIT 5";
$result = $conn->query($sql);

$pendingList = '<ul>';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $task = $row['id'];
    $pendingList .= '<li>' . $task . '</li>';
  }
}
$pendingList .= '</ul>';
    
$conn->close();

?>


<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../css/monitor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<img class="img-position" src="../image/uc-logo-bg-160x83.c24343b851e5b064daf9.png" alt="Logo">


<div class="row">
        <div class="column left">
          <h3>Cashier</h3>
          <h3 class="number-size-h1">-</h3>
        </div>
        <div class="column middle">
          <h3>Waiting Number</h3>
          <h3 id="pendingQueue"><?php echo $pendingList; ?></h3>
        </div>
        <div class="column right">
            <div class="logout-button" action="../login/logout.php">
                <button type="submit" value = "Logout" class="btn"><i class="fa fa-close"></i></button>
            </div>
            <div>
                <h3><span id="span-list" class="number-size-h1-sc"> <?php echo $queue_number; ?></span></h3>
            </div>
            <div>
                <h3 class="h3-margin">Now Serving</h3>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="column left">
        <h3 style = "color: white;">Cashier</h3>
          <h3 class="number-size-h1">-</h3>
          <h3>Window</h3>
          <h3 style = "color: white;">Cashier</h3>
        </div>
        <div class="column middle">
          <h3>Waiting Number</h3>
          <h3 id="pendingQueue"><?php echo $pendingList; ?></h3>
        </div>
        <div class="column right">
            <div class="logout-button" action="../login/logout.php">
                <button type="submit" value = "Logout" class="btn"><i class="fa fa-close"></i></button>
            </div>
            <div>
                <h3><span id="span-list" class="number-size-h1-sc"> <?php echo $queue_number; ?></span></h3>
            </div>
            <div>
                <h3 class="h3-margin">Now Serving</h3>
            </div>  
        </div>
    </div>
</body>
</html>