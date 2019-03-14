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
$manager = new MemberManager($db);
$manageritem = new ItemManager($db);
$reponces = array();

            
array_push($reponces, "You have just added New Member Thanks");


header("Refresh: 5; url=login.php");


$members = $manager->getMembers();
$items = $manageritem->getItems();
include "../views/refrechView.php";