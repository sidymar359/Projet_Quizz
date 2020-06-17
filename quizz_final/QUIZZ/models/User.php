<?php
class User implements IManager{
    private $id;
    private $fullName;
    private $login;
    private $pwd;
    private $profil;
    private $avatar;
    private $score=0;

    public function __construct($row=null){
        if($row!=null){
            $this->hydrate($row);
        }
    }

    public function getProfil(){
        return $this->profil;
    }
    public function getId(){
        return $this->id;
    }

    public function getFullName(){
        return $this->fullName;
    }
    public function getlogin(){
        return $this->login;
    }
    public function getPwd(){
        return $this->pwd;
    }
    public function getAvatar(){
        return $this->avatar;
    }
    public function getScore(){
        return $this->score;
    }

    public function setlogin($login){
        $this->login=$login;
    }

    public function setAvatar($avatar){
        $this->avatar=$avatar;
    }

    public function setFullName($fullName){
        $this->fullName=$fullName;
    }

    public function setPwd($pwd){
        $this->pwd=$pwd;
    }

    public function setProfil($profil){
        $this->profil=$profil;
    }

    public function calculScore(){

        return null;

    }

    public function setScore(){
        $this->score=$this->calculScore();
        $this->Allscore[]=$this->score;
    }

    public function hydrate($row){
       $this->id=$row['id'];
       $this->fullName=$row['fullName'];
       $this->login=$row['login'];
       $this->pwd=$row['pwd'];
       $this->profil=$row['profil'];
       $this->avatar=$row['avatar'];
    }
}