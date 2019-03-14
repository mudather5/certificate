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

$manager = new MemberManager($db);


$id = $_GET['index'];
//if the  creation form is submitted 
if(isset($_POST['edit'])){

    if(!empty($_GET['index'])){
        
        $id = (int) $_GET['index'];
             //We instantiate a $ user_liste object
        $member = new Member([
            'id' => $id,
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'date' => $_POST['date']
        ]);
    //update in the data base
        $manager->update($member);
        header('Location: homemembers.php');

	}
	else {
		$error_message = "Veuillez choisir un compte à supprimer";
	}
    
}
// get one user

$member = $manager->getMember($_GET['index']);
//Finally, we include the view



include "../views/editmemberVue.php";