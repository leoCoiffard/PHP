<?php


class FactureView extends View
{

    
    public function displayHome($listFacture)
    {
        // var_dump($listFacture);
        $this->page .= "<h2 class='alert alert-primary' role='alert'>BIENVENUE</h2>";
        $this->page .= "<p><a class='btn btn-primary' href='index.php?controller=user&action=addForm'<button>Ajouter</button></a></p>";
        $this->page .= "<table class='table table-striped table-light'>";
        $this->page .= "<tr  scope='col'>" . "<td>" . "devis" . "</td>" . "<td>" . "libelle" . "</td>"."<td>" . "quantite" . "</td>" . "<td>" . "prix" . "</td>". "<td>" . "nomClient" . "</td>". "<td>" . "VISUALISER" . "</td>" . "<td>" . "SUPPRIMER" . "</td>" . "<td>" . "MODIFIER" . "</td>" . "</tr>";


        foreach ($listFacture as $liste) {
            $this->page .= "<tr>" . "<td>"
                . $liste['devis']
                . "</td><td>"
                . $liste['libelle']
                . "</td><td>"
                . $liste['quantite']
                . "</td><td>"
                . $liste['prix']
                . "</td><td>"
                . $liste['nom']
                . "</td><td>"
                . "<a href='index.php?controller=facture&action=suppDb&id="
                . $liste['id']
                . "'><i class='fas fa-eye'></i></a>"
                . "</td><td>"
                . "<a href='index.php?controller=facture&action=suppDb&id="
                . $liste['id']
                . "'><i class='fas fa-trash-alt'></i></a>"
                . "</td><td>"
                . "<a href='index.php?controller=facture&action=updateForm&id="
                . $liste['id']
                . "'><i class='fas fa-pen'></i></a></br>"
                . "</td>" . "</tr>";
        }
        $this->page .= "</table>";
        $this->displayPage();
    }
    //**
    //  * affiche la formulaire
    //  *
    //  * @return void
    //  */
    public function addForm()
    {
        $this->page .= "<h2 class='alert alert-primary' role='alert'>Ajout Utilisateur</h2>";
        $this->page .= file_get_contents('template/formFacture.html');
        $this->page = str_replace('{action}', 'addDb', $this->page);
        $this->page = str_replace('{id}','',$this->page);
        $this->page = str_replace('{date}','',$this->page);
        $this->page = str_replace('{devis}', '', $this->page);
        $this->page = str_replace('{libelle}', '', $this->page);
        $this->page = str_replace('{quantite}', '', $this->page);
        $this->page = str_replace('{prix}', '', $this->page);
        $this->page = str_replace('{remise}', '', $this->page);
        $this->page = str_replace('{penalite}', '', $this->page);
        $this->page = str_replace('{delai}', '', $this->page);
        $this->page = str_replace('{acompte}', '', $this->page);
        $this->page = str_replace('{reglement}', '', $this->page);
        $this->page = str_replace('{id_client}', '', $this->page);
        $this->displayPage();
    }


    // //**
    //  * met à jour
    //  *
    //  * @return void
    //  */
    public function updateForm($facture)
    {
        // var_dump($new);
        $this->page .= "<h2 class='alert alert-primary' role='alert'>Modification de l'utilisateur</h2>";
        $this->page .= file_get_contents('template/formFacture.html');
        $this->page = str_replace('{action}', 'updateDB', $this->page);
        $this->page = str_replace('{id}', $facture['id'], $this->page);
        $this->page = str_replace('{date}', $facture['date'], $this->page);
        $this->page = str_replace('{devis}', $facture['devis'], $this->page);
        $this->page = str_replace('{libelle}', $facture['libelle'], $this->page);
        $this->page = str_replace('{quantite}', $facture['quantite'], $this->page);
        $this->page = str_replace('{prix}', $facture['prix'], $this->page);
        $this->page = str_replace('{remise}', $facture['remise'], $this->page);
        $this->page = str_replace('{penalite}', $facture['penalite'], $this->page);
        $this->page = str_replace('{delai}', $facture['delai'], $this->page);
        $this->page = str_replace('{acompte}', $facture['acompte'], $this->page);
        $this->page = str_replace('{reglement}', $facture['reglement'], $this->page);
        $this->page = str_replace('{id_client}', $facture['id_client'], $this->page);
        $this->displayPage();
    }
}
