<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Who is intrested in your event!!!</h5>
        <p class="card-text">You can see how many peoples are interested in your hosted event.</p>
        <a href="participantpage.php" class="btn btn-primary">See Participents</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Host Your Event</h5>
        <p class="card-text">You can host your event by clicking below link</p>
        <a href="hostform.html" class="btn btn-primary">Hostform</a>
      </div>
    </div>
  </div>
</div>
<br><br>
      <table class="table">
      <?php
      session_start();
        $user=$_SESSION['regName'];
        $con = mysqli_connect("localhost","root","","fest");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
          }
        $sql="SELECT * FROM `event-host`";
        $query=mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($query))
        {
          ?>
          <form action="participant.php" method="post">
          <?php
          echo "
          <tr>
          <td>".$row['hostname']."</td>
          <td>".$row['eventname']."</td>
          <td>".$row['eventcateogry']."</td>
          <td>".$row['evenatdetail']."</td>
          <td>".$row['venue']."</td>
          <td>".$row['phone']."</td>
          <td>".$row['email']."</td>
          <td>".$row['datetime']."</td>
          <td><input type='hidden' name='in1' value='".$row['eventid']."'>
          <td><input type='hidden' name='in2' value='".$user."'>
          <input type='submit' value='Participate' class='btn btn-warning btn-lg ms-2'>  </td>
          </tr>";
          ?>
          
          </form>
          <?php
        }
        ?>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>