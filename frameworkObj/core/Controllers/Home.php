<?php

namespace Controllers; 

class Home extends Controller 

{


    protected $modelName = \Model\Exemple::class;


    /**
     * 
     * 
     * Affiche tous les items
     */
    public function index(){

        // $exemples = $this->model->findAll($this->modelName);


        // // $modelUser = new \Model\User(); 
        // // $user = $modelUser->getUser(); 
        
        $contenu = "Votre contenu";
        $titreDeLaPage = "Home";

        \Rendering::render("home\home", 
                            compact('contenu', 'titreDeLaPage')); 
    }
}