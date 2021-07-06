<?php 

namespace Controllers;

class Plat extends Controller
{

    protected $modelName = \Model\Plat::class;


    /**
     * 
     * supprime un plat
     * 
     * 
     */
    public function supprApi()
    {
        $platId = null;
        if(!empty($_POST['platId']) && ctype_digit($_POST['platId']) ){
            $platId=$_POST['platId']; 
        }

        if(!$platId){
            die('il faut un id'); 
        }

        $plat = $this->model->find($platId, $this->modelName);

        $this->model->delete($platId);
        
        header("Access-Control-Allow-Origin: *");

        echo json_encode("suppression réussi");
    }


    public function createApi(){

        if(!empty($_POST['namePlat']) && !empty($_POST['descriptionPlat']) &&  !empty($_POST['pricePlat']) && ctype_digit($_POST['pricePlat']) &&!empty($_POST['restaurant_id']) && ctype_digit($_POST['restaurant_id'])   ){


            $name = htmlspecialchars($_POST['namePlat']);
            $description = htmlspecialchars($_POST['descriptionPlat']);
            $price = $_POST['pricePlat'];
            $restaurant_id = $_POST['restaurant_id'];

        }


        if(!$name || !$description || !$price || !$restaurant_id){
            die('Formulaire non complet');
        }


        $this->model->insert($name, $description, $price, $restaurant_id); 

        header("Access-Control-Allow-Origin: *");

        echo json_encode("ajout réussi");


    }






}