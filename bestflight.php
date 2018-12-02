<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/index.html">
        <img src="badlogo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      </a>
      <a class="navbar-brand" href="/index.html">ParanoidPassenger</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <!----- <form class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> 
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>

<?php
$inputloc1 = $_GET["inputloc1"]; 
$inputloc2 = $_GET["inputloc1"]; 

$pyresult = exec("python /Users/eli/Sites/testscript.py");
echo $pyresult;

$flight_strings = array("SFO &rarr; EGD", "SDE &rarr; SDF", "CHI &rarr; KBR", "IDB &rarr; BGD", "BMK &rarr; IUY");
$turbulences = array(20, 40, 50, 60, 100);
$wait_times = array(60, 20, 1, 100, 50);
$avg_ratings = array(100, 90, 80, 60, 10);
$travel_times = array(50, 50, 50, 50, 50);

echo '<main role="main" class="container">
<div class="row">
<div class="col-3">
<div class="list-group" id="list-tab" role="tablist">
  <a class="list-group-item list-group-item-action active" id="list-flight0-list" data-toggle="list" href="#list-flight0" role="tab" aria-controls="flight0">1.  ';
echo $flight_strings[0];
echo '</a>';

for ($x = 1; $x < count($flight_strings); $x++) {
  echo '<a class="list-group-item list-group-item-action" id="list-flight'.$x.'-list" data-toggle="list" href="#list-flight'.$x.'" role="tab" aria-controls="flight'.$x.'">'.($x+1).'.  '.$flight_strings[$x].'</a>';
}

echo '</div></div><div class="col-9"><div class="tab-content" id="nav-tabContent"><div class="tab-pane fade show active" id="list-flight0" role="tabpanel" aria-labelledby="list-flight0-list">';

echo '<div class="starter-template">'.$flight_strings[0].'</div>';

  echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Flight Turbulence</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-info" role="progressbar" style="width: '.$turbulences[0].'%" aria-valuenow="'.$turbulences[0].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
<div class="col-md-3"><h6 class="progress-label">Airport Wait Time</h6></div>
<div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-warning" role="progressbar" style="width: '.$wait_times[0].'%" aria-valuenow="'.$wait_times[0].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Avg Airport Rating</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-success" role="progressbar" style="width: '.$avg_ratings[0].'%" aria-valuenow="'.$avg_ratings[0].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Total Travel Time</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-danger" role="progressbar" style="width: '.$travel_times[0].'%" aria-valuenow="'.$travel_times[0].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div></div>';

for ($x = 1; $x < count($flight_strings); $x++) {
  echo '<div class="tab-pane fade" id="list-flight'.$x.'" role="tabpanel" aria-labelledby="list-flight'.$x.'-list">';
  echo '<div class="starter-template">'.$flight_strings[$x].'</div>';
  echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Flight Turbulence</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-info" role="progressbar" style="width: '.$turbulences[$x].'%" aria-valuenow="'.$turbulences[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
<div class="col-md-3"><h6 class="progress-label">Airport Wait Time</h6></div>
<div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-warning" role="progressbar" style="width: '.$wait_times[$x].'%" aria-valuenow="'.$wait_times[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Avg Airport Rating</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-success" role="progressbar" style="width: '.$avg_ratings[$x].'%" aria-valuenow="'.$avg_ratings[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Total Travel Time</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-danger" role="progressbar" style="width: '.$travel_times[$x].'%" aria-valuenow="'.$travel_times[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div></div>';

}
?>
  </div>
</div>

      <!---- <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div> -->

    </main><!-- /.container -->

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
