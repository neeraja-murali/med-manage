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
        <a class="navbar-brand" href="#">Med Manage</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li id="tab-add-patient" class="active"><a href="#">Add Patient</a></li>
          <li id="tab-patients"><a href="#">Patient Records</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="app-container" class="container">

    <div id="input-div">
      <h2>Add Patient</h2>

      <?php
        

        if(isset($_POST['add'])) {

            $dbhost = "localhost";
            $dbuser= "root";
            $dbpass = "root";
            $dbname = "patient";
            $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            
            if(!$connection) {
               die('Could not connect: ' . mysqli_connect_error());
            }
            
            else {
              $firstname = $_POST['firstname'];
              $lastname = $_POST['lastname'];
              $age = $_POST['age'];
              $sex = $_POST['sex'];
              $health_card = $_POST['health_card'];
              $emergency_contact = $_POST['emergency_contact'];
              $chronic_illness = $_POST['chronic_illness'];
              $medications = $_POST['medications'];
              $shots = $_POST['shots'];

              // $db_selected = mysql_select_db("patient", $connection );

              // if ($db_selected) {
              //   echo "Success. \n";
              // }
              // else {
              //   echo "Failure. \n";
              // }
            
              $sql = "INSERT INTO `patient`.`patient` (`firstname`, `lastname`, `age`, `sex`, `healthcard`, `emcontact`, `chronicill`, `medication`, `shot`) VALUES ('$firstname','$lastname','$age','$sex','$health_card','$emergency_contact','$chronic_illness','$medications','$shots')";

              // $sql = "INSERT INTO test (firstname, age) VALUES ('John', 12)";

              // $result = mysqli_query( $sql, $connection );
              
              // if($result )
              // {
              //    die('Could not enter data: ' . mysqli_error($connection));
              // }
              
              // mysqli_close($connection);

              if (mysqli_query($connection, $sql)) {
                  echo "New record created successfully";
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
              }

              mysqli_close($connection);
            }
        }
      ?>
      <form class="form-horizontal" method="post" action="<?php $_PHP_SELF ?>">
        <div class="form-group">
          <label for="inputTime" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" name="firstname">
          </div>
<!--         </div>
        <div class="form-group"> -->
          <label for="inputTime" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" name="lastname">
          </div>
        </div>
        <div class="form-group">
          <label for="inputTime" class="col-sm-2 control-label">Age</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" name="age">
          </div>
<!--         </div>
        <div class="form-group"> -->
          <label for="inputTime" class="col-sm-2 control-label">Sex</label>
          <div class="col-sm-2">
            <select class="form-control" id="inputActivity" name="sex">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputTime" class="col-sm-2 control-label">Health Card</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" name="health_card">
          </div>
<!--         </div>
        <div class="form-group"> -->
          <label for="inputTime" class="col-sm-2 control-label">Emergency Contact</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" name="emergency_contact">
          </div>
        </div>
        <div class="form-group">
          <label for="inputTime" class="col-sm-2 control-label">Chronic Illness</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" name="chronic_illness">
          </div>
        </div>
        <div class="form-group">
          <label for="inputTime" class="col-sm-2 control-label">Medications</label>
          <div class="col-sm-2">
            <textarea class="form-control" rows="3" name="medications"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputTime" class="col-sm-2 control-label">Shots</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" name="shots">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-1">
            <input name="add" type="submit" class="btn btn-default" id="add" value="Submit"></input>
          </div>
          <div class="col-sm-2 level-descr">
            <span id="success"></span>
          </div>
        </div>
      </form>
    </div>

    <div id="patients-div" class="hidden">
      <h2>Patient Records</h2>
      <?php

      $dbhost = "localhost";
      $dbuser= "root";
      $dbpass = "root";
      $dbname = "patient";
      $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      if(! $connection) {
        die('Could not connect: ' . mysqli_connect_error());
      }
      else {

        $sql = "SELECT * FROM `patient`.`patient`";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo '<table class="table table-bordered">';
          echo '<tr><th>First Name</th> <th>Last Name</th> <th>Age</th> <th>Sex</th> <th>Health Card</th> <th>Emergency Contact</th> <th>Chronic Illness</th> <th>Medications</th> <th>Shots</th></tr>';
          while($row = mysqli_fetch_assoc($result)) {
            echo '<tr><td>' . $row["firstname"]. '</td> <td>' . $row["lastname"]. '</td> <td>' . $row["age"]. '</td>  <td>' . $row["sex"]. '</td> <td>' . $row["health_card"]. '</td> <td>' . $row["emergency_contact"]. '</td> <td>' . $row["chronic_illness"]. '</td> <td>' . $row["medications"]. '</td> <td>' . $row["shots"]. '</td></tr>';
          }
          echo '</table>';
        } else {
          echo "0 results";
        }

        mysqli_close($connection);
      }

   ?>
    </div>

  </div>

  <script src="js/ext/underscore.js"></script>
  <script src="js/ext/jquery-1.11.3.min.js"></script>
  <script src="js/ext/angular.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>