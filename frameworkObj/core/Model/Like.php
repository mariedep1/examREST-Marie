<?php

namespace Model; 

class Like extends Model 

{

    protected $table = "likes"; 

    public $id; 
    public $plat_id; 





    /**
     * 
     * retourne le nombre likes d'un plat à partir de l'id du plat
     * @param integer $plat_id
     * @return int
     */
    public function findAllByPlat(int $plat_id){

        $requete = $this->pdo->prepare("SELECT * FROM likes WHERE plat_id = :plat_id");
        $requete->execute(['plat_id'=>$plat_id]);
        $numberItems = $requete->rowCount();
        return $numberItems;
        
    }




}