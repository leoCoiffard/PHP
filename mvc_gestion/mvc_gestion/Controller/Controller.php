<?php
// include "View\NewView.php";
// include "Model\NewModel.php";
abstract class Controller {
    protected $view;
    protected $model;

    
   
    
        //**
    //  *construction de la page affichage 
    //  *
    //  * @return void
    //  */


    public function addForm() {
       $this->view->addForm();


        
    }
    
}