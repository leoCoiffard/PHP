<?php

class FactureModel extends Model
{




    //**
    //  * recupere les infos de la table news
    //  *
    //  * @return void
    //  */
    public function getFacturation()
    {
        // var_dump($this->connexion);
        $requete = "SELECT *,facturation.id AS id_facturation,client.id AS clientid,devis.id AS devisid,facturation.id_client AS facturation_client FROM `facturation` JOIN `client` ON client.id = facturation.id_client JOIN devis ON devis.id = facturation.devis";
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
        $date = $_POST['date'];
        $devis = $_POST['devis'];
        $libelle = $_POST['libelle'];
        $quantite = $_POST['quantite'];
        $prix = $_POST['prix'];
        $remise = $_POST['remise'];
        $penalite = $_POST['penalite'];
        $delai = $_POST['delai'];
        $acompte = $_POST['acompte'];
        $reglement = $_POST['reglement'];
        $id_client = $_POST['id_client'];
        $requete = $this->connexion->prepare("INSERT INTO `user`VALUES (NULL, date =:date, devis =:devis, 
        libelle =:libelle, quantite =:quantite, 
        prix =:prix,remise=:remise,penalite=:penalite,delai=:delai,acompte=:acompte,
        reglement=:reglement,id_client=:id_client)");
        $requete->bindParam(':date', $date);
        $requete->bindParam(':devis', $devis);
        $requete->bindParam(':libelle', $libelle);
        $requete->bindParam(':quantite', $quantite);
        $requete->bindParam(':prix', $prix);
        $requete->bindParam(':remise', $remise);
        $requete->bindParam(':penalite', $penalite);
        $requete->bindParam(':delai', $delai);
        $requete->bindParam(':acompte', $acompte);
        $requete->bindParam(':reglement', $reglement);
        $requete->bindParam(':id_client', $id_client);
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
        $requete = $this->connexion->prepare("DELETE FROM facturation WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        // var_dump($result);
    }

        //**
    //  *construction de la page d'accueil 
    //  *
    //  * @return void
    //  */
    public function getFacture()
    {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * FROM facturation WHERE id=:id");
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
        $date = $_POST['date'];
        $devis = $_POST['devis'];
        $libelle = $_POST['libelle'];
        $quantite = $_POST['quantite'];
        $prix = $_POST['prix'];
        $remise = $_POST['remise'];
        $penalite = $_POST['penalite'];
        $delai = $_POST['delai'];
        $acompte = $_POST['acompte'];
        $reglement = $_POST['reglement'];
        $id_client = $_POST['id_client'];
        $requete = $this->connexion->prepare("UPDATE `user` SET date =:date, devis =:devis, 
        libelle =:libelle, quantite =:quantite, 
        prix =:prix,remise=:remise,penalite=:penalite,delai=:delai,acompte=:acompte,
        reglement=:reglement,id_client=:id_client
        WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':date', $date);
        $requete->bindParam(':devis', $devis);
        $requete->bindParam(':libelle', $libelle);
        $requete->bindParam(':quantite', $quantite);
        $requete->bindParam(':prix', $prix);
        $requete->bindParam(':remise', $remise);
        $requete->bindParam(':penalite', $penalite);
        $requete->bindParam(':delai', $delai);
        $requete->bindParam(':acompte', $acompte);
        $requete->bindParam(':reglement', $reglement);
        $requete->bindParam(':id_client', $id_client);
        $result = $requete->execute();
        // var_dump($result);
        // var_dump($requete->errorInfo());
    }
}
