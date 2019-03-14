<?php
  include("template/header.php");
  include("template/navbar.php");
  ?>


    <div class="d-flex justify-content-md-center">
        <h1 class="title">Add New Categories</h1>
    </div>


    <div class="container categories">

        <form action="../controllers/editcategory.php?index=<?php echo $category->getId(); ?>" method="post">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName" value="<?php echo $category->getName();?>">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputDescription" value="<?php echo $category->getDescription();?>">
        </div>
        <div class="form-group">
            <label for="exampleInputOrder">Order</label>
            <input type="number" name="ordering" class="form-control" id="exampleInputOrder" value="<?php echo $category->getOrdering();?>">
        </div>
        

        <div class="form-group form-group-lg">
            <label class="">Comment</label>
            <div class="">
                <div>
                    <input type="radio" name="comments" value="0" <?php if($category->getComments() == 0){echo 'checked';} ?>>
                    <label for="com-yes">Yes</label>
                </div>
                <div>
                <input type="radio" name="comments" value="1" <?php if($category->getComments() == 1){echo 'checked';} ?>>
                    <label for="com-no">No</label>
                </div>

            </div>    
            
        </div>
        
        <button type="submit" name="edit" class="btn btn-primary">Edit category</button>
        </form>

    </div>

    
    



<?php
   include("template/footer.php")
?>