<?php
require('fpdf181/fpdf.php');
require('config/db.php');

$resume_id = $_GET['id'];
$user_id = $_GET['user_id'];

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
$qrcode_image = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=".$query_string;
// Instanciation of inherited class
if($template == 'aresume-template-background.jpg'){
    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Image('images/'.$template,0,0,220);
    if(!empty($profile_image)){
        $pdf->Image('uploads/images/'.$profile_image,20,10,35);
    }
    $pdf->SetFont('Arial','',16);
    $pdf->SetTextColor(255,255,255);
    if(!empty($name)){
        $pdf->SetXY(35,65);
        $pdf->Cell(10,0,$name,0,1,'C');
    }
    if(!empty($job)){
        $pdf->SetXY(35,75);
        $pdf->Cell(10,0,$job,0,1,'C');
    }
    if(!empty($video)){
        $pdf->Image('ar-marker/pattern-profile_marker.png',30,85,20);
    }
    $pdf->SetFont('Arial','',12);
    $pdf->SetY(115);
    if(!empty($location)){
        $pdf->Cell(20,0,$location,0,1,'L');
        $pdf->Ln(10);
    }
    if(!empty($phone)){
        $pdf->Cell(20,0,$phone,0,1,'L');
        $pdf->Ln(10);
    }
    if(!empty($email)){
        $pdf->Cell(20,0,$email,0,1,'L');
        $pdf->Ln(10);
    }
    if(!empty($linkedin)){
        $pdf->Cell(20,0,$linkedin,0,1,'L');
        $pdf->Ln(10);
    }
    if(!empty($github)){
        $pdf->Cell(20,0,$github,0,1,'L');
        $pdf->Ln(10);
    }
    $pdf->SetY(250);
    $pdf->Cell(60,0,"Scan here for AR experience",0,1,'C');
    $pdf->Image($qrcode_image,20,255,30,0, "png");
    // $pdf->Image('https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Google_Images_2015_logo.svg/1200px-Google_Images_2015_logo.svg.png',20,255,30,0,'');

    if(!empty($summary)){
        $pdf->SetXY(130,10);
        $title="Career Objective";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(66,74,85);
        $pdf->SetFillColor(66,74,85);
        $pdf->SetTextColor(255,255,255);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(2);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,25);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(225,207,123);
        $pdf->SetDrawColor(225,207,123);
        $pdf->SetTextColor(66,74,85);
        $pdf->MultiCell(110,7,$summary,1,1,'L', false);
    }

    if(!empty($institution)){
        $pdf->SetXY(130,50);
        $title="Education";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(66,74,85);
        $pdf->SetFillColor(66,74,85);
        $pdf->SetTextColor(255,255,255);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(4);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        if(!empty($transcript)){
            $pdf->Image('ar-marker/pattern-ed_marker.png',135,45,20);
        }
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,65);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(225,207,123);
        $pdf->SetTextColor(66,74,85);
        // $pdf->MultiCell(110,7,$institution,0,1,'L');
        $pdf->SetLeftMargin(90);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$studyarea."(".$edulevel.")",0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$city.", ".$country,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$startdate." - ".$enddate,0,1,'L');
        $pdf->Ln(1);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(110,7,"CGPA: ".$gpa,0,1,'L');
    }

    if(!empty($company)){
        $pdf->SetXY(130,120);
        $title="Work History";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(66,74,85);
        $pdf->SetFillColor(66,74,85);
        $pdf->SetTextColor(255,255,255);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(2);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,135);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(225,207,123);
        $pdf->SetTextColor(66,74,85);
        $pdf->MultiCell(110,7,$position,0,1,'L');
        $pdf->SetLeftMargin(90);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$company,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$work_city.", ".$work_country,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$work_startdate." - ".$work_enddate,0,1,'L');
    }

    if(!empty($activity_name)){
        $pdf->SetXY(130,175);
        $title="Activities";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(66,74,85);
        $pdf->SetFillColor(66,74,85);
        $pdf->SetTextColor(255,255,255);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(4);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        if(!empty($activity_photo)){
            $pdf->Image('ar-marker/pattern-ar-marker-ps.png',135,170,20);
        }
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,190);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(225,207,123);
        $pdf->SetTextColor(66,74,85);
        $pdf->MultiCell(110,7,$activity_name,0,1,'L');
        $pdf->SetLeftMargin(90);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$activity_city.", ".$activity_country,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$activity_startdate." - ".$activity_enddate,0,1,'L');
        $pdf->Ln(1);
        $pdf->MultiCell(110,7,$activity_desc,0,1,'L');
    }

    if(!empty($award)){
        $pdf->SetXY(130,240);
        $title="Awards";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(66,74,85);
        $pdf->SetFillColor(66,74,85);
        $pdf->SetTextColor(255,255,255);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(4);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        if(!empty($award_cert)){
            $pdf->Image('ar-marker/pattern-aw_marker.png',135,230,20);
        }
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,253);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(225,207,123);
        $pdf->SetTextColor(66,74,85);
        $pdf->MultiCell(110,7,$award.', '.$awarder,0,1,'L');
        $pdf->SetLeftMargin(90);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$award_date,0,1,'L');
        $pdf->Ln(1);
        $pdf->MultiCell(110,7,$award_desc,0,1,'L');
    }

    $pdf->Output();
}

if($template == 'aresume-template-background-3.jpg'){
    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Image('images/'.$template,0,0,220);
    if(!empty($profile_image)){
        $pdf->Image('uploads/images/'.$profile_image,20,10,35);
    }
    $pdf->SetFont('Arial','',16);
    $pdf->SetTextColor(26,54,73);
    if(!empty($name)){
        $pdf->SetXY(35,65);
        $pdf->Cell(10,0,$name,0,1,'C');
    }
    if(!empty($job)){
        $pdf->SetXY(35,75);
        $pdf->Cell(10,0,$job,0,1,'C');
    }
    if(!empty($video)){
        $pdf->Image('ar-marker/pattern-profile_marker.png',30,85,20);
    }
    $pdf->SetFont('Arial','',12);
    $pdf->SetY(115);
    if(!empty($location)){
        $pdf->Cell(20,0,$location,0,1,'L');
        $pdf->Ln(10);
    }
    if(!empty($phone)){
        $pdf->Cell(20,0,$phone,0,1,'L');
        $pdf->Ln(10);
    }
    if(!empty($email)){
        $pdf->Cell(20,0,$email,0,1,'L');
        $pdf->Ln(10);
    }
    if(!empty($linkedin)){
        $pdf->Cell(20,0,$linkedin,0,1,'L');
        $pdf->Ln(10);
    }
    if(!empty($github)){
        $pdf->Cell(20,0,$github,0,1,'L');
        $pdf->Ln(10);
    }
    $pdf->SetY(250);
    $pdf->Cell(60,0,"Scan here for AR experience",0,1,'C');
    $pdf->Image($qrcode_image,20,255,30,0, "png");
    // $pdf->Image('https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Google_Images_2015_logo.svg/1200px-Google_Images_2015_logo.svg.png',20,255,30,0,'');

    if(!empty($summary)){
        $pdf->SetXY(130,10);
        $title="Career Objective";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(244,202,64);
        $pdf->SetFillColor(244,202,64);
        $pdf->SetTextColor(26,54,73);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(2);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,25);
        $pdf->SetFont('Arial','',12);
        $pdf->SetDrawColor(255,255,255);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        $pdf->MultiCell(110,7,$summary,1,1,'L', false);
    }

    if(!empty($institution)){
        $pdf->SetXY(130,50);
        $title="Education";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(244,202,64);
        $pdf->SetFillColor(244,202,64);
        $pdf->SetTextColor(26,54,73);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(4);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        if(!empty($transcript)){
            $pdf->Image('ar-marker/pattern-ed_marker.png',135,45,20);
        }
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,65);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        // $pdf->MultiCell(110,7,$institution,0,1,'L');
        $pdf->SetLeftMargin(90);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$studyarea."(".$edulevel.")",0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$city.", ".$country,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$startdate." - ".$enddate,0,1,'L');
        $pdf->Ln(1);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(110,7,"CGPA: ".$gpa,0,1,'L');
    }

    if(!empty($company)){
        $pdf->SetXY(130,120);
        $title="Work History";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(244,202,64);
        $pdf->SetFillColor(244,202,64);
        $pdf->SetTextColor(26,54,73);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(2);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,135);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        $pdf->MultiCell(110,7,$position,0,1,'L');
        $pdf->SetLeftMargin(90);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$company,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$work_city.", ".$work_country,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$work_startdate." - ".$work_enddate,0,1,'L');
    }

    if(!empty($activity_name)){
        $pdf->SetXY(130,175);
        $title="Activities";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(244,202,64);
        $pdf->SetFillColor(244,202,64);
        $pdf->SetTextColor(26,54,73);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(4);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        if(!empty($activity_photo)){
            $pdf->Image('ar-marker/pattern-ar-marker-ps.png',135,170,20);
        }
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,190);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        $pdf->MultiCell(110,7,$activity_name,0,1,'L');
        $pdf->SetLeftMargin(90);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$activity_city.", ".$activity_country,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$activity_startdate." - ".$activity_enddate,0,1,'L');
        $pdf->Ln(1);
        $pdf->MultiCell(110,7,$activity_desc,0,1,'L');
    }

    if(!empty($award)){
        $pdf->SetXY(130,240);
        $title="Awards";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((230-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(244,202,64);
        $pdf->SetFillColor(244,202,64);
        $pdf->SetTextColor(26,54,73);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(4);
        // Title
        $pdf->Cell($w,9,$title,1,1,'C',true);
        if(!empty($award_cert)){
            $pdf->Image('ar-marker/pattern-aw_marker.png',135,235,20);
        }
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(90,253);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        $pdf->MultiCell(110,7,$award.', '.$awarder,0,1,'L');
        $pdf->SetLeftMargin(90);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$award_date,0,1,'L');
        $pdf->Ln(1);
        $pdf->MultiCell(110,7,$award_desc,0,1,'L');
    }

    $pdf->Output();
}

if($template == 'aresume-template2-background.jpg'){
    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Image('images/'.$template,0,0,220);
    if(!empty($profile_image)){
        $pdf->Image('uploads/images/'.$profile_image,20,10,35);
    }
    $pdf->SetFont('Arial','',16);
    $pdf->SetTextColor(26,54,73);
    if(!empty($name)){
        $pdf->SetXY(110,15);
        $pdf->Cell(10,0,$name,0,1,'R');
    }
    if(!empty($job)){
        $pdf->SetXY(113,25);
        $pdf->Cell(10,0,$job,0,1,'R');
    }

    if(!empty($summary)){
        // $pdf->SetXY(111,45);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(2);
        $pdf->SetXY(75,35);
        $pdf->SetFont('Arial','',12);
        $pdf->SetDrawColor(255,130,98);
        $pdf->SetFillColor(255,130,98);
        $pdf->SetTextColor(26,54,73);
        $pdf->MultiCell(110,7,$summary,1,1,'R', false);
    }

    if(!empty($location)){
        $pdf->SetLineWidth(2);
        $pdf->SetXY(75,50);
        $pdf->SetFont('Arial','',12);
        $pdf->SetDrawColor(255,130,98);
        $pdf->SetFillColor(255,130,98);
        $pdf->SetTextColor(255,255,255);
        $pdf->MultiCell(110,7,$location,1,1,'R', false);
    }
    if(!empty($phone)){
        $pdf->SetXY(78,70);
        $pdf->Cell(20,0,$phone,0,1,'C');
        $pdf->Ln(10);
    }
    if(!empty($email)){
        $pdf->SetXY(87,75);
        $pdf->Cell(20,0,$email,0,1,'C');
        $pdf->Ln(10);
    }
    if(!empty($linkedin)){
        $pdf->SetXY(97,80);
        $pdf->Cell(20,0,$linkedin,0,1,'C');
        $pdf->Ln(10);
    }
    if(!empty($github)){
        $pdf->SetXY(89,85);
        $pdf->Cell(20,0,$github,0,1,'C');
        $pdf->Ln(10);
    }
    if(!empty($video)){
        $pdf->Image('ar-marker/pattern-profile_marker.png',140,10,20);
    }
    
    
    // $pdf->Image('https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Google_Images_2015_logo.svg/1200px-Google_Images_2015_logo.svg.png',20,255,30,0,'');

    if(!empty($institution)){
        $pdf->SetXY(1,120);
        $title="Education";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((100-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(255,255,255);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(4);
        // Title
        $pdf->Cell($w,9,$title,1,1,'L',true);
        // $pdf->Line(5, 10,20,20);
        if(!empty($transcript)){
            $pdf->Image('ar-marker/pattern-ed_marker.png',55,115,20);
        }
        //Line break
        $pdf->Ln(10);
        $pdf->SetXY(0,140);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        // $pdf->MultiCell(110,7,$institution,0,1,'L');
        $pdf->SetLeftMargin(10);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$studyarea,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$edulevel,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$city.", ".$country,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$startdate." - ".$enddate,0,1,'L');
        $pdf->Ln(1);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(110,7,"CGPA: ".$gpa,0,1,'L');
    }

    if(!empty($company)){
        $pdf->SetXY(2,190);
        $title="Work History";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((100-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(255,255,255);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(2);
        // Title
        $pdf->Cell($w,9,$title,1,1,'L',true);
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(10,205);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        $pdf->MultiCell(110,7,$position,0,1,'L');
        $pdf->SetLeftMargin(10);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$company,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$work_city.", ".$work_country,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$work_startdate." - ".$work_enddate,0,1,'L');
    }

    if(!empty($activity_name)){
        $pdf->SetXY(290,120);
        $title="Activities";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((280-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(255,255,255);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(4);
        // Title
        $pdf->Cell($w,9,$title,1,1,'L',true);
        if(!empty($activity_photo)){
            $pdf->Image('ar-marker/pattern-ar-marker-ps.png',160,115,20);
        }
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(100,140);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        $pdf->MultiCell(110,7,$activity_name,0,1,'L');
        $pdf->SetLeftMargin(100);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$activity_city.", ".$activity_country,0,1,'L');
        $pdf->Ln(1);
        $pdf->Cell(110,7,$activity_startdate." - ".$activity_enddate,0,1,'L');
        $pdf->Ln(1);
        $pdf->MultiCell(110,7,$activity_desc,0,1,'L');
    }

    if(!empty($award)){
        $pdf->SetXY(130,190);
        $title="Awards";
        $pdf->SetFont('Arial','',18);
        $w = $pdf->GetStringWidth($title)+50;
        $pdf->SetX((280-$w)/2);
        // Colors of frame, background and text
        $pdf->SetDrawColor(255,255,255);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        // Thickness of frame (1 mm)
        $pdf->SetLineWidth(4);
        // Title
        $pdf->Cell($w,9,$title,1,1,'L',true);
        if(!empty($award_cert)){
            $pdf->Image('ar-marker/pattern-aw_marker.png',160,185,20);
        }
        // Line break
        $pdf->Ln(10);
        $pdf->SetXY(100,203);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(26,54,73);
        $pdf->MultiCell(110,7,$award.', '.$awarder,0,1,'L');
        $pdf->SetLeftMargin(100);
        $pdf->SetFont('Arial','I',11);
        $pdf->Ln(1);
        $pdf->Cell(110,7,$award_date,0,1,'L');
        $pdf->Ln(1);
        $pdf->MultiCell(110,7,$award_desc,0,1,'L');
    }

    $pdf->SetY(250);
    $pdf->Cell(135,0,"Scan here for AR experience",0,1,'C');
    $pdf->Image($qrcode_image,150,260,30,0, "png");

    $pdf->Output();
}
}


?>