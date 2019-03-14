<?php
  include("template/header.php");
  include("template/navbar.php");
 ?>

    <div class="container home-stats text-center">
      <h1>Dashboard</h1>
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="stat members">
            Total Members
            <span><?php 
               echo $manager->getCount();
            ?></span>

          </div>

        </div>

      

        <div class="col-md-6">
          <div class="stat items">
            Items
            <span><?php 
               echo $manager->getCounts();
            ?></span>
          </div>

        </div>

         

      </div>

    </div>



      </div>

    </div>
    <div class="container lets">
      <div class="row">
        <div class="col-sm-6">
               <div class="panel panel-default">
                 <div class="panel-heading">
                   <i class="fa fa-users"></i>Last Registerd Users
                 </div>
                 <div class="panel-body">
                 <?php
                      foreach($members as $member){
                  ?>
                  
                        <div class='row'>
                          <div class='col-sm-9'>
                            <?php  echo "<h5>".$member->getName()."</h5>"."<br>";?>
                          </div>
                            <div class='col-1-sm'>
                              <a href="../controllers/editmember.php?index=<?php echo $member->getId(); ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i>Edit</a>
                          </div>
                        </div>
                  <?php      
                        
                   }
                  ?>
                 </div>
    
                </div>
    
        </div>
    
             <div class="col-sm-6">
               <div class="panel panel-default">
                 <div class="panel-heading">
                   <i class="fa fa-tag"></i>Last Items
                 </div>
                 <div class="panel-body">
                   <?php
                      foreach($items as $item){
                    ?>
                        <div class='row'>
                          <div class='col-sm-9'>
                            <?php echo "<h5>".$item->getName()."</h5>"."<br>";?>
                          </div>
                          <div class='col-sm-1'>
                              <a href="../controllers/edititems.php?index=<?php echo $item->getId(); ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i>Edit</a>
                          </div>
                        </div>

                  <?php     

                   }
                   ?>
                 </div>
    
               </div>
    
             </div>


        
      </div>
    </div>




    
    


 <?php
   include("template/footer.php")
  ?>
