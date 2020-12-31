<?php require("components/header.php"); ?>
<body>
<?php require("navbar.php"); ?>
<?php require("config/db.php"); 
    $resume = $_GET['id'];
    $user_id = $_GET['user_id'];
?>

<div class="container-fluid form-content" style="font-family: 'Baloo Bhai', cursive; background-color: #fff">
    <h3 style="color:#2b303a; text-align: center">Edit Resume</h3>
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

        <?php 
            $sql = "SELECT * FROM template_temp AS tt 
            JOIN profile_temp AS pt ON tt.resume_id = pt.resume_id AND tt.user_id = pt.user_id
            JOIN institution_temp AS it ON tt.resume_id = it.resume_id AND tt.user_id = it.user_id
            JOIN work_temp AS wt ON tt.resume_id = wt.resume_id AND tt.user_id = wt.user_id
            JOIN award_temp AS awt ON tt.resume_id = awt.resume_id AND tt.user_id = awt.user_id
            JOIN activities_temp AS act ON tt.resume_id = act.resume_id AND tt.user_id = act.user_id
            WHERE tt.resume_id = '$resume' AND tt.user_id = '$user_id'";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div style="margin-top: 50px">
                        <i class="fa fa-user" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #D64933"></i>
                        <h6 style="text-align: center; color: #D64933">My Personal Information</h6>
                        <form method="POST" action="edit-profile.php" id="edit-profile" enctype='multipart/form-data'>
                        <input type="hidden" value="<?php echo $resume;?>" name="resume_id"/>
                        <input type="hidden" value="<?php echo $user_id;?>" name="user_id"/>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $row["name"];?>" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Current Job</label>
                                        <input type="text" class="form-control" name="job" id="job" value="<?php echo $row['job'];?>" placeholder="What do you do?">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email'];?>" aria-describedby="emailHelp" placeholder="Your email">
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row['phone'];?>" placeholder="Your contact number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Location</label>
                                <input type="text" class="form-control" name="location" id="location" value="<?php echo $row['location'];?>" aria-describedby="emailHelp" placeholder="Where do you live?">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Summary</label>
                                <textarea class="form-control" name="summary" id="summary" rows="3" placeholder="Tell us about yourself"><?php echo $row['summary'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Profile picture:</label>&nbsp;&nbsp;
                                <input type="file" name="file" style="font-family: 'Baloo Bhai', cursive;">
                            </div>
                            <h6 style="text-align: center; margin-top: 100px">Social medias</h6>
                            <small class="form-text text-muted" style="text-align: center">Provide links for any social media that you have</small>
                            <div class="container-fluid" style="margin-top: 50px">
                                <div class="row">
                                    <!-- <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;&nbsp;Website</label>
                                            <input type="text" class="form-control" name="website" id="website" value=<?php echo $row['website'];?> aria-describedby="emailHelp" placeholder="Your website link">
                                        </div>
                                    </div> -->
                                    <div class="col col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><i class="fab fa-linkedin"></i>&nbsp;&nbsp;LinkedIn</label>
                                            <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?php echo $row['linkedin'];?>" placeholder="Your LinkedIn profile link">
                                        </div>
                                    </div>
                                    <div class="col col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><i class="fab fa-github"></i>&nbsp;&nbsp;GitHub</label>
                                            <input type="text" class="form-control" name="github" id="github" value="<?php echo $row['github'];?>" placeholder="Your GitHub profile link">
                                        </div>
                                    </div>
                                    <!-- <div class="col col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;&nbsp;Facebook</label>
                                            <input type="text" class="form-control" name="facebook" id="facebook" value=<?php //echo $row['facebook'];?> placeholder="Your Facebook profile link">
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <h6 style="text-align: center; margin-top: 100px">Video</h6>
                            <small class="form-text text-muted" style="text-align: center">Upload any video like your introduction, etc.</small>
                            <div class="container-fluid" style="margin-top: 50px">
                                <div class="row">
                                    <div class="col" style="text-align: center">
                                        <div class="form-group">
                                            <input type='file' name='video' id="file-upload"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-file" id="profile-edit-btn" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;Next</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                    <div style="margin-top: 50px">
                    <i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #D64933"></i>
                    <h6 style="text-align: center; color: #D64933">My Education Background</h6> 
                    <form method="POST" action="edit-institution.php" id="edit-institution"> 
                        <input type="hidden" value="<?php echo $resume;?>" name="resume_id"/>
                        <input type="hidden" value="<?php echo $user_id;?>" name="user_id"/>
                        <div id="addEducationSection">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Institution</label>
                                            <input type="text" class="form-control" value="<?php echo $row['institution'];?>" name="institution" id="institution" aria-describedby="emailHelp" placeholder="Which institution do/did you study?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Area of study</label>
                                            <input type="text" class="form-control" value="<?php echo $row['studyarea'];?>" name="studyarea" id="studyarea" placeholder="What do you study?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Your highest education level</label>
                                            <select class="custom-select" name="edulevel" id="edulevel" value="<?php echo $row['edulevel'];?>">
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
                                    <div class="col col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Country</label>
                                            <input type="text" class="form-control" name="country" value="<?php echo $row['country'];?>" id="country" aria-describedby="emailHelp" placeholder="Which country do you study?">
                                        </div>
                                    </div>
                                    <div class="col col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">City</label>
                                            <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['city'];?>" placeholder="Which city do you study?">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Start Date</label>
                                            <input type="date" class="form-control" name="startdate" value="<?php echo $row['startdate'];?>" id="startdate" aria-describedby="emailHelp" placeholder="The starting date of your study">
                                        </div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">End Date</label>
                                            <input type="date" class="form-control" name="enddate" value="<?php echo $row['enddate'];?>" id="enddate" placeholder="The ending date of your study">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check-edu-date">
                                                <label class="custom-control-label" for="check-edu-date">Present</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CGPA</label>
                                            <input type="text" class="form-control" value="<?php echo $row['cgpa'];?>" name="gpa" id="gpa" aria-describedby="emailHelp" placeholder="Your CGPA">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Transcript</label><br/>
                                            <input type="file" value="<?php echo $row['transcript'];?>" name="transcript" style="font-family: 'Baloo Bhai', cursive;">
                                        </div>
                                    </div>
                                    <div class="col col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Certificate</label><br/>
                                            <input type="file" name="certificate" value="<?php echo $row['certificate'];?>" style="font-family: 'Baloo Bhai', cursive;">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                            <button class="btn btn-primary btn-file" id="education-edit-btn" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="false"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;Next</button>
                    </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="work-tab">
                    <div style="margin-top: 50px">
                        <i class="fa fa-briefcase" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #D64933"></i>
                        <h6 style="text-align: center; color: #D64933">My Work History</h6> 
                        <form method="POST" action="edit-work.php" id="edit-work"> 
                        <input type="hidden" value="<?php echo $resume;?>" name="resume_id"/>
                        <input type="hidden" value="<?php echo $user_id;?>" name="user_id"/>
                            <div id="addWorkSection">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company</label>
                                                <input type="text" class="form-control" value="<?php echo $row['company'];?>" name="company" id="company" aria-describedby="emailHelp" placeholder="Which company did/do you work?">
                                            </div>
                                        </div>
                                        <div class="col col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Position</label>
                                                <input type="text" class="form-control" value="<?php echo $row['position'];?>" name="position" id="position" placeholder="What did/do you do?">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-sm-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Country</label>
                                                <input type="text" class="form-control" value="<?php echo $row['work_country'];?>" name="work_country" id="work_country" aria-describedby="emailHelp" placeholder="Which country do you work?">
                                            </div>
                                        </div>
                                        <div class="col col-sm-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" class="form-control" value="<?php echo $row['work_city'];?>" name="work_city" id="work_city" placeholder="Which city do you work?">
                                            </div>
                                        </div>
                                        <div class="col col-sm-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Start Date</label>
                                                <input type="date" class="form-control" value="<?php echo $row['work_startdate'];?>" name="work_startdate" id="work_startdate" aria-describedby="emailHelp" placeholder="The starting date of your job">
                                            </div>
                                        </div>
                                        <div class="col col-sm-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">End Date</label>
                                                <input type="date" class="form-control" value="<?php echo $row['work_enddate'];?>" name="work_enddate" id="work_enddate" placeholder="The ending date of your job">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkworkenddate">
                                                    <label class="custom-control-label" for="checkworkenddate">Present</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                                <button class="btn btn-primary btn-file" id="work-edit-btn" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;Next</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                    <div style="margin-top: 50px">
                        <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #D64933"></i>
                        <h6 style="text-align: center; color: #D64933">My Activities</h6>
                        <form method="POST" action="edit-activities.php" id="edit-activities"> 
                        <input type="hidden" value="<?php echo $resume;?>" name="resume_id"/>
                        <input type="hidden" value="<?php echo $user_id;?>" name="user_id"/>
                            <div id="addActivitySection">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Activity Name</label>
                                                <input type="text" class="form-control" name="activity" value="<?php echo $row['activity_name'];?>" id="activity" aria-describedby="emailHelp" placeholder="What activity did you join?">
                                            </div>
                                        </div>
                                        <div class="col col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Country</label>
                                                <input type="text" class="form-control" name="activity_country" value="<?php echo $row['activity_country'];?>" id="activity_country" aria-describedby="emailHelp" placeholder="Which country did you join this activity?">
                                            </div>
                                        </div>
                                        <div class="col col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" class="form-control" name="activity_city" value="<?php echo $row['activity_city'];?>" id="activity_city" placeholder="Which city did you join this activity?">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Start Date</label>
                                                <input type="date" class="form-control" name="activity_startdate" value="<?php echo $row['activity_startdate'];?>" id="activity_startdate" aria-describedby="emailHelp" placeholder="The starting date of your activity">
                                            </div>
                                        </div>
                                        <div class="col col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">End Date</label>
                                                <input type="date" class="form-control" name="activity_enddate" value="<?php echo $row['activity_enddate'];?>" id="activity_enddate" placeholder="The ending date of your activity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" name="activity_desc" id="activity_desc" rows="3" placeholder="Describe your activity here"><?php echo $row['activity_desc'];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Photos of the activity: </label>&nbsp;&nbsp;
                                        <input type="file" name="photos[]" value="<?php echo $row['photos'];?>" style="font-family: 'Baloo Bhai', cursive;" multiple>
                                    </div>
                                </div>
                            </div>
                                <button class="btn btn-primary btn-file" id="activity-edit-btn" data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;Next</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
                    <div style="margin-top: 50px">
                        <i class="fa fa-file" aria-hidden="true" style="font-size: 30px; display: block; margin: auto; text-align: center; margin-bottom: 10px; color: #D64933"></i>
                        <h6 style="text-align: center; color: #D64933">My Awards</h6>
                        <form method="POST" action="edit-award.php" id="edit-award"> 
                        <input type="hidden" value="<?php echo $resume;?>" name="resume_id"/>
                        <input type="hidden" value="<?php echo $user_id;?>" name="user_id"/>
                            <div id="addAccompSection">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Award title</label>
                                                <input type="text" value="<?php echo $row['award'];?>" class="form-control" name="award" id="award" aria-describedby="emailHelp" placeholder="What award have you done?">
                                            </div>
                                        </div>
                                        <div class="col col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Awarder</label>
                                                <input type="text" class="form-control" value="<?php echo $row['awarder'];?>" name="awarder" id="awarder" aria-describedby="emailHelp" placeholder="Who awarded you this award?">
                                            </div>
                                        </div>
                                        <div class="col col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Date</label>
                                                <input type="date" class="form-control" value="<?php echo $row['date'];?>" name="award_date" id="award_date" placeholder="The date of the award">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" name="award_desc" id="award_desc" rows="3" placeholder="Describe your award here"><?php echo $row['award_desc'];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your award certificate: </label>&nbsp;&nbsp;
                                        <input type="file" name="award_cert" value="<?php echo $row['certificate'];?>" style="font-family: 'Baloo Bhai', cursive;">
                                    </div>
                                </div>
                            </div>
                                <button class="btn btn-primary btn-file" id="award-edit-btn" data-toggle="tab" href="#finish" role="tab" aria-controls="finish" aria-selected="false"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;Next</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="finish" role="tabpanel" aria-labelledby="finish-tab">
                    <div style="margin-top: 10px">
                        <div id="finish-form">
                            <i class="fa fa-smile-o" aria-hidden="true" style="font-size: 50px; display: block; margin: auto; text-align: center; margin-bottom: 10px"></i>
                            <h4 style="text-align: center;">Yay! Your resume is edited successfully!</h4>   
                            <h6 style="text-align: center; color: rgb(184, 184, 184)">Click Finish button to return to dashboard</h6>   
                            <a class="btn btn-primary btn-file" href="dashboard.php"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Finish</a> 
                        </div>
                    </div>
                </div>
            </div>
                <?php
                    }
                ?>
            
            </div>
        </div>
</div>


<?php require("footer.php"); ?>