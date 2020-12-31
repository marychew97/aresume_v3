<?php require("components/header.php"); ?>
<body>
<?php require("navbar.php"); ?>
<?php require("config/db.php"); ?>

<div class="container-fluid form-content">
    <h6>My Resume Completion</h6>
    <div class="progress" style="height: 30px" id="progress-bar">
        <!-- <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Personal information &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>
        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Education background</div> -->
    </div>
    <div class="tab-container">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="display: none">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Education</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="false">Work</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false">Image</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="document-tab" data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false">Document</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Video</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="finish-tab" data-toggle="tab" href="#finish" role="tab" aria-controls="finish" aria-selected="false">Finish</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div style="margin-top: 50px">
                
                <form method="POST" action="create-profile.php" id="create-profile">
                    <i class="fa fa-user" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #fff"></i>
                    <h6 style="text-align: center; color: #fff; margin-bottom: 50px">My Personal Information</h6>
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Your name">
                            </div>
                        </div>
                        <div class="col col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Current Job</label>
                                <input type="text" class="form-control" name="job" id="job" placeholder="What do you do?">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Your email">
                            </div>
                        </div>
                        <div class="col col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your contact number">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" class="form-control" name="location" id="location" aria-describedby="emailHelp" placeholder="Where do you live?">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Summary</label>
                        <textarea class="form-control" name="summary" id="summary" rows="3" placeholder="Tell us about yourself"></textarea>
                    </div>
                    <h6 style="text-align: center; margin-top: 100px">Social medias</h6>
                    <small class="form-text text-muted" style="text-align: center">Provide links for any social media that you have</small>
                    <div class="container-fluid" style="margin-top: 50px">
                        <div class="row">
                            <div class="col col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;&nbsp;Website</label>
                                    <input type="text" class="form-control" name="website" id="website" aria-describedby="emailHelp" placeholder="Your website link">
                                </div>
                            </div>
                            <div class="col col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><i class="fa fa-linkedin-square" aria-hidden="true"></i>&nbsp;&nbsp;LinkedIn</label>
                                    <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Your LinkedIn profile link">
                                </div>
                            </div>
                            <div class="col col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><i class="fa fa-github" aria-hidden="true"></i>&nbsp;&nbsp;GitHub</label>
                                    <input type="text" class="form-control" name="github" id="github" placeholder="Your GitHub profile link">
                                </div>
                            </div>
                            <div class="col col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;&nbsp;Facebook</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Your Facebook profile link">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 100px;">
                        <i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #fff"></i>
                        <h6 style="text-align: center; color: #fff; margin-bottom: 100px;">My Education Background</h6> 
                        <div id="addEducationSection">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Institution</label>
                                            <input type="text" class="form-control" name="institution" id="institution" aria-describedby="emailHelp" placeholder="Which institution do/did you study?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Area of study</label>
                                            <input type="text" class="form-control" name="studyarea" id="studyarea" placeholder="What do you study?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Your highest education level</label>
                                            <select class="custom-select" name="edulevel" id="edulevel">
                                                <option value="Some High School">Some High School</option>
                                                <option value="High School Diploma">High School Diploma</option>
                                                <option value="Some College">Some College</option>
                                                <option value="Associate Degree">Associate Degree</option>
                                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                                <option value="Master's Degree or Higher">Master's Degree or Higher</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Country</label>
                                            <input type="text" class="form-control" name="country" id="country" aria-describedby="emailHelp" placeholder="Which country do you study?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">City</label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Which city do you study?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Start Date</label>
                                            <input type="date" class="form-control" name="startdate" id="startdate" aria-describedby="emailHelp" placeholder="The starting date of your study">
                                        </div>
                                    </div>
                                    <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">End Date</label>
                                            <input type="date" class="form-control" name="enddate" id="enddate" placeholder="The ending date of your study">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Present</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">GPA</label>
                                        <input type="text" class="form-control" name="gpa" id="gpa" aria-describedby="emailHelp" placeholder="Your GPA">
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 50px;">
                        <i class="fa fa-briefcase" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #fff"></i>
                        <h6 style="text-align: center; color: #fff; margin-bottom: 80px;">My Work History</h6> 
                        <div class="container-fluid">
                                <div class="row">
                                    <div class="col col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company</label>
                                            <input type="text" class="form-control" name="company" id="company" aria-describedby="emailHelp" placeholder="Which company did/do you work?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Position</label>
                                            <input type="text" class="form-control" name="position" id="position" placeholder="What did/do you do?">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Country</label>
                                            <input type="text" class="form-control" name="work_country" id="work_country" aria-describedby="emailHelp" placeholder="Which country do you work?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">City</label>
                                            <input type="text" class="form-control" name="work_city" id="work_city" placeholder="Which city do you work?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Start Date</label>
                                            <input type="date" class="form-control" name="work_startdate" id="work_startdate" aria-describedby="emailHelp" placeholder="The starting date of your job">
                                        </div>
                                    </div>
                                    <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">End Date</label>
                                            <input type="date" class="form-control" name="work_enddate" id="work_enddate" placeholder="The ending date of your job">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Present</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-file" id="profile-section-btn" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;Next</button>
                </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
            <div style="margin-top: 50px">
                <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #D64933"></i>
                <h6 style="text-align: center; color: #D64933">Augmented Photos</h6>
                
                <form method="POST" action="image-upload.php" enctype="multipart/form-data" id="image-upload-form">
                    <h4 style="text-align:center">Upload your photos</h4>
                    <span class="btn btn-primary btn-file" style="border: 1px solid white; cursor: pointer"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;&nbsp;Add and upload <input type="file" name="file" id="photo-input"/></span>
                    <br/>
                    <div id="success-upload-photo" style="display: none; text-align: center">
                        Photo uploaded successfully!
                    </div>
                <!-- <div id="addPhoto"></div> -->
                    <div id="gallery" class="container">
                        <div class="row" style="padding-top:10px">
                            
                            <?php 
                                $user_id = $_SESSION['id'];
                                $sql = "SELECT * FROM images WHERE user_id = $user_id";
                                $result = mysqli_query($conn, $sql);

                                $rowcount = mysqli_num_rows($result);
                                if($rowcount > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                        $image = $row['image'];
                            ?>
                            <div class="col col-sm-3" id="addPhotos">
                                <img src="uploads/images/<?php echo $image; ?>" alt="<?php echo $id;?>" style="width:150px; height:150px; display: block; margin: auto;"/>
                                <br/>
                                <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#exampleModal" id=<?php echo $id; ?>>Delete</button>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-file" id="image-upload-btn" data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;Next</button>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
            <div style="margin-top: 50px">
                <i class="fa fa-file" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #D64933"></i>
                <h6 style="text-align: center; color: #D64933">Augmented Documents</h6>
                
                <form method="POST" action="document-upload.php" enctype="multipart/form-data" id="document-upload-form">
                    <h4 style="text-align:center">Upload your documents</h4>
                    <span class="btn btn-primary btn-file" style="border: 1px solid white; cursor: pointer"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;&nbsp;Add and upload <input type="file" name="file" id="document-input"/></span>
                    <br/>
                    <div id="success-upload-document" style="display: none; text-align: center">
                        Document uploaded successfully!
                    </div>            
                <!-- <div id="addPhoto"></div> -->
                    <div id="document-gallery" class="container">
                        <div class="row" style="padding-top:10px">
                            <ul>
                            <?php 
                                $user_id = $_SESSION['id'];
                                $sql = "SELECT * FROM documents WHERE user_id = $user_id";
                                $result = mysqli_query($conn, $sql);

                                $rowcount = mysqli_num_rows($result);
                                if($rowcount > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                        $document = $row['document'];
                            ?>
                            <div id="addDocuments">
                                <li><?php echo $document; ?></li>
                                <!-- <img src="uploads/images/<?php //echo $image; ?>" alt="<?php //echo $id;?>" style="width:150px; height:150px; display: block; margin: auto;"/> -->
                                <br/>
                                <!-- <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#exampleModal" id=<?php //echo $id; ?>>Delete</button> -->
                            </div>
                            <?php
                                    }
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-file" id="doc-upload-btn" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;Next</button>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
            <div style="margin-top: 50px">
                <i class="fa fa-video-camera" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #D64933"></i>
                <h6 style="text-align: center; color: #D64933">Augmented Videos</h6>
                
                <form method="POST" action="video-upload-test.php" enctype="multipart/form-data" id="video-upload-form">
                    <h4 style="text-align:center">Upload your videos</h4>
                    <span class="btn btn-primary btn-file" style="border: 1px solid white; cursor: pointer"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;&nbsp;Add and upload <input type="file" name="file" id="video-input"/></span>
                    <br/>
                    <div id="success-upload-video" style="display: none; text-align: center">
                        Video uploaded successfully!
                    </div>
                <!-- <div id="addPhoto"></div> -->
                    <div id="gallery-video" class="container">
                        <div class="row" style="padding-top:10px">
                            
                            <?php 
                                $user_id = $_SESSION['id'];
                                $sql = "SELECT * FROM videos WHERE user_id = $user_id";
                                $result = mysqli_query($conn, $sql);

                                $rowcount = mysqli_num_rows($result);
                                if($rowcount > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                        $video = $row['video'];
                            ?>
                            <div class="col col-sm-3" id="addVideos">
                                <!-- <img src="uploads/videos/<?php //echo $image; ?>" alt="<?php //echo $id;?>" style="width:150px; height:150px; display: block; margin: auto;"/> -->
                                <video width="300" controls style="margin-left: 10px; display: block; margin: auto;"><source src="uploads/videos/<?php echo $video; ?>" type="video/mp4"></video>
                                <br/>
                                <!-- <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#exampleModal" id=<?php //echo $id; ?>>Delete</button> -->
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-file" id="video-upload-btn" data-toggle="tab" href="#finish" role="tab" aria-controls="finish" aria-selected="false"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;Next</button>
                </form>
                <form method="post" action="video-upload-test.php" enctype='multipart/form-data'>
                    <input type='file' name='file' />
                    <input type='submit' value='Upload' name='upload'>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="finish" role="tabpanel" aria-labelledby="finish-tab">
            <div style="margin-top: 50px">
                <div id="finish-form">
                    <i class="fa fa-smile-o" aria-hidden="true" style="font-size: 50px; display: block; margin: auto; text-align: center; margin-bottom: 10px;"></i>
                    <h4 style="text-align: center;">Yay! You have created your own resume!</h4>   
                    <h6 style="text-align: center; color: rgb(184, 184, 184)">Click Finish button to return to dashboard</h6>   
                    <a class="btn btn-primary btn-file" href="dashboard.php"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Finish</a> 
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- <div class="container-fluid form-content">
    <div class="tab-container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-video-camera"  aria-hidden="true"></i>&nbsp;&nbsp;Videos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;Documents</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;&nbsp;Photos</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container">
                <div class="row">
                    <div class="col md-4 left-container">
                        <img src="images/video1.png" alt="video-image"/>
                    </div>
                    <div class="col md-8 right-container">
                    <h4>Upload your videos</h4>
                    <form method="POST" action="video-upload.php" enctype="multipart/form-data">
                        <div id="addVideos">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="video-input" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-add" id="addVideobutton" style="color: #2B303A">Add</button>
                        <button class="btn btn-primary btn-file" type="submit" name="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;&nbsp;Upload</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container">
                <div class="row">
                    <div class="col md-4 left-container">
                        <img src="images/folder-flat.png" alt="folder-image"/>
                    </div>
                    <div class="col md-8 right-container">
                    <h4>Upload your documents</h4>
                    <form method="POST" action="document-upload.php" enctype="multipart/form-data">
                        <div id="addDocuments">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="document-input" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-add" id="addDocbutton" style="color: #2B303A">Add</button>
                        <button class="btn btn-primary btn-file" type="submit" name="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;&nbsp;Upload</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> -->
        <!-- <div class="container">
                <div class="row"> -->
                    <!-- <div class="col md-4 left-container">
                        <img src="images/photo.png" alt="photo-image"/>
                    </div> -->
                    <!-- <div class="col md-8 right-container"> -->
                    <!-- <h4 style="margin-top: 50px; text-align:center">Upload your photos</h4>
                    <form method="POST" action="image-upload.php" enctype="multipart/form-data" id="image-upload-form">
                    <span class="btn btn-primary btn-file"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;&nbsp;Add and upload <input type="file" name="file" id="photo-input"/></span>
                        <div id="addPhotos"> -->
                            <!-- <input type="file" name="files[]" id="files" multiple /> -->
                            <!-- <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file[]" id="photo-input" aria-describedby="inputGroupFileAddon01" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div> -->
                        <!-- </div>
                        <div id="gallery" class="container">
                            <div class="row" style="padding-top:10px">
                                 -->
                                <?php 
                                    // $sql = "SELECT * FROM images";
                                    // $result = mysqli_query($conn, $sql);

                                    // $rowcount = mysqli_num_rows($result);
                                    // if($rowcount > 0){
                                    //     while($row = mysqli_fetch_assoc($result)){
                                    //         $id = $row['id'];
                                    //         $image = $row['image'];
                                ?>
                                <!-- <div class="col col-sm-3" id="addPhotos">
                                    <img src="uploads/images/<?php //echo $image; ?>" alt="<?php //echo $id;?>" style="width:150px; height:150px; display: block; margin: auto;"/>
                                    <br/>
                                    <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#exampleModal" id=<?php //echo $id; ?>>Delete</button>
                                </div> -->
                                <?php
                                    //     }
                                    // }
                                ?>
                            <!-- </div>
                        </div> -->
                        
                        <!-- <button class="btn btn-primary btn-add" id="addImgbutton" style="color: #2B303A">Add</button>
                        <button class="btn btn-primary btn-file" type="submit" name="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;&nbsp;Upload</button> -->
                    <!-- </form> -->
                    <!-- </div>
                </div> -->
            </div>
        </div></div>
    </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete image?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="delete-image.php" >
                <div class="modal-body">
                    Are you sure you want to delete this image?
                    <input type="hidden" id="delete-id" name="id"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


<?php require("footer.php"); ?>