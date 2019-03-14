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

$manager = new ItemManager($db);
$managers = new MemberManager($db);
$managercat = new CategoryManager($db);



$id = $_GET['index'];
//if the  creation form is submitted 
if(isset($_POST['submit'])){

    if(!empty($_GET['index'])){
        
        $id = (int) $_GET['index'];
             //We instantiate a $ user_liste object
        $item = new Item([
            'id' => $id,
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'country' => $_POST['country'],
            'status' => $_POST['status'],
            'image' => $_POST['image'],
            'cat_id' => $_POST['cat'],
            'member_id' => $_POST['member']
        ]);
    //update in the data base
        $manager->update($item);
        header('Location: manageitems.php');

	}
	else {
		$error_message = "Veuillez choisir un compte à supprimer";
	}
    
}
// get one user

$item = $manager->getItem($_GET['index']);
$members = $managers->getMembers();
$categories = $managercat->getCategories();

//Finally, we include the view



include "../views/edititems.php";