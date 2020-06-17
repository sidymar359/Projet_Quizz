<?php

class UserManager extends Manager{
   
    function __construct(){
        $this->className="User";
    }



    public function create($objet){
      $sql="INSERT INTO user (`id`, `fullName`, `login`, `pwd`, `profil`, `avatar`, `score`) VALUES (NULL, '".$objet->getFullName()."', '".$objet->getLogin()."', '".$objet->getPwd()."', '".$objet->getProfil()."', '".$objet->getAvatar()."', '".$objet->getScore()."')";
      return $this->ExecuteUpdate($sql)!=0;

    }
    public function update($objet,$id){
      $sql="UPDATE user SET  fullName=[.$objet->getFullname().],login=[.$objet->getLogin().],pwd=[.$objet->getPwd().],profil=[.$objet->getProfil().],score=[.$objet->getScore().] WHERE id=$id";
      return $this->ExecuteUpdate($sql)!=0;
    }
    public  function delete($id){
      $sql="DELETE FROM user WHERE id='$id' ";
      return $this->ExecuteUpdate($sql)!=0;
    }
    public function findAll(){
      $sql="select * from `user`";
      return $this-> ExecuteSelect($sql);
    }
    public function findById($id){
      $sql="select fullName , login, pwd, profil, avatar from user where id='$id'";
      return $this-> ExecuteSelect($sql);
    }  

    public function loginExist($login){
      $sql="select * from $this->className where login='$login'";
      $datas=$this->executeSelect($sql);
      return count($datas)==1? $datas[0]:null;   
    }

    public function getUserByLoginAndPwd($login,$pwd){
       $sql="select * from user where login='$login' and pwd='$pwd'";
      $users=$this-> ExecuteSelect($sql);
      if(isset($users[0])){
        return $users[0];
      }else{
          return null;
      }
       
    } 
}