<? 
// header("Content-Type: application/vnd.ms-word");
// header("Expires: 0");
// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
// header("content-disposition: attachment;filename=Report.doc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://aframe.io/releases/0.9.2/aframe.min.js"></script>
    <script src="https://raw.githack.com/jeromeetienne/AR.js/2.0.5/aframe/build/aframe-ar.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/brands.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/solid.css" rel="stylesheet">
    <title>AResume</title>

    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/landing-page.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
</head>
<?php require('config/db.php'); ?>

<?php 
    $resume_id = $_GET['id'];
    $user_id = $_GET['user_id'];
    // $sql = "SELECT * FROM template_temp AS tt 
    //         JOIN profile_temp AS pt ON tt.resume_id = pt.resume_id AND tt.user_id = pt.user_id
    //         JOIN institution_temp AS it ON tt.resume_id = it.resume_id AND tt.user_id = it.user_id
    //         JOIN work_temp AS wt ON tt.resume_id = wt.resume_id AND tt.user_id = wt.user_id
    //         JOIN award_temp AS awt ON tt.resume_id = awt.resume_id AND tt.user_id = awt.user_id
    //         JOIN activities_temp AS act ON tt.resume_id = act.resume_id AND tt.user_id = act.user_id";

    $sql = "SELECT * FROM template_temp AS tt 
            JOIN profile_temp AS pt ON tt.resume_id = pt.resume_id AND tt.user_id = pt.user_id
            JOIN institution_temp AS it ON tt.resume_id = it.resume_id AND tt.user_id = it.user_id
            JOIN work_temp AS wt ON tt.resume_id = wt.resume_id AND tt.user_id = wt.user_id
            JOIN award_temp AS awt ON tt.resume_id = awt.resume_id AND tt.user_id = awt.user_id
            JOIN activities_temp AS act ON tt.resume_id = act.resume_id AND tt.user_id = act.user_id
            WHERE tt.resume_id = '$resume_id' AND tt.user_id = '$user_id'";
            
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $template = $row['template'];
        $profile_image = $row['profile_image'];
        $name = $row['name'];
        $job = $row['job'];
        $email = $row['email'];
        $phone = $row['phone'];
        $location = $row['location'];
        $summary = $row['summary'];
        $website = preg_replace('#(^https?:\/\/(w{3}\.)?)|(\/$)#', '', $row['website']);
        $linkedin = preg_replace('#(^https?:\/\/(w{3}\.)?)|(\/$)#', '', $row['linkedin']);
        $github = preg_replace('#(^https?:\/\/(w{3}\.)?)|(\/$)#', '', $row['github']);
        $facebook = preg_replace('#(^https?:\/\/(w{3}\.)?)|(\/$)#', '', $row['facebook']);
        $video = $row['video'];

        $institution = $row['institution'];
        $studyarea = $row['studyarea'];
        $edulevel = $row['edulevel'];
        $country = $row['country'];
        $city = $row['city'];
        $startdate = $row['startdate'];
        $enddate = $row['enddate'];
        $gpa = $row['cgpa'];
        $transcript = $row['transcript'];
        $certificate = $row['certificate'];

        $company = $row['company'];
        $position = $row['position'];
        $work_country = $row['work_country'];
        $work_city = $row['work_city'];
        $work_startdate = $row['work_startdate'];
        $work_enddate = $row['work_enddate'];

        $activity_name = $row['activity_name'];
        $activity_country = $row['activity_country'];
        $activity_city = $row['activity_city'];
        $activity_startdate = $row['activity_startdate'];
        $activity_enddate = $row['activity_enddate'];
        $activity_desc = $row['activity_desc'];
        $activity_photo = $row['photos'];

        $award = $row['award'];
        $awarder = $row['awarder'];
        $award_date = $row['date'];
        $award_desc = $row['award_desc'];
        $award_cert = $row['certificate'];

        $query_string = urlencode("https://aresume-conf.000webhostapp.com/scanner-test-2.php?user_id=".$user_id."&resume_id=".$resume_id);
        if($template=='aresume-template-background.jpg'){
        ?>
        <div style="background-image:url('images/aresume-template-background.png')" class="page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-md-4 column">
                        <?php 
                            if(!empty($profile_image)){
                                ?>
                                <img src="uploads/images/<?php echo $profile_image; ?>" alt="profile-image" style="width: 60%; height: 15%; display: block; margin: auto; border-radius: 50%; margin-bottom: 20px;"/>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($name)){
                                ?>
                                <h4 style="color: #fff; text-align: center"><?php echo $name;?></h4>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($job)){
                                ?>
                                <h4 style="color: #fff; text-align: center; margin-top: 20px;"><?php echo $job;?></h4>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($video)){
                                ?>
                                <div style="margin-top: 50px; margin-bottom: 50px">
                                    <p style="color: #fff; text-align: center">About Me</p>
                                    <img src="ar-marker/pattern-profile_marker.png" alt="profile marker" style="width: 40px; height: 40px; display: block; margin: auto; margin-top: 10px;"/>
                                </div>
                                <?php
                            }
                        ?>
                        <div style="margin-top: 30px">
                        <?php 
                            if(!empty($location)){
                                ?>
                                <p style="color: #fff"><i style="color: #e1ce7a"class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $location;?></p>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($phone)){
                                ?>
                                <p style="color: #fff"><i style="color: #e1ce7a" class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $phone;?></p>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($email)){
                                ?>
                                <p style="color: #fff"><i style="color: #e1ce7a" class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $email;?></p>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($linkedin)){
                                ?>
                                <p style="color: #fff"><i style="color: #e1ce7a" class="fab fa-linkedin"></i>&nbsp;&nbsp;&nbsp;<?php echo $linkedin;?></p>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($github)){
                                ?>
                                <p style="color: #fff"><i style="color: #e1ce7a" class="fab fa-github"></i>&nbsp;&nbsp;&nbsp;<?php echo $github;?></p>
                                <?php
                            }
                        ?>
                            <div class="marker">
                                <p style="color: #fff; font-size: 13px">Scan for Augmented Reality experience</p>
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=<?php echo $query_string;?>" style="display: block; margin: auto;" alt="qr code" />
                                <!-- <img src="ar-marker/pattern-ar-marker-ps.png" style="display: inline-block; margin: auto;float:right" alt="hiro ar marker" width="100px" height="100px"/> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col col-md-1"></div> -->
                    <div class="col col-md-8" style="padding-left: 30px">
                        <?php 
                            if(!empty($summary)){
                                ?>
                                    <div style="background-color: #424b54; padding: 10px 10px 10px 40px; color: #fff;"><h4><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Career Objective</h4></div>
                                    <div style="padding: 10px 10px 10px 40px; color:#424b54; font-weight: bold">
                                        <p><?php echo $summary;?></p>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($institution)){
                                ?>
                                    <div style="background-color: #424b54; padding: 10px 10px 10px 40px; color: #fff; margin-top: 20px">
                                        <h4 style="display:inline-block"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Education</h4>
                                        <?php 
                                            if(!empty($transcript)){
                                        ?>
                                        <img src="ar-marker/pattern-edu_marker.png" alt="education marker" style="width: 40px; height: 40px; float: right; display: inline-block; margin-left: 20px"/>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <div style="padding: 10px 10px 10px 40px; color: #424b54; font-weight: bold">
                                        <h5 style="margin-bottom:10px;"><?php echo $institution;?></h5>
                                        <p style="margin-bottom:0px; "><?php echo $studyarea;?> (<?php echo $edulevel;?>)</p>
                                        <p style="margin-bottom:0px; font-style: italic"><?php echo $city;?>, <?php echo $country;?></p>
                                        <p style="margin-bottom:10px; font-style: italic"><?php echo $startdate;?> - <?php echo $enddate;?></p>
                                        <?php if(!empty($gpa)) { ?>
                                            <p>CGPA: <?php echo $gpa;?></p>
                                        <?php } ?>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($company)){
                                ?>
                                    <div style="background-color: #424b54; padding: 10px 10px 10px 40px; color: #fff; margin-top: 20px"><h4><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;Work History</h4></div>
                                    <div style="padding: 10px 10px 10px 40px; color: #424b54;; font-weight: bold">
                                        <h5 style="margin-bottom:10px;"><?php echo $position;?></h5>
                                        <p style="margin-bottom:10px;"><?php echo $company;?></p>
                                        <p style="margin-bottom:0px; font-style: italic"><?php echo $work_city;?>, <?php echo $work_country;?></p>
                                        <p style="margin-bottom:10px; font-style: italic"><?php echo $work_startdate;?> - <?php echo $work_enddate;?></p>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($activity_name)){
                                ?>
                                    <div style="background-color: #424b54; padding: 10px 10px 10px 40px; color: #fff; margin-top: 20px">
                                        <h4 style="display:inline-block"><i class="fa fa-puzzle-piece" aria-hidden="true"></i>&nbsp;&nbsp;Activities</h4>
                                        <?php 
                                            if(!empty($activity_photo)){
                                        ?>
                                            <img src="ar-marker/pattern-ar-marker-ps.png" alt="activity marker" style="width: 40px; height: 40px; float: right; display: inline-block; margin-left: 20px"/>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div style="padding: 10px 10px 10px 40px; color: #424b54; font-weight: bold">
                                        <h5 style="margin-bottom:10px;"><?php echo $activity_name;?></h5>
                                        <p style="margin-bottom:0px; font-style: italic"><?php echo $activity_city;?>, <?php echo $activity_country;?></p>
                                        <p style="margin-bottom:10px; font-style: italic"><?php echo $activity_startdate;?> - <?php echo $activity_enddate;?></p>
                                        <p style="margin-bottom:10px"><?php echo $activity_desc;?></p>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($award)){
                                ?>
                                    <div style="background-color: #424b54; padding: 10px 10px 10px 40px; color: #fff; margin-top: 20px">
                                        <h4 style="display:inline-block"><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;&nbsp;Awards</h4>
                                        <?php 
                                            if(!empty($award_cert)){
                                        ?>
                                            <img src="ar-marker/kanji.png" alt="award marker" style="width: 40px; height: 40px; display: inline-block; float: right; margin-left: 20px"/>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div style="padding: 10px 10px 10px 40px; color: #424b54; font-weight: bold">
                                        <h5 style="margin-bottom:10px;"><?php echo $award;?>, <?php echo $awarder;?></h5>
                                        <p style="margin-bottom:0px; font-style: italic"><?php echo $award_date;?></p>
                                        <p style="margin-bottom:10px"><?php echo $award_desc;?></p>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }

        if($template=='aresume-template-background-3.jpg'){
            echo $template;
        ?>
        <div style="background-image:url('images/aresume-template-background-3.jpg')" class="page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-md-4 column">
                        <?php 
                            if(!empty($profile_image)){
                                ?>
                                <img src="uploads/images/<?php echo $profile_image; ?>" alt="profile-image" style="width: 60%; height: 15%; display: block; margin: auto; border-radius: 50%; margin-bottom: 20px;"/>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($name)){
                                ?>
                                <h4 style="color: #1a3649; text-align: center"><?php echo $name;?></h4>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($job)){
                                ?>
                                <h4 style="color: #1a3649; text-align: center; margin-top: 20px;"><?php echo $job;?></h4>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($video)){
                                ?>
                                <div style="margin-top: 50px; margin-bottom: 50px">
                                    <p style="color: #1a3649; text-align: center">About Me</p>
                                    <img src="ar-marker/pattern-profile_marker.png" alt="profile marker" style="width: 40px; height: 40px; display: block; margin: auto; margin-top: 10px;"/>
                                </div>
                                <?php
                            }
                        ?>
                        <div style="margin-top: 30px">
                        <?php 
                            if(!empty($location)){
                                ?>
                                <p style="color: #1a3649"><i style="color: #1a3649"class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $location;?></p>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($phone)){
                                ?>
                                <p style="color: #1a3649"><i style="color: #1a3649" class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $phone;?></p>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($job)){
                                ?>
                                <p style="color: #1a3649"><i style="color: #1a3649" class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $email;?></p>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($linkedin)){
                                ?>
                                <p style="color: #1a3649"><i style="color: #1a3649" class="fab fa-linkedin"></i>&nbsp;&nbsp;&nbsp;<?php echo $linkedin;?></p>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($github)){
                                ?>
                                <p style="color: #1a3649"><i style="color: #1a3649" class="fab fa-github"></i>&nbsp;&nbsp;&nbsp;<?php echo $github;?></p>
                                <?php
                            }
                        ?>
                            <div class="marker">
                                <p style="color: #1a3649; font-size: 13px">Scan for Augmented Reality experience</p>
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=<?php echo $query_string;?>" style="display: block; margin: auto;" alt="qr code" />
                                <!-- <img src="ar-marker/pattern-ar-marker-ps.png" style="display: inline-block; margin: auto;float:right" alt="hiro ar marker" width="100px" height="100px"/> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col col-md-1"></div> -->
                    <div class="col col-md-8" style="padding-left: 30px">
                        <?php 
                            if(!empty($summary)){
                                ?>
                                    <div style="background-color: #f4ca40; padding: 10px 10px 10px 40px; color: #1a3649;"><h4><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Career Objective</h4></div>
                                    <div style="padding: 10px 10px 10px 40px; color:#1a3649; font-weight: bold">
                                        <p><?php echo $summary;?></p>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($institution)){
                                ?>
                                    <div style="background-color: #f4ca40; padding: 10px 10px 10px 40px; color: #1a3649; margin-top: 20px">
                                        <h4 style="display:inline-block"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Education</h4>
                                        <?php 
                                            if(!empty($transcript)){
                                        ?>
                                            <img src="ar-marker/pattern-edu_marker.png" alt="education marker" style="width: 40px; height: 40px; float: right; display: inline-block; margin-left: 20px"/>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div style="padding: 10px 10px 10px 40px; color: #1a3649; font-weight: bold">
                                        <h5 style="margin-bottom:10px;"><?php echo $institution;?></h5>
                                        <p style="margin-bottom:0px; "><?php echo $studyarea;?> (<?php echo $edulevel;?>)</p>
                                        <p style="margin-bottom:0px; font-style: italic"><?php echo $city;?>, <?php echo $country;?></p>
                                        <p style="margin-bottom:10px; font-style: italic"><?php echo $startdate;?> - <?php echo $enddate;?></p>
                                        <?php if(!empty($gpa)) { ?>
                                            <p>CGPA: <?php echo $gpa;?></p>
                                        <?php } ?>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($company)){
                                ?>
                                    <div style="background-color: #f4ca40; padding: 10px 10px 10px 40px; color: #1a3649; margin-top: 20px"><h4><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;Work History</h4></div>
                                    <div style="padding: 10px 10px 10px 40px; color: #1a3649;; font-weight: bold">
                                        <h5 style="margin-bottom:10px;"><?php echo $position;?></h5>
                                        <p style="margin-bottom:10px;"><?php echo $company;?></p>
                                        <p style="margin-bottom:0px; font-style: italic"><?php echo $work_city;?>, <?php echo $work_country;?></p>
                                        <p style="margin-bottom:10px; font-style: italic"><?php echo $work_startdate;?> - <?php echo $work_enddate;?></p>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($activity_name)){
                                ?>
                                    <div style="background-color: #f4ca40; padding: 10px 10px 10px 40px; color: #1a3649; margin-top: 20px">
                                        <h4 style="display:inline-block"><i class="fa fa-puzzle-piece" aria-hidden="true"></i>&nbsp;&nbsp;Activities</h4>
                                        <?php if(!empty($activity_photo)){
                                            ?>
                                        <img src="ar-marker/pattern-ar-marker-ps.png" alt="activity marker" style="width: 40px; height: 40px; float: right; display: inline-block; margin-left: 20px"/>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div style="padding: 10px 10px 10px 40px; color: #1a3649;; font-weight: bold">
                                        <h5 style="margin-bottom:10px;"><?php echo $activity_name;?></h5>
                                        <p style="margin-bottom:0px; font-style: italic"><?php echo $activity_city;?>, <?php echo $activity_country;?></p>
                                        <p style="margin-bottom:10px; font-style: italic"><?php echo $activity_startdate;?> - <?php echo $activity_enddate;?></p>
                                        <p style="margin-bottom:10px"><?php echo $activity_desc;?></p>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php 
                            if(!empty($award)){
                                ?>
                                    <div style="background-color: #f4ca40; padding: 10px 10px 10px 40px; color: #1a3649; margin-top: 20px">
                                        <h4 style="display:inline-block"><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;&nbsp;Awards</h4>
                                        <?php if(!empty($award_cert)){ ?>
                                            <img src="ar-marker/kanji.png" alt="award marker" style="width: 40px; height: 40px; display: inline-block; float: right; margin-left: 20px"/>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div style="padding: 10px 10px 10px 40px; color: #1a3649; font-weight: bold">
                                        <h5 style="margin-bottom:10px;"><?php echo $award;?>, <?php echo $awarder;?></h5>
                                        <p style="margin-bottom:0px; font-style: italic"><?php echo $award_date;?></p>
                                        <p style="margin-bottom:10px"><?php echo $award_desc;?></p>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        if($template=='aresume-template2-background.jpg'){
        ?>
        <div style="background-image:url('images/aresume-template2-background.jpg')" class="page">
            <div class="container-fluid">
                <div class="row">
                    <div class="row">
                        <div class="col col-md-4">
                            <?php 
                                if(!empty($profile_image)){
                                    ?>
                                    <img src="uploads/images/<?php echo $profile_image; ?>" alt="profile-image" style="width: 70%; height:60%; display: inline-block; float: left;margin: auto; border-radius: 50%;"/>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="col col-md-4">
                            <?php 
                                if(!empty($name)){
                                    ?>
                                    <h4 style="color:#424b54; text-align: left"><?php echo $name;?></h4>
                                    <?php
                                }
                            ?>
                            <?php 
                                if(!empty($job)){
                                    ?>
                                    <h4 style="color: #424b54; text-align: left; margin-top: 20px;"><?php echo $job;?></h4>
                                    <?php
                                }
                            ?>
                            <?php 
                            if(!empty($summary)){
                                ?>
                                    <div>
                                        <p><?php echo $summary;?></p>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php 
                                if(!empty($location)){
                                    ?>
                                    <p style="color: #fff"><i style="color: #424b54"class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $location;?></p>
                                    <?php
                                }
                            ?>
                                <?php 
                                if(!empty($phone)){
                                    ?>
                                    <p style="color: #fff"><i style="color: #424b54" class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $phone;?></p>
                                    <?php
                                }
                            ?>
                            <?php 
                                if(!empty($email)){
                                    ?>
                                    <p style="color: #fff"><i style="color: #424b54" class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $email;?></p>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="col col-md-4">
                            <?php 
                                if(!empty($video)){
                                    ?>
                                    <!-- <div style="display: inline-block; float: left"> -->
                                        <p style="color: #fff; text-align: center">About Me</p>
                                        <img src="ar-marker/pattern-profile_marker.png" alt="profile marker" style="width: 50px; height: 50px; display: block; margin: auto; margin-top: 5px;"/>
                                    <!-- </div> -->
                                    <?php
                                }
                            ?>
                            <?php 
                            if(!empty($linkedin)){
                                ?>
                                <p style="color: #fff"><i style="color: #424b54" class="fab fa-linkedin"></i>&nbsp;&nbsp;&nbsp;<?php echo $linkedin;?></p>
                                <?php
                            }
                            ?>
                            <?php 
                                if(!empty($github)){
                                    ?>
                                    <p style="color: #fff"><i style="color: #424b54" class="fab fa-github"></i>&nbsp;&nbsp;&nbsp;<?php echo $github;?></p>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6" style="padding-left: 30px; margin-top: 70px">
                            <?php 
                                if(!empty($institution)){
                                    ?>
                                        <h4 style="display:inline-block"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Education</h4>
                                        <?php if(!empty($transcript)){
                                        ?>
                                        <img src="ar-marker/pattern-edu_marker.png" alt="education marker" style="width: 50px; height: 50px; float: right; display: inline-block; margin-left: 20px"/>
                                        <?php    
                                        }?>
                                        <hr style="background-color: #ff8262; height: 3px; border: none"/>
                                        <div style="color: #424b54; font-weight: bold">
                                            <h5 style="margin-bottom:10px;"><?php echo $institution;?></h5>
                                            <p style="margin-bottom:0px; "><?php echo $studyarea;?> (<?php echo $edulevel;?>)</p>
                                            <p style="margin-bottom:0px; font-style: italic"><?php echo $city;?>, <?php echo $country;?></p>
                                            <p style="margin-bottom:10px; font-style: italic"><?php echo $startdate;?> - <?php echo $enddate;?></p>
                                            <?php if(!empty($gpa)) { ?>
                                                <p>CGPA: <?php echo $gpa;?></p>
                                            <?php } ?>
                                        </div>
                                    <?php
                                }
                            ?>
                            <?php 
                                if(!empty($company)){
                                    ?>
                                    <div style="margin-top: 50px">
                                        <h4><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;Work History</h4>
                                        <hr style="background-color: #ff8262; height: 3px; border: none"/>
                                        <div style="color: #424b54; font-weight: bold">
                                            <h5 style="margin-bottom:10px;"><?php echo $position;?></h5>
                                            <p style="margin-bottom:10px;"><?php echo $company;?></p>
                                            <p style="margin-bottom:0px; font-style: italic"><?php echo $work_city;?>, <?php echo $work_country;?></p>
                                            <p style="margin-bottom:10px; font-style: italic"><?php echo $work_startdate;?> - <?php echo $work_enddate;?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                            
                        </div>
                        <div class="col col-md-6" style="margin-top: 70px">
                            <?php 
                                if(!empty($activity_name)){
                                    ?>
                                        <h4 style="display:inline-block"><i class="fa fa-puzzle-piece" aria-hidden="true"></i>&nbsp;&nbsp;Activities</h4>
                                        <?php 
                                            if(!empty($activity_photo)){
                                        ?>
                                        <img src="ar-marker/pattern-ar-marker-ps.png" alt="activity marker" style="width: 50px; height: 50px; float: right; display: inline-block; margin-left: 20px"/>
                                        <?php
                                            }
                                        ?>
                                        <hr style="background-color: #ff8262; height: 3px; border: none"/>
                                        <div style="color: #424b54; font-weight: bold">
                                            <h5 style="margin-bottom:10px;"><?php echo $activity_name;?></h5>
                                            <p style="margin-bottom:0px; font-style: italic"><?php echo $activity_city;?>, <?php echo $activity_country;?></p>
                                            <p style="margin-bottom:10px; font-style: italic"><?php echo $activity_startdate;?> - <?php echo $activity_enddate;?></p>
                                            <p style="margin-bottom:10px"><?php echo $activity_desc;?></p>
                                        </div>
                                    <?php
                                }
                            ?>
                            <?php 
                                if(!empty($award)){
                                    ?>
                                        <div style="margin-top: 50px">
                                            <h4 style="display:inline-block"><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;&nbsp;Awards</h4>
                                            <?php
                                                if(!empty($award_cert)){
                                            ?>
                                                <img src="ar-marker/kanji.png" alt="award marker" style="width: 40px; height: 40px; display: inline-block; float: right; margin-left: 20px"/>
                                            <?php
                                                }
                                            ?>
                                            <hr style="background-color: #ff8262; height: 3px; border: none"/>
                                            <div style="color: #424b54; font-weight: bold">
                                                <h5 style="margin-bottom:10px;"><?php echo $award;?>, <?php echo $awarder;?></h5>
                                                <p style="margin-bottom:0px; font-style: italic"><?php echo $award_date;?></p>
                                                <p style="margin-bottom:10px"><?php echo $award_desc;?></p>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
                            <div style="margin-top: 80%; margin-left: 30%">
                                <div class="marker">
                                    <p style="color: #000; font-size: 13px">Scan for Augmented Reality experience</p>
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=<?php echo $query_string;?>" style="display: block; margin: auto;" alt="qr code" />
                                    <!-- <img src="ar-marker/pattern-ar-marker-ps.png" style="display: inline-block; margin: auto;float:right" alt="hiro ar marker" width="100px" height="100px"/> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col col-md-12">
                            
                        </div>
                         -->
                    <!-- <div class="col col-md-1"></div> -->
                    
                    <!-- </div> -->
                    
                </div>
            </div>
        </div>
        <?php
        }
    }
?>

<?php require('footer.php');?>