<?php
include "./View/ClientView.php";
include "./Model/ClientModel.php";
class ClientController extends Controller
{


    public function __construct()
    {
        $this->view = new ClientView();
        $this->model = new ClientModel();
    }
    //**
    //  *construction de la page d'accueil 
    //  *
    //  * @return void
    //  */
    public function start() {

        $model = new ClientModel();
        $listClients = $this->model->getClient();

        $this->view->displayHome($listClients);

        // $view = new View();
        // $view->displayHome($listNews);
        // $this->$view = new view();


    }

    /**
     * Affichage de la fiche
     *
     * @return void
     */
    public function show()
    {
        $client = $this->model->getListClient();
        $this->view->show($client);
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
