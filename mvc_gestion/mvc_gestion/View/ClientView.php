<?php


class ClientView extends View
{


    //**
    //  * AFFICHAGE DE LA PAGE
    //  *
    //  * @param [type] $listClients
    //  * @return void
    //  */
    public function displayHome($listClients)
    {
        $this->page .= "<h2 class='alert alert-primary' role='alert'>BIENVENUE</h2>";
        $this->page .= "<p><a class='btn btn-primary' href='index.php?controller=new&action=addForm'<button>Ajouter</button></a></p>";
        $this->page .= "<table class='table table-striped table-light text-center'>";
        $this->page .= "<tr  scope='col'>"
            . "<td>" . "Nom" . "</td>"
            . "<td>" . "E-Mail" . "</td>"
            . "<td>" . "Commentaires" . "</td>"
            . "<td>" . "Fiche client" . "</td>"
            . "<td>" . "SUPPRIMER" . "</td>"
            . "<td>" . "MODIFIER" . "</td>"
            . "</tr>";


        foreach ($listClients as $client) {
            $this->page .= "<tr>" . "<td>"
                . $client['nom'] . "</td><td>"
                . $client['email'] . "</td><td>"
                . $client['commentaires'] . "</td><td>"
                . "<a href='index.php?controller=client&action=show&id="
                . $client['id']
                . "'><i class='fas fa-user-circle'></i></a>"
                . "</td><td>"
                . "<a href='index.php?controller=clientaction=suppDb&id="
                . $client['id']
                . "'><i class='fas fa-trash-alt'></i></a>"
                . "</td><td>"
                . "<a href='index.php?controller=client&action=updateForm&id="
                . $client['id']
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
        $this->page .= "<h2 class='alert alert-primary' role='alert'>Ajout categorie</h2>";
        $this->page .= file_get_contents('template/formCategory.html');
        $this->page = str_replace('{action}', 'addDb', $this->page);
        $this->page = str_replace('{id}', ' ', $this->page);
        $this->page = str_replace('{nom}', ' ', $this->page);
        $this->page = str_replace('{description}', ' ', $this->page);
        $this->displayPage();
    }


    // //**
    //  * met à jour
    //  *
    //  * @return void
    //  */
    public function updateForm($new)
    {
        // var_dump($new);
        $this->page .= "<h2 class='alert alert-primary' role='alert'>Modification de la categorie</h2>";
        $this->page .= file_get_contents('template/formCategory.html');
        $this->page = str_replace('{action}', 'updateDB', $this->page);
        $this->page = str_replace('{id}', $new['id'], $this->page);
        $this->page = str_replace('{nom}', $new['nom'], $this->page);
        $this->page = str_replace('{description}', $new['description'], $this->page);
        $this->displayPage();
    }

    /**
     * Affichage de l'info
     *
     * @param array $new
     * @return void
     */
    public function show($client)
    {
        $this->page .= '<div class="card">
                        <h5 class="card-header">Numéro de Compte Client ' . $client['id'] . '</h5>
                        <div class="card-body">
                        <h5 class="card-title">Nom</h5>
                        <p class="card-text">' . $client['nom'] . '</p>
                        <h5 class="card-title">Adresse</h5>
                        <p class="card-text">' . $client['adresse'] . '</p>
                        <p class="card-text">' . $client['ville'] . '</p>
                        <p class="card-text">' . $client['code_postal'] . '</p>
                        <h5 class="card-title">Email</h5>
                        <p class="card-text">' . $client['email'] . '</p>
                        <h5 class="card-title">TVA</h5>
                        <p class="card-text">' . $client['tva'] . '%</p>
                        <h5 class="card-title">Siret</h5>
                        <p class="card-text">' . $client['siret'] . '</p>
                        <h5 class="card-title">Notes:</h5>
                        <p class="card-text">' . $client['commentaires'] . '</p>
                        <a href="index.php" class="btn btn-primary">Retour à la liste des clients</a>
  </div>;
</div>';
        

        $this->displayPage();
    }
}