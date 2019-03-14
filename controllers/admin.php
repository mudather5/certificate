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



// Connection to the database
$db = Database::DB();

//We instantiate our manager
$manager = new AdminManager($db);  
$errors = array();

if(isset($_SESSION['email'])){
    header('Location: index.php');
}
//If the field is full, and is not empty
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $count = $manager->getAdmin($email);

    // Sign in Success
    
    if ($count) {
        if ($count->getPassword() == $password) {
            //We instantiate a $admin object
            $admin = new Admin([
                'email' => $email,
                'password' => $password
                ]);

            $_SESSION['email'] = $email;
            $_SESSION['success'] = "you have just login";
            header('location: index.php');                
        
        } 
        elseif (empty($_POST['email'])){
            array_push($errors, "Email is require!");
        }
        elseif (empty($_POST['password'])){
            array_push($errors, "password is require!");
        }else{
            array_push($errors, "Email or Password is Invalide!");

        }
    }

}
//get all admins
 $admins = $manager->getAdmins();

//Finally, we include the view
include "../views/signinVue.php";

