<?php
  include("template/head.php");
?>
             <div class="title">
                <h1 class="text-center">All Products</h1>
            </div>
    <div class="container computer">

         <div class="row">
             <?php 
                 foreach ($items as $item) {
             ?>
                     <div class="col-4 mb-4">
                         <div class="card" style="width: 18rem;">
                             <img class="card-img-top" src="../assets/img/<?=$item->getImage();?>" alt="Card image cap" style='width: 177px; height: 175px'>
                         <div class="card-body">
                             <h4 class="card-text">
                                 <?php echo $item->getName(); ?>
                             </h4>
                             <p><?php echo $item->getDescription(); ?></p>
                             <p class="price"><?php echo $item->getPrice(); ?></p>
                         </div>
                     </div>
                 </div>    
             <?php
             }
             ?>
    </div> 
 





<?php
include("template/footer.php");
?>