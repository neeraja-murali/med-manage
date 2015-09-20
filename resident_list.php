<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Med Manage</title>
  <link rel="stylesheet" href="css/ext/bootstrap.css"/>
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Med Manage</a>
      </div>
    </div>
  </nav>

  <div id="app-container" class="container">

  <h2>List of Medical Residents</h2>

  <?php

      $dbhost = "us-cdbr-azure-east-b.cloudapp.net";
      $dbuser= "b0d74f55e205cd";
      $dbpass = "9ec67e0e";
      $dbname = "hospital";
      $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      if(! $connection) {
        die('Could not connect: ' . mysqli_connect_error());
      }
      else {

        $sql = "SELECT * FROM `hospital`.`resident`";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo '<table class="table table-bordered table-hover">';
          echo '<tr><th>Name</th>';
          while($row = mysqli_fetch_assoc($result)) {
            echo '<tr><td><a href="resident.php?id='.$row["id"].'">'.$row["firstname"].' '.$row["lastname"].'</a></td>';
          }
          echo '</table>';
        } else {
          echo "Error, no records were found.";
        }

        mysqli_close($connection);
      }

   ?>

  </div>

  <script src="js/ext/jquery-1.11.3.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>