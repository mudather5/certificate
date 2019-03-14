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
$reponces = array();
//if the book creation form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $ordering = $_POST['ordering'];
    $comments = $_POST['comments'];
                
            //We instantiate a $ book object
            $category = new Category([
                'name' => $name,
                'description' => $description,
                'ordering' => $ordering,
                'comments' => $comments
            ]);

            $manager->add($category);// get the addbook method form BooksManager.php and adde it in the data base 
            array_push($reponces, "You have just added Category Thanks");
            header("Refresh:3");
            
            header('Location: homecategory.php');

}

//We get all the books in the BDD books is an array containing all books objects in DB
$categories = $manager->getCategories();



include "../views/addcategoriesVue.php";
