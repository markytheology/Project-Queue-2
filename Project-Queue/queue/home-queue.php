<?php
session_start();
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<body>
  <h2><?php echo $_SESSION['office'] ?> <br> <?php echo $_SESSION['windows']; ?></h2>
<h2><b><p align="center">Now Serving: <br><br>
<span id="span-list">---</span>
</p>
<center>
<button id="btn-next" onClick="notify()">Next Queue</button>
  <button id="btn-recall" onClick="notify()">Recall</button>
  <button id="btn-update">Served</button>
  <button id="btn-cancel">Cancel</button>
  
<form action="../login/logout.php" method="POST">
  <input class="btn btn-sm btn-primary rounded-0 my-1" value = 'Logout' type="submit"/>
</center>


<audio id = "notification">
  <source src = "../audio/notif.wav" type = "audio/mpeg"></audio>

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