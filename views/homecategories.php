<?php
  include("template/head.php");
?>
            <div class="title">
                <h1 class="text-center"><?php echo $_GET['name'];?></h1>
            </div>
       <div class="container computer">

            <div class="row">
                <?php 
                    foreach ($items as $item) {
                ?>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="../assets/img/<?=$item->getImage();?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-text">
                                    <?php echo $item->getName(); ?>
                                </h4>
                                <p><?php echo $item->getDescription(); ?></p>
                                <p class="price"><?php echo $item->getprice(); ?></p>
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