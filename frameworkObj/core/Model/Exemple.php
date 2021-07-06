<?php 

namespace Model; 

class Exemple extends Model 
{

    protected $table = "exemples"; 

    public $propriete1;
    public $propriete2;
    public $id;

    




    /**
     * 
     * ajoute un item
     * @param string $propriete1
     * @param string $propriete2
     * @param int $id
     * @return void
     */
    public function insert(string $name, string $taste, int $user_id) :void{
        $requete = $this->pdo->prepare("INSERT INTO exemples(propriete1, propriete2, id) VALUES (:propriete1,:propriete2, :id)");
        $requete->execute(['propriete1'=>$propriete1,
                                    'propriete2'=>$propriete2,
                                    'id'=>$id]);



        
    }

    /**
     * 
     * 
     * mofifie un item
     * @param string $propriete1
     * @param string $propriete2
     * @param integer $id
     * @return void
     */
    public function modify(string $propriete1, string $propriete2, int $id) :void{


        $requete =  $this->pdo->prepare("UPDATE exemples SET propriete1 = :propriete1, propriete2 = :propriete2 WHERE id = :id");
        $requete->execute(['propriete1'=>$propriete1,
                                    'propriete2'=>$propriete2, 
                                     'id'=>$id]);


    }



      /**
     * 
     * trouve l'auteur 
     * @return User
     * 
     * 
     */
    public function findAuthor(){

        $author = $this->find($this->user_id, \Model\User::class, "users");

        return $author;


    }
    

}
