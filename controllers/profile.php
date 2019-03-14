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
$manager = new UserManager($db);
$manageruserlist = new UserlistManager($db);

$manager_cat = new CategoryManager($db);
$manageritems = new ItemManager($db);
$errors = array();

if(isset($_SESSION['user'])){
    header('Location: homepage1.php');
}


//If the field is full, and is not empty

//get all admins
$users = $manager->getUsers();
$userlists = $manageruserlist->getUserlists();

$categories = $manager_cat->getCategories();
$items = $manageritems->getItems();

include "../views/profileView.php";