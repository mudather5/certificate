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

$manager = new CategoryManager($db);
//if the  creation form is submitted 
if(isset($_POST['edit'])){

    if(!empty($_GET['index'])){
        
        $id = (int) $_GET['index'];
             //We instantiate a $ user_liste object
             $category = new Category([
                'id' => $id,
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'ordering' => $_POST['ordering'],
                'comments' => $_POST['comments']
            ]);
    //update in the data base
        $manager->update($category);
        header('Location: homecategory.php');

	}
	else {
		$error_message = "";
	}
    
}
// get one user

$category = $manager->getCategory($_GET['index']);
//Finally, we include the view



include "../views/editcategoryVue.php";