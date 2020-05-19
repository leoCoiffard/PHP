<?php

class CategoryModel extends Model
{




    //**
    //  * recupere les infos de la table news
    //  *
    //  * @return void
    //  */
    public function getCategories()
    {
        // var_dump($this->connexion);
        $requete = "SELECT * FROM category";
        $result = $this->connexion->query($requete);

        $listCategories = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listNews);
        return $listCategories;
    }
    
    //**
    //  *ajout dans la table
    //  *
    //  * @return void
    //  */
    public function addDb()
    {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        
        $requete = $this->connexion->prepare("INSERT INTO `category`VALUES (NULL, :nom, :description)");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':description', $description);
        $result = $requete->execute();
        // var_dump($result);
    }
    
    //**
    //  * suppression
    //  *
    //  * @return void
    //  */
    public function suppDb()
    {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("DELETE FROM category WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        // var_dump($result);
    }

        //**
    //  *construction de la page d'accueil 
    //  *
    //  * @return void
    //  */
    public function getCategory()
    {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * FROM category WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        $new = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($new);
        // var_dump($requete->errorInfo());
        return $new;
    }

    //**
    //  * modification dans la table
    //  *
    //  * @return void
    //  */
    public function updateDB()
    {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];

        $requete = $this->connexion->prepare("UPDATE `category` SET nom =:nom, description =:description
        WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':description', $description);
        $result = $requete->execute();
        // var_dump($result);
        // var_dump($requete->errorInfo());
    }
}
