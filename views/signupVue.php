<?php
  include("template/header.php");
  include("template/navbar.php");


?>
<div class="d-flex justify-content-md-center">

    <div class="card mt-4">
        <div class="card-body">

            <div class="d-flex justify-content-md-center">
                <h3 class="title">Signup to see your page</h3>
            </div>

                <?php 
                        foreach($errors as $error){//dispy the errors
                    ?>
                         <?php echo '<div class="alert alert-danger">'. $error.'</div>'."<br>"; ?>
                    <?php
                        }
                ?>

    


    <div class="d-flex justify-content-md-center">
                <form action="user.php" method="post">
                <div class="form-group icon">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Name">
                    <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                </div>
                <div class="form-group envolope">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group eye">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <i class="fa fa-eye fa-lg fa-fw" aria-hidden="true"></i>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" name="confirm" class="form-control" id="exampleInputPassword2" placeholder="Confirm your Password">
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
  include("template/footer.php");
?>