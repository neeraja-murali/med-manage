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

  <div id="welcome-message" style="display:none;" class="container">

    <h1>Welcome, please select your position.</h1>
    <p>
      <button type="button" class="btn btn-default btn-lg" id="goto-physician">I am a Physician</button>
      <button type="button" class="btn btn-default btn-lg" id="goto-resident">I am a Resident</button>
    </p>

  </div>
  
  <script src="js/ext/jquery-1.11.3.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>