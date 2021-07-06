<?php

spl_autoload_register(function($class){

    $correctClass= str_replace("\\","/",$class);

    require_once "core/".$correctClass.".php";

});