<?
require_once(realpath(dirname(__FILE__) ."/../../db_function/connection.php"));
require_once(realpath(dirname(__FILE__) ."/../../db_function/function.php"));
require_once('PHPMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->isHTML();
	$mail->CharSet = "utf-8"; //ตั้งเป็น UTF-8 เพื่อให้อ่านภาษาไทยได้
	$mail->Username = ""; //ใส่ Gmail
	$mail->Password = ""; // ใส่รหัสผ่าน
	$mail->SetFrom = ('no-reply@domaintest.com'); //ตั้ง email เพื่อใช้เป็นเมล์อ้างอิงในการส่ง ใส่หรือไม่ใส่ก็ได้
	$mail->FromName = "system repair"; //ชื่อที่ใช้ในการส่ง
	$mail->Subject = ($_POST["txtSubject"]);  //หัวเรื่อง emal ที่ส่ง
	$mail->Body = ($_POST["txtDescription"]); //รายละเอียดที่ส่ง
	$mail->AddAddress($_POST["txtTo"]); //อีเมล์และชื่อผู้รับ





	//ตรวจสอบว่าส่งผ่านหรือไม่
	if($mail->Send()){
        $_SESSION["STATUS"] = TRUE;
        $_SESSION["MSG"] = lang("Successful data deletion.", false);
        header("location:../../index.php?page=sendmail");
        exit();

	}


else{
    defined('APPS') OR exit('No direct script access allowed');
}
?>
