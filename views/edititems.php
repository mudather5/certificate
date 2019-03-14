<?php
  include("template/header.php");
  include("template/navbar.php");
  ?>


    <div class="d-flex justify-content-md-center">
        <h1 class="title">Edit Items</h1>
    </div>

    <div class="d-flex justify-content-center mt-2">
        
    </div>


    <div class="container categories">

        <form action="../controllers/edititems.php?index=<?php echo $item->getId(); ?>" method="post">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" value="<?php echo $item->getName();?>"  placeholder="Name">
            </div>
            <div class="form-group">
                <label for="exampleInputDescription">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputDescription" placeholder="Description" value="<?php echo $item->getDescription();?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPrice">Price</label>
                <input type="text" name="price" class="form-control" id="exampleInputPrice" placeholder="Price $" value="<?php echo $item->getPrice();?>">
            </div>


            <div class="form-group">
                <label for="exampleInputCountry">Country</label>
                <input type="text" name="country" class="form-control" id="exampleInputCountry" placeholder="Country" placeholder="Price $" value="<?php echo $item->getCountry();?>">
            </div>
        
            <div class="form-group">
            
                <label for="exampleInputStatus">Status</label>
            
                <select class="form-control" id="exampleInputStatus" name="status">
                    <option selected>Choose...</option>
                    <option value="1" <?php if($item->getStatus() == 1){echo 'selected';}?>>New</option>
                    <option value="2" <?php if($item->getStatus() == 2){echo 'selected';}?>>Old</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputStatus">Members</label>
            
                <select class="form-control" id="exampleInputStatus" name="member">
                    <option selected>Choose...</option>
                    <?php
                        foreach($members as $member){
                            echo "<option value='".$member->getId()."'";
                            if($member->getId() == $member->getId()){echo 'selected';};
                            echo ">".$member->getName()."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputStatus">Categories</label>
            
                <select class="form-control" id="exampleInputStatus" name="cat">
                    <option selected>Choose...</option>
                    <?php
                        foreach($categories as $category){
                            echo "<option value='".$category->getId()."'";
                            if($category->getId() == $category->getId()){echo 'selected';};
                            echo ">".$category->getName()."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Image :</label>
                <input type="file" name="image" class="form-control" value="<?php echo $item->getImage();?>">
            </div>
                <button type="submit" name="submit" class="btn btn-sm btn-primary">Add Items</button>
        </form>

    </div>

    
    



<?php
   include("template/footer.php")
?>