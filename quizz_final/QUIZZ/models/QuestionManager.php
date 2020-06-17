<?php

class QuestionManager extends Manager{
   
    function __construct(){
        $this->className="Question";
    }



    public function create($objet){
        $sql="INSERT INTO question (`id`, `question`, `type`, `reponses`, `nbrePoint`) VALUES (NULL, '".$objet->getQuestion()."', '".$objet->getType()."', '".$objet->getReponses()."', '".$objet->getNbrePoint()."')";
        //die($sql);
        return $this->ExecuteUpdate($sql)!=0;

    }
    public function update($objet,$id){
        
        $sql="UPDATE user SET  fullName=[.$objet->getFullName().],login=[.$objet->getLogin().],pwd=[.$objet->getPwd().],profil=[.$objet->getProfil().],score=[.$objet->getScore().] WHERE id=$id";
        //die($sql);
        return $this->ExecuteUpdate($sql)!=0;

    }
    public  function delete($id){
      $sql="DELETE FROM question WHERE id='$id' ";

      return $this->ExecuteUpdate($sql)!=0;
    }
    public function findAllReponse(){

        $sql="select reponses from `question`";
        

        return $this-> ExecuteSelect($sql);
         }

         public function findAll(){

            $sql="select * from `question`";
            
    
            return $this-> ExecuteSelect($sql);
             }

             public function findDistinct(){

                $sql="SELECT DISTINCT question FROM `question`";
                
        
                return $this-> ExecuteSelect($sql);
                 }



             
    public function findById($id){

        $sql="select score,question,repones,nbrePoint from question where id='$id'";
        
       return $this-> ExecuteSelect($sql);

    }   
}