<?php
  include("template/header.php");
  include("template/navbar.php");
  ?>


    <div class="d-flex justify-content-md-center">
        <h1 class="title">Add New Categories</h1>
    </div>

    <div class="d-flex justify-content-center mt-2">
        <?php
                foreach($reponces as $reponce){//dispy the errors
            ?>
                <?php echo '<div class="alert alert-success">'. $reponce.'</div>'."<br>"; ?>
            <?php
            }
        ?>
    </div>


    <div class="container categories">

        <form action="addcategories.php" method="post">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputDescription" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="exampleInputOrder">Order</label>
            <input type="number" name="ordering" class="form-control" id="exampleInputOrder" placeholder="Order">
        </div>
        

        <div class="form-group form-group-lg">
            <label class="">Comment</label>
            <div class="">
                <div>
                    <input type="radio" name="comments" value="0" checked />
                    <label for="com-yes">Yes</label>
                </div>
                <div>
                <input type="radio" name="comments" value="1" checked />
                    <label for="com-no">No</label>
                </div>

            </div>    
            
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Add categories</button>
        </form>

    </div>

    
    



<?php
   include("template/footer.php")
?>