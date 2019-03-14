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

if(isset($_SESSION['email'])){
    header('Location: homepage1.php');
}
//If the field is full, and is not empty
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $count = $manageruserlist->getUserlist($email);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //Sign in Success
    
    if ($count) {
        if ($count->getPassword() == $password) {
            //We instantiate a $admin object
            $userlist = new Userlist([
                'email' => $email,
                'password' => $password_hash
                ]);
                
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "you have just login";

            header('location: homepage1.php');

        }elseif (empty($_POST['email'])){

            array_push($errors, "Email is require!");

        }elseif (empty($_POST['password'])){

            array_push($errors, "password is require!");
            
        }else {

            array_push($errors, "Email or Password is Invalide!");
        }
    }
}if (isset($_POST['signup'])){ 
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password= htmlspecialchars($_POST['password']);
        $confirm= htmlspecialchars($_POST['confirm']);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        //$count = $manager->getUser($email);
        
        
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
                header("location:refrechmember.php");    
    
            
                //We instantiate a $ user object
                }
    
         
    }

//get all admins
$users = $manager->getUsers();
$userlists = $manageruserlist->getUserlists();

$categories = $manager_cat->getCategories();
$items = $manageritems->getItems();

include "../views/indexView.php";