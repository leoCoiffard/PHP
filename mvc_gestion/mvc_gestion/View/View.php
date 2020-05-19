<?php
abstract class View
{

    protected $page;
    //**ajout de l entete de la page */
    public function __construct()
    {
        $this->page = file_get_contents('template/head.html');
        $this->page .= file_get_contents('template/nav.html');
    }
    
    protected function displayPage()
    {
        $this->page .= file_get_contents('template/footer.html');
        echo $this->page;
    }
    // //**
    //  * met à jour
    //  *
    //  * @return void
    //  */
    
    }

