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

if(isset($_SESSION['email'])){
    header('Location: admin.php');
}

//We instantiate our manager
$manager = new CategoryManager($db);
$manageritems = new ItemManager($db);
if (!isset($_GET['name'])) {
    header('location: homecategories.php?name=Tous%20les%20produits');
}
if (!isset($_GET['index'])) {
    $items = $manageritems->getItems();
} else {
    $items = $manageritems->getItemsByCat($_GET['index']);
}
$getItemss = $manageritems->getItemss();
$categories = $manager->getCategories();

include "../views/homecategories.php";