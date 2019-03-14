<?php
  include("template/head.php");
?>

    <div class="container login-page">

        <div class="">
            <h1 class="text-center">
                <span class="selected" data-class="login">Login</span> | <span data-class="logup">Logup</span>
            </h1>
        </div>

        

            <form class="login" action="index.php" method="post">
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



            <form class="logup" action="index.php" method="post">

                <div class="form-group">
                    <label for="exampleInputEmail1">Ueser name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input minlength="8" type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input minlength="8" type="password" name="confirm" class="form-control" id="exampleInputPassword1" placeholder=" Confirm Your Password" required>
                </div>
                <button type="submit" name="signup" class="btn btn-success btn-block">Submit</button>
            </form><br>



    </div>

            <div class="d-flex justify-content-md-center">

                <?php 
                foreach($errors as $error){//dispy the errors
                ?>
                    <?php echo '<div class="alert alert-danger">'. $error.'</div>'."<br>"; ?>
                <?php
                }
                ?>
            
            </div>

<?php
include("template/footer.php");
?>