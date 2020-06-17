<?php
class Controller {
    
     protected $dirname;
     protected $views;
     protected $layout="layout_admin";
     protected $validator;
     protected $data=[];
     protected $manager;
     protected $managerQ;

     function __construct(){
        
        $this->validator=new Validator();
        if(!isset($_SESSION['id'])){
            $_SESSION['id']=0;
        }

        if(!isset($_SESSION['page'])){
            $_SESSION['page']=1;
        }
     }

    public function render(){
        ob_start();
        extract($this->data);
        require_once("views/".$this->dirname."/".$this->views.".php");
        $content_for_layout= ob_get_clean();
        require_once("views/layout/".$this->layout.".php");
    }

    
}
