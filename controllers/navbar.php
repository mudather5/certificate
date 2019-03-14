<?php
// On enregistre notre autoload.
function chargerClasse($classname)
{
    if(file_exists('../models/'. $classname.'.php')){
        require '../models/'. $classname.'.php';
    }
    else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');
session_start();

$db = Database::DB();

//We instantiate our manager
$manager = new CategoryManager($db);
$manageritems = new ItemManager($db);


$categories = $manager->getCategories();
$items = $manageritems->getItems();
include "../views/template/head.php";