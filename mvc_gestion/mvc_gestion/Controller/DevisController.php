<?php
include "./View/DevisView.php";
include "./Model/DevisModel.php";
class NewController extends Controller
 {
    public function __construct()
    {
        $this->view = new NewView();
        $this->model = new NewModel();
    }
    //**
    //  *construction de la page d'accueil 
    //  *
    //  * @return void
    //  */

    public function start() {

        $model = new NewModel();
        $listNews = $this->model->getNews();

        $this->view->displayHome($listNews);

        // $view = new View();
        // $view->displayHome($listNews);
        // $this->$view = new view();


    }
    
        //**
    //  *construction de la page ajout
    //  *
    //  * @return void
    //  */

    public function addDb() 
    {
        $this->model->addDb();
        // $this->start();
        header('location:index.php?controller=new');
 
 
         
     }
         //**
    //  *construction de la page suppression
    //  *
    //  * @return void
    //  */
     public function suppDb() 
    {
        $this->model->suppDb();
        header('location:index.php?controller=new');
 
 
         
     }

     public function updateForm() 
     {

        $listCategories = $this->model->getCategories();
         $new=$this->model->getNew();
         $this->view->updateForm($new,$listCategories);

        //  header('location:index.php');

      }

      public function updateDB()
      {
          $this->model->updateDB();
          header('location:index.php?controller=new');
      }

      public function addForm() {
          $listCategories = $this->model->getCategories();
        $this->view->addForm($listCategories);
      }
}