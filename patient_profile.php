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

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="resident.php">Back to Patient Records</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="app-container" class="container">



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

        $sql = "SELECT * FROM `hospital`.`patient` WHERE id = '".$_GET['id']."'";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<h2>' . $row["firstname"]. ' ' . $row["lastname"]. '</h2>';
            echo '<dl class="dl-horizontal">';
            echo '<dt>Age</dt>';
            echo '<dd>' . $row["age"]. '</dd>';
            echo '<dt>Sex</dt>';
            echo '<dd>' . $row["sex"]. '</dd>';
            echo '<dt>Health Card ID</dt>';
            echo '<dd>' . $row["health_card"]. '</dd>';
            echo '<dt>Emergency Contact</dt>';
            echo '<dd>' . $row["emergency_contact"]. '</dd>';
            echo '<dt>Chronic Illness</dt>';
            echo '<dd>' . $row["chronic_illness"]. '</dd>';
            echo '<dt>Medications</dt>';
            echo '<dd>' . $row["medications"]. '</dd>';
            echo '<dt>Shots</dt>';
            echo '<dd>' . $row["shots"]. '</dd>';
            echo '</dl>';
          }
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