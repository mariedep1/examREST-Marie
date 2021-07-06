<?php

namespace Controllers; 

class Exemple extends Controller 

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
        

        // $titreDeLaPage = "Titre de la page";

        // \Rendering::render("exemples\exemples", 
        //                     compact('exemples','user', 'titreDeLaPage')); 
    }


    /**
     * 
     * affiche tous les items api
     * 
     * 
     */
    public function indexApi(){

        // $modelUser = new \Model\User(); 
        // $user = $modelUser->getUser(); 

        // $exemples = $this->model->findAll($this->modelName);


        // header("Access-Control-Allow-Origin: *");
        // echo json_encode($exemples);
       
    }

    

    /**
     * 
     * affiche un item
     * 
     * 
     */
    public function show(){

            
            // $exempleId = null;
            // if( !empty($_GET['id']) && ctype_digit ($_GET['id'])){
            //     $exempleId = $_GET['id']; 
            // }
            
          
            // if(!$exempleId){
            //     die('il faut rentrer un id');
            // }
            
      
            // $exemple = $this->model->find($exempleId, $this->modelName); 
            
            // // $modelUser = new \Model\User(); 
            // // $user = $modelUser->getUser(); 

            // $modelAutreExemple = new \Model\Exemple(); 
            // $autreExemples = $modelAutreExemples->findAllByGateau($exempleId, \Model\Exemple::class);
            

            // //on fixe le titre de la page
            // $titreDeLaPage = "Titre de la page"; 
            
            
            // \Rendering::render("exemples/exemple", 
            //     compact('gateau','recettes','user', 'titreDeLaPage')); 

    }

    /**
     * 
     * 
     * afficher un item api
     * 
     */
    public function showApi(){

            
            // $exempleId = null;
            // if( !empty($_GET['id']) && ctype_digit ($_GET['id'])){
            //     $exempleId = $_GET['id']; 
            // }
            
          
            // if(!$exempleId){
            //     die('il faut rentrer un id');
            // }
            
      
            // $exemple = $this->model->find($exempleId, $this->modelName); 
            
            // // $modelUser = new \Model\User(); 
            // // $user = $modelUser->getUser(); 

            // $modelAutreExemple = new \Model\Exemple(); 
            // $autreExemples = $modelAutreExemple->findAllByExemple($exempleId, \Model\Exemple::class);
            

           
            // header("Access-Control-Allow-Origin: *");
            // echo json_encode(['exemple'=>$exemple, 'autreExemples'=>$autreExemples]);
       
    }

}