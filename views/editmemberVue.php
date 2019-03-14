<?php
  include("template/header.php");
  include("template/navbar.php");
 ?>
    <div class="d-flex justify-content-md-center">
      <h4>Add Members</h4>
    </div>

    <div class="container control">
        <form action="../controllers/editmember.php?index=<?php echo $member->getId(); ?>" method="post">
          <div class="form-group star">
            <label for="exampleInputUsername">Username</label>
            <input type="text" name="name" class="form-control" id="exampleInputUsername" value="<?php echo $member->getName();?>">
          </div>
          <div class="form-group star">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $member->getEmail();?>">
          </div>

          <div class="form-group star">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $member->getPassword();?>">
          </div>
          <div class="form-group star">
            <label for="exampleInputDate">Date</label>
            <input type="date" name="date" class="form-control" id="exampleInputDate" value="<?php echo $member->getDate();?>">
          </div>
          <button type="submit" name="edit" class="btn btn-primary">ubdate Members</button>
    </form>

    </div>


    

 <?php
   include("template/footer.php")
  ?>
