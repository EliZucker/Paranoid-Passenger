<?php
$inputloc1 = $_GET["inputloc1"]; 
$inputloc2 = $_GET["inputloc2"]; 

$pyresult = exec("python /Users/eli/Sites/testscript.py");
// echo $pyresult;

$flight_strings = array("SFO &rarr; EGD", "SDE &rarr; SDF", "CHI &rarr; KBR", "IDB &rarr; BGD", "BMK &rarr; IUY");
$turbulences = array(20, 40, 50, 60, 100);
$wait_times = array(60, 20, 1, 100, 50);
$avg_ratings = array(100, 90, 80, 60, 10);
$travel_times = array(50, 50, 50, 50, 50);

echo '<div class="row">
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
echo '</div></div>';
?>