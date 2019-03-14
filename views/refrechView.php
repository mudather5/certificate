<?php
  include("template/header.php");
  include("template/navbar.php");
?>

    <div class="container">
    <?php
      foreach($reponces as $reponce){
    ?>      
       <?php echo "<div class='alert alert-success text-center'>".$reponce."</div><br>";?>
    <?php
      }
    ?>
    </div>
<?php
include("template/footer.php");
?>