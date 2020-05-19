<?php

class NewModel extends Model
{

    


    //**
    //  * recupere les infos de la table news
    //  *
    //  * @return void
    //  */
    public function getNews()
    {
        // var_dump($this->connexion);
        $requete = "SELECT news.*,
        category.id as id_category,
        category.nom as name_category,
        category.description as description_category
        FROM news
        LEFT JOIN category
        ON news.category = category.id";
        // $requete = "SELECT * FROM news";
        $result = $this->connexion->query($requete);

        $listNews = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listNews);
        return $listNews;
    }
    //**
    //  * ajoute un id
    //  *
    //  * @return void
    //  */
    public function addDb()
    {

        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        if (empty($category)){
            $category=NULL;
        }

        $requete = $this->connexion->prepare("INSERT INTO `news`VALUES (NULL, :titre, :description, :category)");
        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':category', $category);
        $result = $requete->execute();

        // var_dump($requete);
        // var_dump($result);

    }
    //**
    //  * supprime l id
    //  *
    //  * @return void
    //  */
    public function suppDb()
    {
        $id = $_GET['id'];

        $requete = $this->connexion->prepare("DELETE FROM news WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        // var_dump($id);
        // var_dump($result);
    }

    public function getNew()
    {

        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * FROM news WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        $new = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($new);
        // var_dump($requete->errorInfo());
        return $new;
    }

    public function updateDB()
    {
        $id = $_POST['id'];
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        if (empty($category)){
            $category=NULL;
        }

        $requete = $this->connexion->prepare("UPDATE `news` SET titre =:titre, description =:description, category =:category
        WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':category', $category);
        $result = $requete->execute();
        // var_dump($result);
        // var_dump($requete->errorInfo());
    }
}
