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
$manager = new ItemManager($db);
$managers = new MemberManager($db);
$managercat = new CategoryManager($db);


//if the book creation form is submitted

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];     
    $price= $_POST['price'];     
    $country = $_POST['country'];     
    $status = $_POST['status'];
    $image = $_POST['image'];
    $cat_id = $_POST['cat'];     
    $member_id = $_POST['member']; 
    
    
    if(isset($_FILES['image'])){
        $fileupload = new Item();
        if($fileupload->uploadfile($image)){
            echo 'Fisierul a fost uploadat';
        }
    }
    //We instantiate a $ book object
    $item = new Item([
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'country' => $country,
        'status' => $status,
        'image' => $image,
        'cat_id' => $cat_id,
        'member_id' => $member_id
        ]);        
        $manager->add($item);// get the addbook method form BooksManager.php and adde it in the data base 
        //header("Refresh:3");
            
        header('Location: manageitems.php');

}


//We get all the books in the BDD books is an array containing all books objects in DB
$items = $manager->getItems();
$members = $managers->getMembers();
$categories = $managercat->getCategories();





include "../views/additemsVue.php";
