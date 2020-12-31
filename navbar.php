<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" href="dashboard.php">
      <img src="images/resumelogo.png" alt="aresume logo" width="100px" height="50px"/>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="navbar-nav my-2 my-lg-0">
      <?php if(!empty($_SESSION['username'])) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="#"><?php echo $_SESSION['username'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signout.php">Sign out</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>