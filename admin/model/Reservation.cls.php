<?php

/**
 * Created by PhpStorm.
 * User: MTalaini
 * Date: 16/12/2015
 * Time: 09:27
 */
class Reservation
{
    private $id;
    private $nom;
    private $email;
    private $tel;
    private $dateR;
    private $tempR;
    private $table;
    private $nbrpers;
    private $situation;

    public function __construct(){}

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDateR()
    {
        return $this->dateR;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getNbrpers()
    {
        return $this->nbrpers;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getSituation()
    {
        return $this->situation;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getTempR()
    {
        return $this->tempR;
    }

    public function setDateR($dateR)
    {
        $this->dateR = $dateR;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setNbrpers($nbrpers)
    {
        $this->nbrpers = $nbrpers;
    }

    public function setSituation($situation)
    {
        $this->situation = $situation;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function setTempR($tempR)
    {
        $this->tempR = $tempR;
    }

    public function Nouveaux_Reservation($connect){
        $connect->query("insert into reservation VALUES (null,'".$this->getNom()."','".$this->getEmail()."','".$this->getTel()."','".$this->getDateR()."','".$this->getTempR()."','".$this->getTable()."','".$this->getNbrpers()."','".$this->getSituation()."')");
    }
    public function Delete_reservation($connect,$idR){
        $connect->query("delete from reservation where id=".$idR);
    }
}