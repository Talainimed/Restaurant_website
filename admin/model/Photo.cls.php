<?php

/**
 * Created by PhpStorm.
 * User: MTalaini
 * Date: 16/12/2015
 * Time: 11:42
 */
class Photo
{
   private $id; private $nom; private $typephoto;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getTypephoto()
    {
        return $this->typephoto;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setTypephoto($typephoto)
    {
        $this->typephoto = $typephoto;
    }

    public function Ajouter_photo($imgName,$tmp_nom,$taille,$connect,$fld){
        $ext=strchr($imgName,'.');
        $extentions=array('.jpg','.png','.jpeg','.gif');
        $taille_max=10000000;

        if(!in_array($ext,$extentions)){
            $erreur="ext";
        } else if($taille>$taille_max){
            $erreur="taille";
        } else{
            move_uploaded_file($tmp_nom,"../image/".$fld."/".$imgName);
            if($fld=="sld_img"){$this->setTypephoto("slider");}
            else if($fld=="gal_img"){$this->setTypephoto("galerie");}
            else if($fld=="menu"){$this->setTypephoto("menu");}
            $connect->query("insert into photos VALUES (null,'".$imgName."','".$this->getTypephoto()."')");
            $erreur="yes";
        }
        return $erreur;
    }
    public function Modifier_photo($imgName,$tmp_nom,$taille,$connect,$idp,$fld){
                $ext=strchr($imgName,'.');
                $extentions=array('.jpg','.png','.jpeg','.gif');
                $taille_max=10000000;
                if(!in_array($ext,$extentions)){
                    $erreur="ext";
                } else if($taille>$taille_max){
                    $erreur="taille";
                } else{
                   // unlink("../image/vehicules/".$image1);
                    move_uploaded_file($tmp_nom,'../image/'.$fld.'/'.$imgName);
                    $connect->query("update photos set nomp='".$imgName."' where id=".$idp);
                    $erreur="yes";
                }
            return $erreur;
    }
    public function Supprimer_photo($connect,$idp){
        $connect->query("delete from photos  where id=".$idp);
    }
}