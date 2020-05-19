<?php
include "./View/FactureView.php";
include "./Model/FactureModel.php";
class UserController extends Controller
{


    public function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserModel();
    }
    //**
    //  *construction de la page d'accueil 
    //  *
    //  * @return void
    //  */
    public function start()
    {
        $model = new UserModel();
        $listUsers = $model->getUsers();
        $this->view->displayHome($listUsers);
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
        header('location:index.php?controller=user');
    }

    //**
    //  * suppression
    //  *
    //  * @return void
    //  */
    public function suppDb()
    {
        $this->model->suppDb();
        header('location:index.php?controller=user');
    }
 public function updateForm()
    {
        $user = $this->model->getUser();
        $this->view->updateForm($user);

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
        header('location:index.php?controller=user');
    }
}
