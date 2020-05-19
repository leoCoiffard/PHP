<?php

class UserModel extends Model
{




    //**
    //  * recupere les infos de la table news
    //  *
    //  * @return void
    //  */
    public function getUsers()
    {
        // var_dump($this->connexion);
        $requete = "SELECT * FROM user";
        $result = $this->connexion->query($requete);

        $listUsers = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listNews);
        return $listUsers;
    }
    
    //**
    //  *ajout dans la table
    //  *
    //  * @return void
    //  */
    public function addDb()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $requete = $this->connexion->prepare("INSERT INTO `user`VALUES (NULL, :username, :password, :firstname,:lastname)");
        $requete->bindParam(':username', $username);
        $requete->bindParam(':password', $password);
        $requete->bindParam(':firstname', $firstname);
        $requete->bindParam(':lastname', $lastname);
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
        $requete = $this->connexion->prepare("DELETE FROM user WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        // var_dump($result);
    }

        //**
    //  *construction de la page d'accueil 
    //  *
    //  * @return void
    //  */
    public function getUser()
    {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * FROM user WHERE id=:id");
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
        $user = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $requete = $this->connexion->prepare("UPDATE `user` SET username =:user, password =:password, firstname =:firstname, lastname =:lastname
        WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':user', $user);
        $requete->bindParam(':password', $password);
        $requete->bindParam(':firstname', $firstname);
        $requete->bindParam(':lastname', $lastname);
        $result = $requete->execute();
        // var_dump($result);
        // var_dump($requete->errorInfo());
    }
}
