<?php

abstract class Model
{

    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD  = "";
    const BASE = "mvc_gestion";

    // const SERVER ="sqlprive-pc2372-001.privatesql.ha.ovh.net:3306";
    // const USER = "cefiidev941";
    // const PASSWORD  = "59btW6Vg";
    // const BASE = "cefiidev941";
    // connexion

    protected $connexion;
    public function __construct()
    {

        try {
            $this->connexion = new PDO("mysql:host=" . self::SERVER . ";dbname=" . self::BASE, self::USER, self::PASSWORD);
            $this->connexion->exec("SET NAMES 'UTF8'");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        // echo "<pre>";
        // var_dump($this->connexion);
    }

    public function getCategories()
    {
        // var_dump($this->connexion);
        $requete = "SELECT * FROM category";
        $result = $this->connexion->query($requete);

        $listCategories = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listNews);
        return $listCategories;
    }
   
}
