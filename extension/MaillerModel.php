<?php
class Mailler {
	function __construct($email_reques, $toaddress, $body, $Subject, $cc) {
		
		//echo $email_reques. $toaddress. $body. $Subject. $cc;
		$re = true;
		$i = 0;

		if (!class_exists(PHPMailer, false)) {
			require ("../ext/PHPMailer/class.phpmailer.php");
		}

		$body_title = str_replace("</br>", '', $body);
		$body_title = str_replace("<br>", '', $body_title);
		$body_title = str_replace("<br/>", '', $body_title);

		$name_reques = $email_reques;
		$name_requesArray = split(":", trim($name_reques));

		$name = $toaddress;
		$name = "aun_cpe_mut@hotmail.com";
		$nameArray = split(",", trim($name));

		$namecc = $cc;
		$nameccArray = split(",", trim($namecc));

		$mail = new PHPMailer();
		$mail -> CharSet = "utf-8";
		//$mail->CharSet="tis-620";
		$mail -> IsSMTP();
		$mail -> IsHTML(true);
		$mail -> Host = YOURLS_MAIL_HOST;
		// $mail->Host = 'peridot.mtec.or.th';
		$mail -> Port = 25;
		$mail -> SMTPAuth = false;
		$mail -> Username = '';
		$mail -> Password = '';
		$mail -> Encoding = 'quoted-printable';
		foreach ($name_requesArray as $key) {
			if ($i == 0) {
				if ($key != null) {
					$mail -> From = $key;
				}
				$name = $key;
			} else if ($i == 1) {
				if ($key != null) {
					$mail -> FromName = $key;
				}
			}
			$i++;
		}
		if ($i == 1) {
			$mail -> FromName = $name;
		}
		$mail -> Subject = "=?utf-8?b?" . base64_encode("[NAMS_TEST] " . $Subject) . "?=";
		$mail -> Body = $body;
		$mail -> AltBody = $body_title;
		foreach ($nameArray as $key) {
			if ($key != null) {
				$mail -> AddAddress($key);
			}
		}

		foreach ($nameccArray as $key) {
			if ($key != null) {
				$mail -> AddCC($key);
			}
		}
		//$mail->addBCC('test.mtec@nstda.or.th');
		//$mail->addBCC('aun_iloveyou@hotmail.com');
		$mail -> addBCC('atiwatc@mtec.or.th');
		//  $mail->addBCC('surasitm@mtec.or.th');
		//ส่งแมล์ ปิดยุ
		/*
		 if(!$mail->Send()) {
		 //echo "Mailer Error: " . $mail->ErrorInfo;
		 $re =  false;
		 } else {
		 //echo "<font color=#009900>บันทึกข้อมูล และส่งเมล์ไปยังผู้รับผิดชอบ เรียบร้อยแล้ว</font><br><A HREF = '../services/Job.php' >กลับหน้าหลัก</A>";
		 $re = true;

		 }
		 */

		unset($mail);
		return $re;
	}

}
?>
