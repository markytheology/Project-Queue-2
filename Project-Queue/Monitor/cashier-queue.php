
<html>
<head>
  <title>Monitor</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class = "container">
      <div class = "pending-tasks">
  <h1>Pending Queue Monitor</h1>
  <div id="pendingQueue"></div>
      </div>
      <div class = "queue">
<h1>Now Serving:<h1>
<span id="span-list"></span>
</div>
</body>

<script>
    $(document).ready(function() {
      setInterval(fetchPendingQueue, 5000);
    });

    function fetchQueue(){
        $.ajax({
            url: 'monitor.php',
            type: 'GET',
            success: function(response){
                $('#span-list').html(response);
            },
            error: function(xhr, status, error){
                console.log('Error: ' + error);
            }
        });
    }

    function fetchPendingQueue() {
      $.ajax({
        url: 'monitor.php',
        type: 'GET',
        success: function(response) {
          $('#pendingQueue').html(response);
        },
        error: function(xhr, status, error) {
          console.log('Error: ' + error);
        }
      });
    }
  </script>
