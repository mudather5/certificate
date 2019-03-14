<?php
  include("template/header.php");
  include("template/navbar.php");
  ?>


    <div class="d-flex justify-content-md-center">
        <h1 class="title">Add New Items</h1>
    </div>

    <div class="d-flex justify-content-center mt-2">
        
    </div>


    <div class="container categories">

        <form action="additems.php" method="post" entype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName"  placeholder="Name">
            </div>
            <div class="form-group">
                <label for="exampleInputDescription">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputDescription" placeholder="Description">
            </div>
            <div class="form-group">
                <label for="exampleInputPrice">Price</label>
                <input type="text" name="price" class="form-control" id="exampleInputPrice" placeholder="Price $">
            </div>


            <div class="form-group">
                <label for="exampleInputCountry">Country</label>
                <input type="text" name="country" class="form-control" id="exampleInputCountry" placeholder="Country">
            </div>
        
            <div class="form-group">
            
                <label for="exampleInputStatus">Status</label>
            
                <select class="form-control" id="exampleInputStatus" name="status">
                    <option selected>Choose...</option>
                    <option value="1">New</option>
                    <option value="2">Old</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputStatus">Members</label>
            
                <select class="form-control" id="exampleInputStatus" name="member">
                    <option selected>Choose...</option>
                    <?php
                        foreach($members as $member){
                            echo "<option value='".$member->getId()."'>".$member->getName()."</option>";
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
                            echo "<option value='".$category->getId()."'>".$category->getName()."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Image :</label>
                <input type="file" name="image" class="form-control" require="yes">
            </div>
                <button type="submit" name="submit" class="btn btn-sm btn-primary">Add Items</button>
        </form>

    </div>

    
    



<?php
   include("template/footer.php")
?>