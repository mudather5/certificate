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
$manager = new UserManager($db);

$name = "";
$password = "";
$errors = array();



if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password= htmlspecialchars($_POST['password']);
    $confirm= htmlspecialchars($_POST['confirm']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
     $count = $manager->get($email);
    
    if(empty($name)){
        array_push($errors, "name is required");
    }

    if(empty($email)){
        array_push($errors, "Email is required");
    }

    if(empty($password)){
        array_push($errors, "Password is required");
    }
    if(strlen($password) < 8){
        array_push($errors, "Password must be at least 8 characters");
    }
    if(is_numeric($password)){
        array_push($errors,"Password must contain at least one letter");
    }
    if($password !== $confirm){
        array_push($errors, "The two password are not matched");
                        
    }
    
    if($manager->checkIfExist($_POST['email']) === true)

        {
            array_push($errors, "The user is already exist !");

        }

        else
        {
            
            $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => $password_hash
            
            ]);
        
            $manager->add($user);// get the addaccount method form AccountManager.php and adde it in the data base
            header("location:admin.php");    
        
            //We instantiate a $ user object
            }

     
}

//get all users
 $users = $manager->getUsers();


//Finally, we include the view
include "../views/signupVue.php";
