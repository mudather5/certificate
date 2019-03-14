<?php
  include("template/header.php");
  include("template/navbar.php");


?>
    <h1 class="text-center mt-4">Manage Itmes</h1>
    <div class="container mt-4 ">
        <div class="table-responsive">
            <table class="main-table text-center table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Description</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Control</th>
                
                </tr>
            </thead>
    
            <?php 
                foreach ($items as $item) {
                    //display all the members
             ?>
                        
            <tbody>
                <tr>
                <th class="text-center"><?php echo $item->getId();?></th>
                <td scope="row"><?php echo $item->getName();?></td>
                <td><?php echo $item->getDescription();?></td>
                <td><?php echo $item->getPrice();?></td>
                <td><?php if ($item->getStatus() == 1){echo "New";}else{echo  "Old";}?></td>
                <td>
                <form class="delete" action="deleteitems.php?index=<?php echo $item->getId(); ?>" method="post">
                    <a href="../controllers/edititems.php?index=<?php echo $item->getId(); ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i>Edit</a>
                    <input type="hidden" name="id" value="<?php echo $item->getId(); ?>">
                    <button type="submit" name="delete" class="btn btn-xs btn-danger">Delete</button>
            
                </form>
                </td>      
            </tbody>
                <?php
                }
                ?>   
            </table>
        </div> 
            <a href="additems.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Items</a>

    </div>

    

<?php
  include("template/footer.php");
?>