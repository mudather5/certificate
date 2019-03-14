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


// Connexion à la base de données
$db = Database::DB();

//We instantiate our manager
$manager = new ItemManager($db);


    if(isset($_POST['delete'])){

        if(!empty($_GET['index'])){
    
            $id = (int) $_GET['index'];
    //delete from the data base
            $manager->delete($id);

            header('Location: manageitems.php');


        }
        else {
            $error_message = "You can not delete this id";
        }
    
        
    }   

    $item = $manager->getItem($_GET['index']);

 include "../views/managecategoryVue.php";
