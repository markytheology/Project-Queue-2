<?php
include '../DBConnection.php';
$conn = OpenCon();

$sql = "SELECT * FROM transaction_table WHERE status = '1' ORDER BY created_on ASC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $queue_id = $row['id'];
    $transaction = $row['transaction_id'];

    $query = "UPDATE transaction_table SET status='2', updated_on=NOW() WHERE id=$queue_id";
    $result = $conn->query($query);

    echo " " . $row["id"];
    echo "<br>";
    echo " " . $row['transaction_id'];
    
} else {
    echo "No queues found";
}

$conn->close();
?>
