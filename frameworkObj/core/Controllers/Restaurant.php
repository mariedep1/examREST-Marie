<?php 

namespace Controllers; 

class Restaurant extends Controller
{


    protected $modelName = \Model\Restaurant::class;


    
    /**
     * 
     * envoit tous les restaurants
     * 
     */
    public function indexApi(){


        // $modelUser = new \Model\User(); 
        // $user = $modelUser->getUser(); 

        $restaurants = $this->model->findAll($this->modelName);


        header("Access-Control-Allow-Origin: *");
        echo json_encode($restaurants);
       

    }


    public function showApi(){

        $restaurantId = null;
            if( !empty($_GET['id']) && ctype_digit ($_GET['id'])){
                $restaurantId = $_GET['id']; 
            }
            
          
            if(!$restaurantId){
                die('il faut rentrer un id');
            }
            
      
             $restaurant = $this->model->find($restaurantId, $this->modelName); 
            
            // // $modelUser = new \Model\User(); 
            // // $user = $modelUser->getUser(); 

            $modelPlat = new \Model\Plat(); 
            $plats= $modelPlat->findAllByRestaurant($restaurantId, \Model\Plat::class);
            

           
            header("Access-Control-Allow-Origin: *");
            echo json_encode(['restaurant'=>$restaurant, 'plats'=>$plats]);



    }


}