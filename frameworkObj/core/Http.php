<?php

class Http 
{


    
        /**
         * 
         * redirige vers l'url passé en paramètre
         * @param string
         */

        public static function redirect(string $url):void
        {
            header("Location: ".$url);
        }



}