<?php session_start(); if(isset($_SESSION["nom"])){?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<script  src="js/jquery.js"></script>
<title>Administration</title>
</head>
<body>
<div id="container">
<h2 id="title">The Restaurant</h2>
<a href="../index.php" role="button" id="monsite">Le Site</a>
<a href="control/control.php?deconnecter" role="button" id="deco">Deconnecter</a>
<section>
<nav id="menuleft">
<ul>
    <a href="index.php?page=Reservation&liste=new"><li>Reservation</li></a>
    <a href="index.php?page=Photos&list=sld"><li>Photos</li></a>
</ul>
</nav>
<div id="pageafficher">
<?php
  if(isset($_GET["page"])){
      if($_GET["page"]=="Reservation"){
          include_once("inc/reservation.php");
      }
      elseif($_GET["page"]=="Photos"){
          include_once("inc/Photos.php");
      }}
  else{ header("Location:index.php?page=Reservation&liste=new");}


?>
</div>
</section>
</div>
</body>
</html>
<?php }
else{header('Location:inc/login.php');}
?>