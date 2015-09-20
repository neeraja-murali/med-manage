<?php include_once "functions.inc.php"; ?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Med Manage</title>
  <link rel="stylesheet" href="css/ext/bootstrap.css"/>
  <script type="text/javascript" src="https://www.moxtra.com/api/js/moxtra-latest.js" id="moxtrajs" ></script>
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
          <li><a href="javascript:history.back()">Back to Patient Records</a></li>
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

    //Moxtra App Credentials from developer.moxtra.com
    $client_id = "uE7i8KHKb-U";
    $client_secret = "jGYTxZERuhY";
    //User Information
    $unique_id = "attendant001"; //Unique ID of how user is identified in your application
    $firstname = "Neeraja";
    $lastname = "Murali";
    //Get current UTC timestamp in milliseconds
    date_default_timezone_set('UTC'); 
    $timestamp = time()*1000;
    //Post data to setup/initialize user
    $data_string = "client_id=".$client_id."&client_secret=".$client_secret."&grant_type=http://www.moxtra.com/auth_uniqueid&uniqueid=".$unique_id."&timestamp=".$timestamp."&firstname=".$firstname."&lastname=".$lastname;
    $uri = "https://apisandbox.moxtra.com/oauth/token";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$uri);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $result = json_decode($result, true);
    curl_close($ch);
    //Get Access Token on Successful Setup & Initialization of the User
    $access_token = $result['access_token'];
    //echo "ACCESS TOKEN: " . $access_token;


    mysqli_close($connection);
  }

  ?>
  <div id="chat_container">Chat</div>
</div>
<script type="text/javascript">
    var init_result = moxtra_init('<?php echo $access_token;?>');
    if (init_result == 1) {
      open_chat('BBzcDekV9b9AxL2f0KOcL02');
    }
</script>
<script src="js/ext/jquery-1.11.3.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>