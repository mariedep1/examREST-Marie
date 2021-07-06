<?php 

class Rendering
{


    /**
     * 
     * genère l'affichage du template avec les donnéees interpolées
     * 
     *@param string $template
    *@param array $unTableau
    * 
    */

    public static function render(string $template, array $données) :void{

        extract($données);

        ob_start();

        require_once "templates/".$template.".html.php";
        
        
        $contenuDeLaPage = ob_get_clean();
        
        
        require_once "templates/layout.html.php";




    }




}