<?php
  include("template/header.php");
  include("template/navbar.php");
 ?>
    <div class="d-flex justify-content-md-center">
      <h4>Add Members</h4>
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

    

    <div class="container control">
        <form action="addmembers.php" method="post">
          <div class="form-group star">
            <label for="exampleInputUsername">Username</label>
            <input type="text" name="name" class="form-control" id="exampleInputUsername" placeholder="Username">
            <i class="fa fa-star" aria-hidden="true"></i>
          </div>
          <div class="form-group star">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <i class="fa fa-star" aria-hidden="true"></i>
          </div>
          <div class="form-group star">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <i class="fa fa-star" aria-hidden="true"></i>
          </div>
          <div class="form-group star">
            <label for="exampleInputDate">Date</label>
            <input type="date" name="date" class="form-control" id="exampleInputDate" placeholder="Date of Register">
            <i class="fa fa-star" aria-hidden="true"></i>
          </div>
          <button type="submit" name="addmember" class="btn btn-primary">Add Members</button>
    </form>

    </div>


    

 <?php
   include("template/footer.php")
  ?>
