<?php
include_once("model/Config.cls.php");
$base=new Connection();
$connect=$base->connect();
?>
<style>
#menureservation ul{position:absolute; top:-3%; left:0%; width:96%; height:6%; background-color:rgba(127,28,29,0.79); list-style:none; overflow:hidden; border-bottom:2px solid rgba(187,149,84,1.00); }
#menureservation ul li{width:20%; height:100%; display:inline-block;padding-top:0.5%; text-align:center;   color:rgba(204,175,126,1.00);}
#menureservation ul li:hover{background-color:rgba(127,28,29,1);color:rgba(187,149,84,1.00);}

#titleh4{position: absolute; top: 5%; }
 #detailbtn{ width:40%; margin-left: 40%;background-color:rgba(106,4,4,1.00); border-radius:5px; text-align:center; text-decoration:none; color:rgba(204,175,126,1.00); font-weight:bold;  }
#detailbtn:hover{background-color:rgba(106,4,4,0.72);color:rgba(187,149,84,1.00);  }

#listcontainer{position:absolute; top:15%; left:0; width:100%; height:85%; overflow: auto; }
#res_infos{position:absolute; top:10%; left:10%; width:50%; height:52%; background-color:rgba(127,28,29,0.90); }
.btncofirm{width:30%; background-color:rgba(106,4,4,1.00); margin-left: 10%; border-radius:5px; text-align:center;  padding: 2%; text-decoration:none; color:rgba(204,175,126,1.00); font-weight:bold;  }
.btncofirm:hover{background-color:rgba(106,4,4,0.72);color:rgba(187,149,84,1.00);  }
#close{ background-image: url("image/close.png"); position:absolute;  width:6%; height:11%; left: 94%; cursor: pointer;  }

</style>

<nav id="menureservation">
<ul>
    <a href="?page=Reservation&liste=new"><li>Nouveaux Reservations</li></a>
    <a href="?page=Reservation&liste=confirmer"><li>Reservation Confirme</li></a>
    <a href="?page=Reservation&liste=nonconfirmer"><li>Reservation Non Confirme</li></a>
</ul>
</nav>
<h4 id="titleh4">
    <?php if(isset($_GET["liste"])) {
    if ($_GET["liste"]=="new") { echo "Nouveaux Reservations";}
    elseif ($_GET["liste"]=="confirmer") { echo "Reservations confirmer";}
    elseif ($_GET["liste"]=="nonconfirmer") { echo " Reservations non confirmer";}
    }
    ?>
</h4>
<div id="listcontainer">
    <?php
    $qry="";
 if(isset($_GET["liste"])) {
     if ($_GET["liste"]=="new") {
         $qry = 'select * from reservation where situation=""';
     } elseif ($_GET["liste"]=="confirmer") {
         $qry = "select * from reservation where situation='confirmer'";
     } elseif ($_GET["liste"]=="nonconfirmer") {
         $qry = "select * from reservation where situation='nonconfirmer'";
     }
 }
    ?>
    <table width="100%" border="1" cellspacing="1">
  <thead>
  <tr>
  <th>Nom</th>
  <th>Date</th>
  <th>Time</th>
  <th>Plus d'infos</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $res=$connect->query($qry);
  while($ligne=$res->fetch()){?>
    <tr>
      <td><?php echo $ligne["nom"];?></td>
      <td><?php echo $ligne["dater"];?></td>
      <td><?php echo $ligne["tempr"];?></td>
      <td><a href="?page=Reservation&liste=<?php echo $_GET['liste']?>&Details&id=<?php echo $ligne["id"];?>" id="detailbtn">Details</a></td>
    </tr>
  <?php }?>
  </tbody>
</table>
</div>
<?php
if(isset($_GET["Details"])){
$res=$connect->query("select * from reservation where id=".$_GET['id']);
while($ligne=$res->fetch()){
?>
<div id="res_infos">
    <span id="close"></span>
<h4> Mr.<?php echo $ligne["nom"];?></h4>
<h4>Email: <?php echo $ligne["email"];?></h4>
<h4>Tel:<?php echo $ligne["tel"];?></h4>
<h4>Date Reservation: <?php echo $ligne["dater"];?>      &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Temp de Reservation : <?php echo $ligne["tempr"];?>  </h4>
<h4>Table Numero:<?php echo $ligne["table"];?>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nombre de personne :<?php echo $ligne["nbrpersonne"];?></h4>
<a href="?page=Reservation&liste=<?php echo $_GET['liste']?>&Details&id=<?php echo $ligne["id"];?>&confirmer" class="btncofirm">Confirmer</a>  &nbsp; &nbsp; &nbsp;
<a href="?page=Reservation&liste=<?php echo $_GET['liste']?>&Details&id=<?php echo $ligne["id"];?>&nonconfirmer" class="btncofirm">Pas confirmer</a>
    <?php if(isset($_GET["confirmer"])){
        $res=$connect->query("update reservation set situation='confirmer' where id=".$_GET['id']);
        header("Location:index.php?page=Reservation&liste=new");
    }
    else if (isset($_GET["nonconfirmer"])){
        $res=$connect->query("update reservation set situation='nonconfirmer' where id=".$_GET['id']);
        header("Location:index.php?page=Reservation&liste=new");
    }
}?>
</div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function() {
        $( "#close" ).click(function() {
            $("#res_infos").css("visibility","hidden");
        });
    });
</script>