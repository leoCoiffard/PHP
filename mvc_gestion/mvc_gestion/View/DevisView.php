<?php

class NewView extends View
{

    
    
    //**
    //  * AFFICHAGE DE LA PAGE
    //  *
    //  * @param [type] $listNews
    //  * @return void
    //  */
    public function displayHome($listNews)
    {
        $this->page .= "<h2 class='alert alert-primary' role='alert'>BIENVENUE</h2>";
        $this->page .= "<p><a class='btn btn-primary' href='index.php?controller=new&action=addForm'<button>Ajouter</button></a></p>";
        $this->page .= "<table class='table table-striped table-light'>";
        $this->page .= "<tr  scope='col'>" . "<td>" . "Titre" . "</td>" . "<td>" . "Description" . "</td>" . "<td>" . "Cat" . "</td>" ."<td>" . "SUPPRIMER" . "</td>" . "<td>" . "MODIFIER" . "</td>" . "</tr>";


        foreach ($listNews as $new) {
            $this->page .="<tr>" . "<td>"
                . $new['titre']
                . "</td><td>" 
                . $new['description'] 
                . "</td><td>" 
                .$new['name_category'] 
                . "</td><td>" 
                . "<a href='index.php?controller=new&action=suppDb&id="
                . $new['id']
                . "'><i class='fas fa-trash-alt'></i></a>"
                . "</td><td>" 
                . "<a href='index.php?controller=new&action=updateForm&id="
                . $new['id']
                . "'><i class='fas fa-pen'></i></a></br>"
                . "</td>"."</tr>" ;
        }
        $this->page .= "</table>";
        $this->displayPage();
    }
    //**
    //  * affiche la formulaire
    //  *
    //  * @return void
    //  */
    public function addForm($listCategories)
    {
        $this->page .= "<h2 class='alert alert-primary' role='alert'>Ajout information</h2>";
        $this->page .= file_get_contents('template/formNew.html');
        $this->page = str_replace('{action}', 'addDb', $this->page);
        $this->page = str_replace('{id}', ' ', $this->page);
        $this->page = str_replace('{title}', ' ', $this->page);
        $this->page = str_replace('{description}', ' ', $this->page);
        $categories= "";

        foreach($listCategories as $category){

        $categories .= "<option value='" . $category['id'] . "'>" . $category['nom'] . "</option>";
        
        }
        $this->page = str_replace('{category}', $categories, $this->page);
        $this->displayPage();
    }

 
    // //**
    //  * met à jour
    //  *
    //  * @return void
    //  */
    public function updateForm($new,$listCategories)
    {
        // var_dump($new);
        $this->page .= "<h2 class='alert alert-primary' role='alert'>Modification de l'information</h2>";
        $this->page .= file_get_contents('template/formNew.html');
        $this->page = str_replace('{action}', 'updateDB', $this->page);
        $this->page = str_replace('{id}', $new['id'], $this->page);
        $this->page = str_replace('{title}', $new['titre'], $this->page);
        $this->page = str_replace('{description}', $new['description'], $this->page);
        $categories= "";

        foreach($listCategories as $category){
            $selected = "";
            if ($new['category'] == $category['id']) {
                $selected = "selected";
            }

        $categories .= "<option $selected value='" . $category['id'] . "'>" . $category['nom'] . "</option>";
        "<option><</option>";
        }
        $this->page = str_replace('{category}', $categories, $this->page);
        $this->displayPage();
    }
}
