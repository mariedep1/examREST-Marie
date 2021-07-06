<?php

namespace Model;

class User extends Model
{

    protected $table = "users"; 

    public $id;
    public $username;
    private $password;
    public $email;

    /**
     * 
     * cherche un user via son username
     * @param string $username
     * @return object 
     */
    public function findByUsername(string $username){

            $requete = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
            $requete->execute(['username'=>$username]);
            $item = $requete->fetchObject(\Model\User::class);
            return $item;

    }

    /**
     * 
     * permet de set la propriété privée password
     * @param string $newPassword
     * @return void
     * 
     */
    public function setPassword(string $newPassword) :void{
        $this->password = $newPassword;
    }

    /**
     * 
     * 
     * permet de se connecter vie username et password
     * @param string $username
     * @param string $password
     * @return object|bool
     */
    function logIn(string $username, string $password ){

        $user = $this->findByUsername($username);

        if(!$user){
            die("il n'y a pas d'user");
         }
            if( $password == $user->password) {

                $_SESSION['user'] = array('userId'=>$user->id,'username'=> $user->username, 'email'=>$user->email );
                


                return true; 

            }else {
                return false;
            }

       

    }


    /**
     * 
     * Permet de vérifier si l'utilisateur est connecté
     * @return bool
     */
    function isLoggedIn(){
        if( isset($_SESSION['user']['userId']) && !empty($_SESSION['user']['userId']) ){
            return true; 
        }
        return false; 
    }
   
    /**
     * 
     * Récupere un user 
     * @param string $username
     * @return object|bool
     * 
     */
    public function getUser(){
        
        if($this->isLoggedIn()){
            $user = $this->find($_SESSION['user']['userId'], \Model\User::class); 
            return $user; 
        }else{
            return false; 
        }

    }


    /**
     * 
     * Permet de vider la session 
     */
    public function logOut() {

        if($this->isLoggedIn()){
            session_unset();
        }
    }

    /**
     * 
     * 
     * crée un utilisateur
     * @param object $user
     * @return void
     */
    public function register(User $user)
    {

        $requete = $this->pdo->prepare("INSERT INTO users(username, password, email) VALUES (:username, :password, :email)"); 
        $requete->execute(['username'=>$user->username,
                            'password'=>$user->password,
                            'email'=>$user->email]);

    }

    /**
     * 
     * Vérifié si l'utilisateur est l'auteur 
     * @param object $gateauOuRecette
     * @return boolean
     */
    public function isAuthor( object $gateauOuRecette){

        if($this->id == $gateauOuRecette->user_id){
            return true; 
        }else{
            return false; 
        }
    }


    /**
     * 
     * Vérifie si l'utilisateur à fait le gateau ou la recette
     * 
     * 
     */
    public function hasMade(object $gateauOuRecette) {

        $makeModel = new \Model\Make();
        

        if( $makeModel->findByUser($this, $gateauOuRecette) ){
            return true; 
        }else{
            return false; 
        }

    }

}