<?php
include 'queue.php';
include '../qscript.php';
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<img class="img-position" src="path/to/your/logo.png" alt="Logo">


    <div class="row">
        <div class="column left">
          <h2>Accounting</h2>
          <h1 class="number-size-h1">0</h1>
          <h3>Window</h3>
        </div>
        <div class="column middle">
          <h4>Waiting Number</h4>
          <h2 id="pendingQueue"><?php echo $pendingList; ?></h2>
        </div>
        <div class="column right">
            <div class="logout-button" action="../login/logout.php">
                <button type="submit" value = "Logout" class="btn"><i class="fa fa-close"></i></button>
            </div>
            <div>
                <h1><span id="span-list" class="number-size-h1-sc">-</span></h1>
            </div>
            <div>
                <h3 class="h3-margin">Now Serving</h3>
            </div>
            <div class="btn-control">
                <button class="btn" id="btn-next" onClick="notify()">Next</button>
                <button class="btn" id="btn-recall" onClick="notify()">Recall</button>
                <button class="btn" id="btn-update">Served</i></button>
                <button class="btn" id="btn-cancel">Cancel</i></button>
            </div>    
        </div>
    </div>
</body>
</html>


<script>
    $("#btn-next").click(function(){
    $.ajax({
     type: "GET",
     url: "next-queue.php",
     success: function(msg){
       $("#span-list").html(msg);
       alert(msg)
     }
    })
  })

  $("#btn-recall").click(function(){
    $.ajax({
     type: "GET",
     url: "recall-queue.php",
     success: function(msg){
       $("#span-list").html(msg);
     }
    })
  })

  $("#btn-update").click(function(){
    $.ajax({
     type: "GET",
     url: "update-queue.php",
     success: function(msg){
       $("#span-list").html(msg);
     }
    })
  })

  $("#btn-cancel").click(function(){
    $.ajax({
     type: "GET",
     url: "cancel-queue.php",
     success: function(msg){
       $("#span-list").html(msg);
     }
    })
  })

  function notify(){
    var audio = document.getElementById("notification");
    audio.play();
  }
</script>