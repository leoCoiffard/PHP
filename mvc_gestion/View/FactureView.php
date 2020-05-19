<?php


class UserView extends View
{

    
    public function displayHome($listUsers)
    {
        $this->page .= "<h2 class='alert alert-primary' role='alert'>BIENVENUE</h2>";
        $this->page .= "<p><a class='btn btn-primary' href='index.php?controller=user&action=addForm'<button>Ajouter</button></a></p>";
        $this->page .= "<table class='table table-striped table-light'>";
        $this->page .= "<tr  scope='col'>" . "<td>" . "Nom" . "</td>" . "<td>" . "Password" . "</td>"."<td>" . "Prénom" . "</td>" . "<td>" . "Nom" . "</td>"."<td>" . "SUPPRIMER" . "</td>" . "<td>" . "MODIFIER" . "</td>" . "</tr>";


        foreach ($listUsers as $user) {
            $this->page .= "<tr>" . "<td>"
                . $user['username']
                . "</td><td>"
                . $user['password']
                . "</td><td>"
                . $user['firstname']
                . "</td><td>"
                . $user['lastname']
                . "</td><td>"
                . "<a href='index.php?controller=user&action=suppDb&id="
                . $user['id']
                . "'><i class='fas fa-trash-alt'></i></a>"
                . "</td><td>"
                . "<a href='index.php?controller=user&action=updateForm&id="
                . $user['id']
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
        $this->page .= file_get_contents('template/formUser.html');
        $this->page = str_replace('{action}', 'addDb', $this->page);
        $this->page = str_replace('{id}', ' ', $this->page);
        $this->page = str_replace('{username}', ' ', $this->page);
        $this->page = str_replace('{password}', ' ', $this->page);
        $this->page = str_replace('{firstname}', ' ', $this->page);
        $this->page = str_replace('{lastname}', ' ', $this->page);
        $this->displayPage();
    }


    // //**
    //  * met à jour
    //  *
    //  * @return void
    //  */
    public function updateForm($user)
    {
        // var_dump($new);
        $this->page .= "<h2 class='alert alert-primary' role='alert'>Modification de l'utilisateur</h2>";
        $this->page .= file_get_contents('template/formUser.html');
        $this->page = str_replace('{action}', 'updateDB', $this->page);
        $this->page = str_replace('{id}', $user['id'], $this->page);
        $this->page = str_replace('{username}', $user['username'], $this->page);
        $this->page = str_replace('{password}', $user['password'], $this->page);
        $this->page = str_replace('{firstname}', $user['firstname'], $this->page);
        $this->page = str_replace('{lastname}', $user['lastname'], $this->page);
        $this->displayPage();
    }
}
