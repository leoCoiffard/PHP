<?php
include "./View/ClientView.php";
include "./Model/clientModel.php";
class CategoryController extends Controller
{


    public function __construct()
    {
        $this->view = new CategoryView();
        $this->model = new CategoryModel();
    }
    //**
    //  *construction de la page d'accueil 
    //  *
    //  * @return void
    //  */
    public function start()
    {
        $model = new CategoryModel();
        $listNews = $model->getCategories();
        $this->view->displayHome($listNews);
        // $view = new View();
        // $view->displayHome($listNews);
        // $this->$view = new view();
    }

    //**
    //  *construction du formulaire ajout
    //  *
    //  * @return void
    //  */
    public function addForm()
    {
        $this->view->addForm();
    }

    //**
    //  *ajout dans la table
    //  *
    //  * @return void
    //  */
    public function addDb()
    {
        $this->model->addDb();
        // $this->start();
        header('location:index.php?controller=category');
    }

    //**
    //  * suppression
    //  *
    //  * @return void
    //  */
    public function suppDb()
    {
        $this->model->suppDb();
        header('location:index.php?controller=category');
    }
 public function updateForm()
    {
        $new = $this->model->getCategory();
        $this->view->updateForm($new);

        //  header('location:index.php');

    }
    //**
    //  * construction de la page modifier
    //  *
    //  * @return void
    //  */
    
  //**
    //  * modification dans la table
    //  *
    //  * @return void
    //  */
    public function updateDB()
    {
        $this->model->updateDB();
        header('location:index.php?controller=category');
    }
}
