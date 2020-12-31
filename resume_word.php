<?php 
require_once('composer-2/vendor/autoload.php');
require('config/db.php');
$pw = new \PhpOffice\PhpWord\PhpWord();

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
    $cgpa = $row['cgpa'];

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

    $award = $row['award'];
    $awarder = $row['awarder'];
    $award_date = $row['date'];
    $award_desc = $row['award_desc'];

    $query_string = urlencode("https://aresume-procom.000webhostapp.com/scanner-test-2.php?user_id=".$user_id."&resume_id=".$resume_id);

    $profile_style = array(
        'width' => 100,
        'height' => 100
    );

    $section_style = array(
        'colsNum' => 2,
        'marginTop' => 200,
        'marginLeft' => 200,
        'marginRight' => 200,
        'marginBottom' => 200,
        'colsSpace' => 1440,
        'breakType' => 'continuous',
    );

    // /* [THE HTML] */
    // $section = $pw->addSection($section_style);
    // // $header = $section->addHeader();
    // // $header-> addWatermark('images/'.$template, array('marginTop' => 200, 'marginLeft' => 55));
    // $section -> addImage('uploads/images/'.$profile_image, $profile_style);
    // $section -> addText($name, array('align'=>'center'));
    // $section -> addText($job, array('align'=>'center'));
    // $section -> addTextBreak();
    // $section -> addText($email);
    // $section -> addText($phone);
    // $section -> addText($location);
    // $section -> addText($linkedin);
    // $section -> addText($github);
    // $section -> addTextBreak();
    // $section -> addText($institution);
    // $section -> addText($studyarea);
    // $section -> addText($edulevel);
    // $section -> addText($city.', '.$country);
    // $section -> addText($startdate.' - '.$enddate);
    // $section -> addText($gpa);
    // $section -> addTextBreak();
    // $section -> addText($company);
    // $section -> addText($position);
    // $section -> addText($edulevel);
    // $section -> addText($work_city.', '.$work_country);
    // $section -> addText($work_startdate.' - '.$work_enddate);
    // $section -> addTextBreak();
    // $section -> addText($activity_name);
    // $section -> addText($activity_city.', '.$activity_country);
    // $section -> addText($activity_startdate.' - '.$activity_enddate);
    // $section -> addText($activity_desc);
    // $section -> addTextBreak();
    // $section -> addText($award.', '.$awarder);
    // $section -> addText($award_date);
    // $section -> addText($award_desc);
    // $section -> "<p>This is a paragraph of random text</p>";
    // $section -> "<table><tr><td>A table</td><td>Cell</td></tr></table>";
    // \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

    $section = $pw->createSection();
// Define table style arrays
$styleTable = array('borderSize'=>6, 'borderColor'=>'FFFFFF', 'cellMargin'=>100);
$styleFirstRow = array('borderBottomColor'=>'FFFFFF', 'bgColor'=>'FFFFFF');
// Define cell style arrays
$styleCell = array('valign'=>'center');
$styleCellBTLR = array('valign'=>'center');
// Define font style for first row
$fontStyle = array('bold'=>true, 'align'=>'center', "leftFromText"=>100);
// Add table style
$pw->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
// Add table
$table = $section->addTable('myOwnTableStyle');
// Add row
$table->addRow(900);
// Add cells
$table->addCell(2000, $styleCell)->addImage('uploads/images/'.$profile_image, $profile_style);
$table->addCell(8000, $styleCell)->addText('Profile                                                                                                                               '.$summary, $fontStyle);

$table->addRow();
$table->addCell(2000)->addText($name, array('align'=>'center', 'bold'=>true));
$table->addCell(8000)->addText('Education', array('bold'=>true));
$table->addRow();
$table->addCell(2000)->addText($job, array('align'=>'center', 'bold'=>true));
$table->addCell(8000)->addText($institution);
$table->addRow();
$table->addCell(2000)->addText($location);
$table->addCell(8000)->addText($studyarea.' ('.$edulevel.')');
$table->addRow();
$table->addCell(2000)->addText($phone);
$table->addCell(8000)->addText($city.', '.$country);
$table->addRow();
$table->addCell(2000)->addText($email);
$table->addCell(8000)->addText($startdate.' - '.$enddate);
$table->addRow();
$table->addCell(2000)->addText($linkedin);
$table->addCell(8000)->addText('CGPA: '.$cgpa);
$table->addRow();
$table->addCell(2000)->addText($github);
$table->addCell(8000)->addText('  ');
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText("Work History", array('bold'=>true));
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($job);
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($company.', '.$work_city.', '.$work_country);
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($work_startdate.' - '.$work_enddate);
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText("  ");
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText("Activities", array('bold'=>true));
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($activity_name);
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($activity_city.', '.$activity_country);
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($activity_startdate.' - '.$activity_enddate);
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($activity_desc);
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText("  ");
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText("Awards", array('bold'=>true));
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($award.', '.$awarder);
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($award_date);
$table->addRow();
$table->addCell(2000)->addText("  ");
$table->addCell(8000)->addText($award_desc);

// // Add more rows / cells
// for($i = 1; $i <= 10; $i++) {
// 	$table->addRow();
// 	$table->addCell(2000)->addText("Cell $i");
// 	$table->addCell(2000)->addText("Cell $i");
// }

    /* [OR FORCE DOWNLOAD] */
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment;filename="resume_'.$row['resume_id'].'.docx"');
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw, 'Word2007');
    $objWriter->save('php://output');
}




/* [SAVE FILE ON THE SERVER] */
// $pw->save("html-to-doc.docx", "Word2007");


?>