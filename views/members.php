<?php
  include("template/header.php");
  include("template/navbar.php");


?>
    <h1 class="text-center mt-4">Manage Members</h1>
    <div class="container mt-4 ">
        <div class="table-responsive">
            <table class="main-table text-center table table-bordered">
            <thead class="text-center">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Username</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Register date</th>
                    <th scope="col" class="text-center">Control</th>
                
                </tr>
            </thead>
    
            <?php 
                foreach ($members as $member) {
                    //display all the members
             ?>
                        
            <tbody>
                <tr>
                <th class="text-center"><?php echo $member->getId();?></th>
                <td scope="row"><?php echo $member->getName();?></td>
                <td><?php echo $member->getEmail();?></td>
                <td><?php echo $member->getDate();?></td>
                <td>
                <form class="delete" action="deletemembers.php?index=<?php echo $member->getId(); ?>" method="post">
                    <a href="../controllers/editmember.php?index=<?php echo $member->getId(); ?>" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                    <input type="hidden" name="id" value="<?php echo $member->getId(); ?>">
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            
                </form>
                </td>      
            </tbody>
                <?php
                }
                ?>   
            </table>
        </div> 
            <a href="addmembers.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Members</a>

    </div>

    

<?php
  include("template/footer.php");
?>