<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Evaluation PHP POO | Comptes Bancaires</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="icon.png">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<link rel="icon" href="../favicon.ico">

        <link rel="stylesheet" href="../assets/css/main.css">
    </head>
    <body>
      
    <header>
    
    <nav class="navbar navbar-expand-md navbar-light bg-dark">

      <a class="navbar-brand text-light" href="#">Homepage</a>
      <a href="../controllers/login.php">
                    <span class="pull-right">Login / Signup</span>
                  </a>
      <a href="../controllers/logout2.php"> / Logout</a><br>
      <a class="mr-4" href="../controllers/profile.php"> / My Profile</a>

          
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav head">
          
          

            <?php 
                foreach($categories as $cat){
               echo '<li class="nav-item active">
                  <a class="nav-link text-light" href="../controllers/homecategories.php?index='. $cat->getId().'&name='. $cat->getName() .'">'.$cat->getName().'</a>
                </li>';


            }

            ?>

         
        </ul>

      </div>
    </nav>

    
  </header>

  
 
