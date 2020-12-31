<?php require("components/header.php"); ?>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" href="dashboard.php">
      <img src="images/resumelogo.png" alt="aresume logo" width="100px" height="50px"/>
  </a>
</nav>
<div class="jumbotron jumbotron-fluid" >
  <div class="container">
    <div class="row">
      <div class="col col-md-5 justify-content-center align-self-center">
        <h1 class="display-4">AResume</h1>
        <p class="lead">Build your very own augmented resume today</p>
        <div class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Sign up to create</div>
      </div>
      <!-- <div class="col"></div> -->
      <div class="col col-md-7">
        <img src="images/resumes.png" alt="photo" id="landing-photo" style="width: 110%;"/>
      </div>
    </div>
    
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AResume</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin: 20px">
        <a class="nav-item nav-link active" id="nav-signup-tab" data-toggle="tab" href="#nav-signup" role="tab" aria-controls="nav-signup" aria-selected="true">Sign Up</a>
        <a class="nav-item nav-link" id="nav-signin-tab" data-toggle="tab" href="#nav-signin" role="tab" aria-controls="nav-signin" aria-selected="false">Sign In</a>
      </div>
      </nav>
      <div class="tab-content" id="nav-tabContent" >
        <div class="tab-pane fade show active" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
          <div class="alert alert-primary" id="signup-notification" role="alert" style="display:none"></div>
          <form method="post" action="signup.php" id="signup">
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter your username">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm Password</label>
              <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary"  value="Submit"/>
          </div>
          </form>
        </div>
        <div class="tab-pane fade" id="nav-signin" role="tabpanel" aria-labelledby="nav-signin-tab">
          <div class="alert alert-primary" id="signin-notification" role="alert" style="display:none"></div>
          <form method="post" action="signin.php" id="signin">
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary"  value="Submit"/>
          </div>
          </form>
        </div>
      </div>
      <!-- <form method="post" action="signup.php" id="signup">
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter your username">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Confirm Password</label>
          <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"  value="Submit"/>
      </div>
      </form> -->
    </div>
  </div>
</div>
<?php require("footer.php"); ?>