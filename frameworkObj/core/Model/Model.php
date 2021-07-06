<?php

namespace Model; 
use PDO;

abstract class Model
{

    protected $pdo; 
    protected $table;
    
    public function __construct(){
        $this->pdo = \Database::getPdo();
    }


    /**
     * trouve un item par son id
     * retourne un tableau ou un booléen s'il n'existe
     * @param  integer $id
     * @param string $class
     * @param  string $table (optional) 
     * @return object
     */

    public function find( int $id, string $class, ? string $table = null) {

      
            $sql= "SELECT * FROM $this->table WHERE id = :id";
        

        if(!empty($table)){

            $sql = "SELECT * FROM $table WHERE id = :id";
            
        }

        $resultat = $this->pdo->prepare($sql);

        $resultat->execute(['id'=>$id]);

        $item = $resultat->fetchObject($class);

        return $item;     

    }

      /**
     * 
     * Retourne un tableau avec tous les items 
     * 
     * @return array
     */

    public function findAll(string $class) :array{
        $resultat = $this->pdo->query("SELECT * FROM {$this->table}"); 
        $items = $resultat->fetchAll( PDO::FETCH_CLASS, $class);
        return $items; 
    }


    /**
     * 
     * supprime un item 
     * @param integer $id
     * @return void
     */
    public function delete(int $id) :void{

        $requeteDelete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $requeteDelete ->execute(['id'=>$id]);
    }



}