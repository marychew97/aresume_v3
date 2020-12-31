<?php require('components/header.php'); ?>
<?php require('navbar.php'); ?>
<?php require('config/db.php'); ?>

<div class="card card-collection" style="border-color:#2b303a;">
  <div class="card-header" style="background-color: #2b303a; color: #fff">
    <h5 style="text-align: center; font-family: 'Baloo Bhai', cursive;">Choose a template</h5>
  </div>
  <div class="card-body" style="padding: 10px;margin:0px">
      <div class="container">
          <div class="row">
          <?php 
            $user_id = $_SESSION['id'];
            $sql = "SELECT * FROM template";
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);
            if($rowcount > 0){
                while($row = mysqli_fetch_assoc($result)){
            ?>
              <div class="col col-md-3">
              <div class="card mb-3" style="margin: 20px">
                <form method="post" action="template-submit.php" id="template-form"> 
                  <img src="images/<?php echo $row['template'];?>" alt="<?php echo $row['template']; ?>" class="card-img-top" style="width: 100%"/> 
                   <div class="card-body" style="background-color: #2B303A">
                      <input type="hidden" value="<?php echo $row['blank_template']; ?>" name="template"/>
                      <button style="margin: 0px auto; display: block; background-color: #2B303A; border: none; color:#fff; cursor: pointer; font-family: 'Baloo Bhai', cursive;" class="btn btn-primary" type="submit">Choose</button>
                   </div>
                </form>
                </div>
              </div>
              <?php
            }
        }
    ?>
          </div>
      </div>
  </div>
</div>

<?php require('footer.php'); ?>