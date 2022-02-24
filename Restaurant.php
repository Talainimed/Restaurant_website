<?php include_once("admin/model/Config.cls.php");
include_once("admin/model/Reservation.cls.php");
$base=new Connection();
$connect=$base->connect();
$reservation=new Reservation();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css">
<title>Presentation</title>
</head>

<body>
<div id="container">
<header>
<nav id="Menutop">
<ul>
  <a href="index.php"><li>HOME</li></a>
  <a href="Restaurant.php"><li>PRESENTATION</li></a>
  <a href="Galeries.php"><li>GALERIES</li></a>
  <a href="Menu.php"><li>MENU</li></a>
  <a href="Contact.php"><li>CONTACT</li></a>
</ul>
</nav>
</header>
<section id="sectionRest">
<div id="sectdiv">
<article><h2>The Restaurant</h2><img src="image/rest2.jpg"><p>Dans les villes de Marrakech et de Casablanca, hellofood vous propose de commander de succulents mets asiatiques. À la fois diététique et délicieux, le wok est un plat inspiré de la tradition culinaire vietnamienne. Wok to Walk vous propose de composer vous-même votre wok et de choisir parmi une variété de spécialités toutes aussi savoureuses les unes que les autres. Pour des plats équilibrés qui font le ravissement de toute la famille, un Wok to Walk à Marrakech accueille ainsi tous les gourmets en quête de plats diététiques et savoureux qui changent de l'ordinaire. Composé de différents ingrédients à choisir pour un plat sur-mesure, Wok to Walk propose également de choisir un Wok baguette cuit dans un succulent pain parisien. Saine et équilibrée c'est alors l'occasion idéale pour choisir la cuisine asiatique et déguster des spécialités qui ont du goût et qui sont originales.  </p></article>
<a href="Galeries.php"><aside id="aside1"><div><img src="image/rest3.jpg" alt="lmg1"><img src="image/rest4.jpg" alt="lmg2"></div><h2>Galeries</h2>
</aside></a>
<aside id="aside2"> <div>
<table width="100%"   id="tableresrevation">
  <form action="Restaurant.php" method="post">
  <tbody>
    <tr>
      <input name="res" type="hidden">
      <td>Date:</td>
      <td><input type="date" name="dateres"  required ></td>
    </tr>
    <tr>
      <td>Temp:</td>
      <td><input type="time" name="tempres" required></td>
    </tr>
    <tr>
      <td>Table:</td>
      <td><input type="number" name="numtable" required></td>
    </tr>
    <tr>
      <td>Nombre De Personnes:</td>
      <td><input type="number" name="nbrpers" required ></td>
    </tr>
    <tr>
      <td>Nom:</td>
      <td colspan="3"><input type="text" name="nom" required ></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td colspan="3"><input type="email" name="email" required ></td>
    </tr>
    <tr>
      <td>Mobile:</td>
      <td colspan="3"><input type="tel" name="tel" required></td>
    </tr>
    <tr>
    <td></td>
      <td colspan="3" height="40"><input type="submit" value="Reserver" id="subbtn"></td>
    </tr>
  </tbody>
  </form>
</table>

</div><h2>Reserver Une Table </h2>
<?php
if(isset($_POST['res'])){
 try{
  $reservation->setNom($_POST["nom"]);$reservation->setEmail($_POST["email"]); $reservation->setDateR($_POST["dateres"]);
  $reservation->setTable($_POST["numtable"]); $reservation->setNbrpers($_POST["nbrpers"]);
  $reservation->setTel($_POST["tel"]);$reservation->setTempR($_POST["tempres"]); $reservation->setSituation("");
  $reservation->Nouveaux_Reservation($connect);}
 catch(Exception $ex){}
}
?>

</aside>

</div>

</section>
<footer>
<nav id="Menubuttom">
<ul>
  <a href="index.php"><li>Home</li></a>
  <a href="Restaurant.php"><li>Presentation</li></a>
  <a href="Galeries.php"><li>Galeries</li></a>
  <a href="Menu.php"><li>Menu</li></a>
  <a href="Contact.php"><li>Contact</li></a>
</ul>
</nav>
</footer>

</div></body>
</html>
