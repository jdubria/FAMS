<?php 
include 'connection.php';
include 'session.php';
include 'function.php';
include '../assets/nexmo/NexmoMessage.php';
require '../assets/vendor/autoload.php';
require '../assets/vendor/phpmailer/phpmailer/src/Exception.php';
require '../assets/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../assets/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['a'])) {

$sem_id = $_SESSION['sem_id'];
$ay_id = $_SESSION['ay_id'];
$cur_day = get_curday();
$cur_date = get_curDates();

$faculty = array();
$contact = array();
$email = array();
$first_name = array();
$last_name = array();
$i = 0;

$query = "SELECT * FROM faculty WHERE fac_active = 1;";

$result = mysqli_query($conn, $query);

while ($rows = mysqli_fetch_array($result)) {
	$faculty[] = $rows['fac_num'];
	$contact[] = $rows['contact'];
	$email[] = $rows['email'];
	$first_name[] = $rows['first_name'];
	$last_name[] = $rows['last_name'];
}

foreach ($faculty as $fac_num) {

  $query1 = "
   	SELECT COUNT(ass_id) AS schedulePerDay FROM assign_schedule  
	INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
	INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
	INNER JOIN subject ON assign_subject.sub_id = subject.sub_id
	INNER JOIN room ON assign_schedule.room_id = room.room_id
	INNER JOIN course_year ON assign_schedule.cy_id = course_year.cy_id
	INNER JOIN semester ON assign_schedule.sem_id = semester.sem_id
	INNER JOIN academic_year ON assign_schedule.ay_id = academic_year.ay_id
	WHERE assign_schedule.sched_active = 1 AND faculty.fac_num = {$fac_num}
	AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id} AND assign_schedule.day = '$cur_day';
    ";

 $sql = mysqli_query($conn, $query1);

    $get = mysqli_fetch_assoc($sql);

    $num_sched = $get['schedulePerDay'];

    if ($num_sched != 0) {
    		$average = $num_sched * 0.70;
    		$query2="
			SELECT COUNT(present) AS absent, attendance.att_id FROM attendance
			INNER JOIN assign_schedule ON attendance.ass_id = assign_schedule.ass_id
			INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
			INNER JOIN semester ON attendance.sem_id = semester.sem_id
			INNER JOIN academic_year ON attendance.ay_id = academic_year.ay_id
			INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
			WHERE assign_schedule.day = '{$cur_day}' AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id}
			AND attendance.date = '{$cur_date}' AND faculty.fac_num = '{$fac_num}' AND attendance.present = 0;
			";	
			

			$sql1 = mysqli_query($conn, $query2);
			$get1 = mysqli_fetch_assoc($sql1);
			$att_id = $get1['att_id'];

			
			if ($att_id != "") {
				$query3 = "SELECT * FROM logs_per_day WHERE att_id = {$att_id} AND date_checked = '{$cur_date}'";
				$sql2 = mysqli_query($conn, $query3);
				
				if (mysqli_num_rows($sql2) > 0) {
					echo "No data has been logged  " ;
				
				}else{
					if ($num_sched == $get1['absent']) {
						$statement = mysqli_query($conn, "INSERT INTO `fams`.`logs_per_day` (`att_id`, `date_checked`, `absent`, `sem_id`, `ay_id`) VALUES ('{$att_id}', '{$cur_date}', '1', '{$sem_id}', '{$ay_id}');");

						echo "Data is been logged ";
					}elseif($get1['absent'] > $average){
						$statement = mysqli_query($conn, "INSERT INTO `fams`.`logs_per_day` (`att_id`, `date_checked`, `absent`, `sem_id`, `ay_id`) VALUES ('{$att_id}', '{$cur_date}', '1', '{$sem_id}', '{$ay_id}');");

						echo "Data is been logged ";
					}else{
						
					}					
				}
			}


    }else{

    }        	
	
  //------------------------------------------------------------------------------------------
$query4 = "SELECT * FROM cons_log WHERE fac_num = {$fac_num}";

$sql3 = mysqli_query($conn, $query4); 


	if (mysqli_num_rows($sql3) > 0) {
		$query5 = "SELECT MAX(last_date) AS last_check, cons_log. * FROM cons_log WHERE fac_num = {$fac_num}";	
		$sql4 = mysqli_query($conn, $query5);
		$fetch = mysqli_fetch_assoc($sql4);
		$last_checked = $fetch['last_check'];
		$query6 ="
		SELECT COUNT(absent) AS absent, MIN(date_checked) AS first_checked, 
		MAX(date_checked) AS last_checked, faculty.fac_num FROM  logs_per_day
		INNER JOIN attendance ON logs_per_day.att_id = attendance.att_id
		INNER JOIN assign_schedule ON attendance.ass_id = assign_schedule.ass_id
		INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
		INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
		WHERE faculty.fac_num = {$fac_num} AND attendance.date > '{$last_checked}'
		GROUP BY faculty.fac_num
		HAVING absent >= 3
		ORDER BY logs_per_day.log_pd
		";

		$sql5 = mysqli_query($conn, $query6);
		if (mysqli_num_rows($sql5) > 0) {
			$get3 = mysqli_fetch_assoc($sql6);
			$last_checkeds = $get3['last_checked'];
			$stmt1 = mysqli_query($conn, "INSERT INTO `fams`.`cons_log` (`fac_num`, `last_date`) 
			VALUES ('{$fac_num}', '{$last_checkeds}');");
		    
		    // Step 1: Declare new NexmoMessage.
		    $nexmo_sms = new NexmoMessage('cbffa7f7', 'GtdosJygdnQxhE6R');

		    // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
		     $info = $nexmo_sms->sendText( $contact[$i], 'BSIS FAMS', 'Mr/Ms '.$first_name[$i].' '.$last_name[$i].' you already have 3 absences made. Kindly settle this ASAP. Thanks.' );

		    // Step 3: Display an overview of the message
		    echo $nexmo_sms->displayOverview($info); echo "\n";

		    // Done!				
			
			$mail = new PHPMailer(true);

			try {
			    //Server settings
			    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   
			    $mail->isSMTP();                                         
			    $mail->Host       = 'smtp.gmail.com';                    
			    $mail->SMTPAuth   = true;                                
			    $mail->Username   = 'bsisatmonsys@gmail.com';            
			    $mail->Password   = 'faculty1234';                       
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
			    $mail->Port       = 587;                                 

			    //Recipients
			    $mail->setFrom('bsisatmonsys@gmail.com', 'BSIS Attendance Monitoring System');
			    $mail->addAddress(''.$email[$i].'', ''.$first_name[$i].' '.$last_name[$i].'');
			    $mail->addAddress(''.$email[$i++].'');               


			    // Content
			    $mail->isHTML(true);                                 
			    $mail->Subject = 'Absent Made';
			    $mail->Body    = 'You have made an absent. Kindly settle this with your Chairperson.';
			    $mail->AltBody = 'You have made an absent. Kindly settle this with your Chairperson.';

			    $mail->send();
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo "Message could not be sent.";
			}
				

		}else{
			echo "no message sent \n";
		}


	}else{

		$query7 = "
		SELECT COUNT(absent) AS absent, MIN(date_checked) AS first_checked, 
		MAX(date_checked) AS last_checked, faculty.fac_num FROM  logs_per_day
		INNER JOIN attendance ON logs_per_day.att_id = attendance.att_id
		INNER JOIN assign_schedule ON attendance.ass_id = assign_schedule.ass_id
		INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
		INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
		WHERE faculty.fac_num = {$fac_num}
		GROUP BY faculty.fac_num
		HAVING absent >= 3
		ORDER BY logs_per_day.log_pd
		";
		$sql6 = mysqli_query($conn, $query7);

		if (mysqli_num_rows($sql6) > 0) {
			$get2 = mysqli_fetch_assoc($sql6);
			$last_checkeds = $get2['last_checked'];
			$stmt = mysqli_query($conn, "INSERT INTO `fams`.`cons_log` (`fac_num`, `last_date`) 
				VALUES ('{$fac_num}', '{$last_checkeds}');");
			
		    // Step 1: Declare new NexmoMessage.
		    $nexmo_sms = new NexmoMessage('cbffa7f7', 'GtdosJygdnQxhE6R');

		    // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
		    $info = $nexmo_sms->sendText( $contact[$i], 'BSIS FAMS', 'Mr/Ms '.$first_name[$i].' '.$last_name[$i].' you already have 3 absences made. Kindly settle this ASAP. Thanks.' );

		    // Step 3: Display an overview of the message
		    echo $nexmo_sms->displayOverview($info); echo "\n";
		    echo $contact[$i];
		    echo 'BSIS FAMS', 'Mr/Ms '.$first_name[$i].' '.$last_name[$i].' you already have 3 absences made. Kindly settle this ASAP. Thanks.';
		    // Done!			

			$mail = new PHPMailer(true);

			try {
			    //Server settings
			    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   
			    $mail->isSMTP();                                         
			    $mail->Host       = 'smtp.gmail.com';                    
			    $mail->SMTPAuth   = true;                                
			    $mail->Username   = 'bsisatmonsys@gmail.com';            
			    $mail->Password   = 'faculty1234';                       
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
			    $mail->Port       = 587;                                 

			    //Recipients
			    $mail->setFrom('bsisatmonsys@gmail.com', 'BSIS Attendance Monitoring System');
			    $mail->addAddress(''.$email[$i].'', ''.$first_name[$i].' '.$last_name[$i].'');
			    $mail->addAddress(''.$email[$i++].'');               


			    // Content
			    $mail->isHTML(true);                                 
			    $mail->Subject = 'Absent Made';
			    $mail->Body    = 'You have made an absent. Kindly settle this with your Chairperson.';
			    $mail->AltBody = 'You have made an absent. Kindly settle this with your Chairperson.';

			    $mail->send();
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo "Message could not be sent.";
			}
				

		}else{

			echo "no message sent \n";

		}

	}

}
// endforeach



}



?>