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
$manager = new MemberManager($db);
$reponces = array();


if (isset($_POST['addmember'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];
    
    //We instantiate a $ book object
    $member = new Member([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'date' => $date  
        ]);

    $manager->add($member);
    
    array_push($reponces, "You have just added New Member Thanks");
    header("Refresh:3");   


    header('Location: homemembers.php');

    
}

 $members = $manager->getMembers();


include "../views/addmembersVue.php";