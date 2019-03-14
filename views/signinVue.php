<?php
  include("template/header.php");
  include("template/navbar.php");

  ?>

<div class="container login-page">

<div class="">
    <h1 class="text-center">
        <span class="selected" data-class="login">Login</span>
    </h1>
</div>


    <form class="login" action="admin.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-block">Submit</button>
        </form>

    </div>



            <div class="d-flex justify-content-center mt-2">
                <?php
                        foreach($errors as $error){//dispy the errors
                    ?>
                        <?php echo '<div class="alert alert-danger">'. $error.'</div>'."<br>"; ?>
                    <?php
                        }
                ?>
            </div>




<?php
   include("template/footer.php")
?>