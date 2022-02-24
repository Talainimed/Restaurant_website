<?php
include_once("../model/Config.cls.php");
$base=new Connection();
$connect=$base->connect();
include_once("../model/Photo.cls.php");
include_once("../model/Reservation.cls.php");
session_start();
$pho=new Photo();
$reservation=new Reservation();

if(isset($_POST["pg"])){
    if($_POST["pg"]=="modifierimage"){
        try{
            $imgName=$_FILES['image']['name'];
            $tmp_nom=$_FILES['image']['tmp_name'];
            $taille=$_FILES['image']['size'];
            $res="";
            $err=$pho->Modifier_photo($imgName,$tmp_nom,$taille,$connect,$_POST["id"],$_POST["fld"]);
            if($err=='yes'){
              header("Location:../index.php?page=Photos&list=".$_GET["list"]);
            }
            else{header("Location:../index.php?page=Photos&list=".$_GET["list"]);

                }
        }catch(Exception $ex){header("Location:../index.php?page=Photos&list=".$_GET["list"]);
            }
    }
    else if($_POST["pg"]=="Ajouterimage"){
        try{
            $imgName=$_FILES['image']['name'];
            $tmp_nom=$_FILES['image']['tmp_name'];
            $taille=$_FILES['image']['size'];

            $err=$pho->Ajouter_photo($imgName,$tmp_nom,$taille,$connect,$_POST["fld"]);
            if($err=='yes'){
              header("Location:../index.php?page=Photos&list=".$_GET["list"]);

            }
            else{header("Location:../index.php?page=Photos&list=".$_GET["list"]);

            }}
        catch(Exception $ex){header("Location:../index.php?page=Photos&list=".$_GET["list"]);
         }
    }else if($_POST["pg"]=="login"){
        try{
            $rep=$connect->query("select * from login where log='".$_POST['log']."' and pass='".$_POST['pass']."'");
            $ligne=$rep->fetch();
            if(isset($ligne['nom'])){
                $_SESSION['nom']=$ligne['nom'];
                header("Location:../index.php");
            }else{
                header("location: ../inc/login.php");
            }
        }catch(Exception $ex){}
    }

}

if(isset($_GET["delete_id"])){
    try{
$pho->Supprimer_photo($connect,$_GET['delete_id']);
header("Location:../index.php?page=Photos&list=".$_SESSION["typep"]);
    }catch(Exception $ex){}

}
else if(isset($_GET['deconnecter']))
{
    try{ session_destroy();
        header("Location:../inc/login.php");}catch(Exception $ex){}
}