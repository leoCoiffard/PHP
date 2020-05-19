<?php
include "./View/FactureView.php";
include "./Model/FactureModel.php";
class FactureController extends Controller
{


    public function __construct()
    {
        $this->view = new FactureView();
        $this->model = new FactureModel();
    }
    //**
    //  *construction de la page d'accueil 
    //  *
    //  * @return void
    //  */
    public function start()
    {
        $model = new FactureModel();
        $listFacture = $model->getFacturation();
        $this->view->displayHome($listFacture);
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
        header('location:index.php?controller=facture');
    }

    //**
    //  * suppression
    //  *
    //  * @return void
    //  */
    public function suppDb()
    {
        $this->model->suppDb();
        header('location:index.php?controller=facture');
    }
 public function updateForm()
    {
        $facture = $this->model->getFacture();
        $this->view->updateForm($facture);

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
        header('location:index.php?controller=facture');
    }
}
