<?php include_once("admin/model/Config.cls.php");
$base=new Connection();
$connect=$base->connect();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css">

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<title>Galerie</title>
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
<section id="sectiontour">
<div id="tourdiv">

<div id="imgplayer">
    <?php
    $qry = 'select * from photos where typep="galerie"';
    $res=$connect->query($qry);
    while($ligne=$res->fetch()){
    ?>
        <a href="Galeries.php?ag=<?php echo $ligne["nomp"];?>"><img src="admin/image/gal_img/<?php echo $ligne["nomp"];?>" alt="imgsld" ></a>
<?php } ?>

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
    <?php
    if(isset($_GET["ag"])){
        ?>
        <div id="menuafficher"  ><img src="admin/image/gal_img/<?php echo $_GET["ag"];?>" alt="bigimg" id="agimg" > <span id="closeimg"><img src="image/Entypo_274e(0)_64.png"> </span></div>
    <?php }?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $( "#closeimg" ).click(function() {
            $("#menuafficher").css("visibility","hidden");
        });
    });
</script>

</body>

</html>
