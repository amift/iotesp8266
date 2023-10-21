<?php
/**
 * Name 	: General_helper.php
 * by       : miftahul (a.k.a) amift 
 * email    : miftahul81@gmail.com
 * year     : 2018
 *
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('random_str')) {
    function random_str($complicated=false,$length = 16){
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($complicated==true){
        	$pool.= '!@#$%^&*(){}[]<>';
        }
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}

if ( ! function_exists('db_date_format')) {
	function db_date_format($mydate){
		return date('Y-m-d',strtotime($mydate));
	}
}

if ( ! function_exists('human_date_format')) {
	function human_date_format($dbdate){
		return date('d-m-Y',strtotime($dbdate));
	}
}

if ( ! function_exists('create_slug')) {
	function create_slug($title){
		return url_title(strtolower($title));
	}
}


if ( ! function_exists('limit_content')) {
	function limit_content($content,$limit){
		$num_char=$limit;
		$text=$content;
		$char = $text{$num_char - 1};
		while($char != ' ') {
			$char = $text{--$num_char}; // Cari spasi pada posisi 49, 48, 47, dst...
		}
		return substr($text, 0, $num_char);
	}
}

if (! function_exists('send_mail')){
    function send_mail($data){
	   // load library email
		$mail = new PHPMailer(true);
		try {
			$mail->IsSMTP();
			$mail->SMTPSecure = MAIL_SMTPSECURE;
			$mail->Host = MAIL_HOST;
			$mail->SMTPDebug = MAIL_SMTPDEBUG;
			$mail->Port = MAIL_PORT;
			$mail->SMTPAuth = MAIL_SMTPAUTH;
			$mail->Username = MAIL_USERNAME;
			$mail->Password = MAIL_PASSWORD;
			$mail->SetFrom(MAIL_SETFROM,MAIL_SETFROM);
			$mail->Subject = $data['email_subject'];
			$mail->AddAddress($data['email_to']);
			$mail->MsgHTML($data['email_message']);
	  		$mail->Send();
	  		$result='OK';
		} catch (phpmailerException $e) {
	  		$result=$e->errorMessage(); 
		} catch (Exception $e) {
		  	$result=$e->getMessage();
		}
		return $result;
	}
} 
