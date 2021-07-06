<?php

namespace Controllers; 

class User extends Controller
{

    protected $modelName = \Model\User::class; 


    /**
     * 
     * affiche le formulaire de connexion 
     * permet de se connecter
     * 
     */
    public function signIn() {
       
        
        if( !empty($_POST['username']) && !empty($_POST['password']) ){
            
            $usernameEntre = htmlspecialchars($_POST['username']); 
            $passwordEntre = htmlspecialchars($_POST['password']);


            $this->model->logIn($usernameEntre, $passwordEntre);


            \Http::redirect("index.php");
         
            
        }else{
            $user = $this->user; 
            $titreDeLaPage = "Connexion"; 
            \Rendering::render("users/login", compact('titreDeLaPage', 'user'));

        }
    }

    /**
     * 
     * 
     * Permet de se déconnecter
     * 
     */
    public function signOut() {

        $this->model->logOut(); 
        \Http::redirect("index.php"); 
    }


    /**
     * 
     * affiche le formulaire d'inscription
     * permet de s'inscrire
     * 
     * 
     */
    public function signUp(){


        if( !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['passwordTry']) && !empty($_POST['email'])  ){
            
            $usernameEntre = htmlspecialchars($_POST['username']); 
            $passwordEntre = htmlspecialchars($_POST['password']);
            $passwordTryEntre = htmlspecialchars($_POST['passwordTry']);
            $emailEntre = htmlspecialchars($_POST['email']);

            if($this->model->findByUsername($usernameEntre)){
                die("Cet username existe déjà"); 
            }


            if($passwordEntre == $passwordTryEntre) {
                $user = new \Model\User(); 
                $user->username = $usernameEntre; 
                $user->setPassword($passwordEntre); 
                $user->email = $emailEntre; 

                
                $this->model->register($user);
                \Http::redirect("index.php?controller=gateau&task=index");
                        
            }

        }else{
            $userModel = new \Model\User();
            $user = $userModel->getUser();  
            $titreDeLaPage = "Inscription"; 
            \Rendering::render("users/signup", compact('titreDeLaPage', 'user'));
   
            }

    }






}