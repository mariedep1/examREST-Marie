<?php

namespace Model;

class Plat extends Model
{

    protected $table = "plats"; 

    public $id; 

    public $name; 

    public $description; 

    public $price; 

    public $drestaurant_id; 





    
    /**
     * 
     * Retourne un tableau avec les plats d'un restaurant ou un booleen s'il est vide
     * @param int $restaurant_id
     * @param string $class
     * @return array|bool
     * 
     */
    public function findAllByRestaurant(int $restaurant_id, string $class){

        $requete = $this->pdo->prepare("SELECT*FROM plats WHERE restaurant_id=:restaurantId");
        $requete->execute(['restaurantId'=>$restaurant_id]);
        $items = $requete->fetchAll(\PDO::FETCH_CLASS, $class);
        return $items;
    }



    /**
     * 
     * crée un plat
     * @param string $name
     * @param string $description
     * @param int $price
     * @param int $restaurant_id
     * 
     * @return void
     */
    public function insert(string $name, string $description, int $price, int $restaurant_id){

        $requete = $this->pdo->prepare("INSERT INTO plats(name, description, price, restaurant_id) VALUES(:name, :description, :price, :restaurant_id)");
        $requete->execute(['name'=>$name,
                           'description'=>$description,
                           'price'=>$price,
                           'restaurant_id'=>$restaurant_id]);

    }



    
    /**
     * 
     * retourne le nombre de likes d'un plat
     * @return int
     * 
     */

    public function getLikes(){
        $modelLike = new \Model\Like();
        $nbrLike = $modelLike->findAllByPlat($this->id);
        return $nbrLike;
    }




}