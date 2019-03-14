<?php
  include("template/header.php");
  include("template/navbar.php");
?>


    <div class="d-flex justify-content-md-center">
    <h1 class="title">Categories Manager</h1>
    </div>
    <div class="container category">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-users"></i>Categories Manager
            </div>
            <div class="panel-body">
                <?php
                    foreach($categories as $category){
                ?>
                    <?php echo "<div class='cat'";?>
                            
                          <?php  echo '<h5>'.'Name: '.$category->getName().'<br>'.'</h5>';?>
                            <?php echo '<p>'; if($category->getDescription() == ''){echo 'This category has no description';}else{echo 'Description: '.$category->getDescription();} echo '</p>';
                            if($category->getComments() == 1){echo '<span class="commenting">Comment Disable</span>';}else{echo 'Comment: '.$category->getComments();} echo'</p>';?>

                            <div class='hidden-button'>
                                <div class="row pr-2">
                                <a href='../controllers/editcategory.php?index=<?php echo $category->getId(); ?>' class='btn btn-xs btn-success mr-2'><i class='fa fa-edit'></i>Edit</a>
                                <form class="delete" action="deletecategory.php?index=<?php echo $category->getId(); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $category->getId(); ?>">
                                    <button type="submit" name="delete" class="btn btn-xs btn-danger"><i class='fa fa-remove'></i>Delete</button>
            
                                </form>
                                </div>
                            </div>
                            
                        <?php echo "</div>";
                            echo "<hr>";
                          
                        }
                        
                        ?>

            </div>

        </div>

        <a href="addcategories.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add New categories</a>

    </div>


<?php
   include("template/footer.php")
?>