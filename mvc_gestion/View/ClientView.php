<?php


class CategoryView extends View
{

    
    public function displayHome($listNews)
    {
        $this->page .= "<h2 class='alert alert-primary' role='alert'>BIENVENUE</h2>";
        $this->page .= "<p><a class='btn btn-primary' href='index.php?controller=category&action=addForm'<button>Ajouter</button></a></p>";
        $this->page .= "<table class='table table-striped table-light'>";
        $this->page .= "<tr  scope='col'>" . "<td>" . "Nom" . "</td>" . "<td>" . "Description" . "</td>" . "<td>" . "SUPPRIMER" . "</td>" . "<td>" . "MODIFIER" . "</td>" . "</tr>";


        foreach ($listNews as $new) {
            $this->page .= "<tr>" . "<td>"
                . $new['nom']
                . "</td><td>"
                . $new['description']
                . "</td><td>"
                . "<a href='index.php?controller=category&action=suppDb&id="
                . $new['id']
                . "'><i class='fas fa-trash-alt'></i></a>"
                . "</td><td>"
                . "<a href='index.php?controller=category&action=updateForm&id="
                . $new['id']
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
}
