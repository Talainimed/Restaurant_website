<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css">
<title>Contact-Us</title>
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
<section id="sectioncontact">
<div id="Contactdiv">
<h2>Contact Us </h2>
<div id="contForm">
<table >
<form action="Contact.php" method="post">
  <tbody>
    <tr>
      <input name="en" type="hidden">
      <td>Name:</td>
      <td><input type="text" name="nom"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="email"></td>
    </tr>
    <tr>
      <td>Message:</td>
      <td><textarea name="msg"></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td height="40"><input type="submit"  name="submit" value="Envoyer" id="envbtn"></td>
    </tr>
  </tbody>
  </form>
</table>
</div>
  <?php
  ///////////////envoi mail
  if(isset($_POST['en'])){
    try{
      $name = $_POST['nom'];
      $email = $_POST['email'];
      $message = $_POST['msg'];
      $from = 'From: Test';
      $to = 'talainimohammed@gmail.com';
      $subject = 'Hello';
      $body = "From: $name\n E-Mail: $email\n Message:\n $message";
      $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
      $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
      $headers .= 'Reply-To: '.$email."\n"; // Mail de reponse
      $headers .= 'From: "Nom_de_expediteur"<'.$email.'>'."\n"; // Expediteur
      $headers .= 'Delivered-to: '.$to."\n"; // Destinataire
      $message = '<div style="width: 100%; text-align: center; font-weight: bold">'.$message.'</div>';

      if ($_POST['submit']) {
        if ($name != '' && $email != '') {
          if (mail ($to, $subject, $body, $from)) {
            echo "<script>alert('Votre Message est envoye!');</script>";
          } else {
            echo "<script>alert('Votre Message n est pas  envoye!')</script>";}
        }
        else {
          echo "<script>alert('Remplire tout les champs !')</script>";
        }
      }}catch (mysqli_sql_exception $ex){}} ?>
<div id="restinfos">
<div>
<h3><b>Phone:</b> 0123456789</h3>
<h3><b>Email:</b>mohammed@gmail.com</h3>
<h3><b>Adresse:</b>azertyuuiiopsdffffffsfsdffsdfsdfs</h3>
</div><h2>Nos Infos</h2>
</div>
<div id="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106376.97856847597!2d-7.65742999890469!3d33.572063558125045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0da7cd4778aa113b%3A0x0b06c1d84f310fd3!2sCasablanca%2C+Maroc!5e0!3m2!1sfr!2s!4v1450178944491" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
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
