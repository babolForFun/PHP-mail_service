<?php 

    /**
    * Mail sender
    *
    * @author BabolForFun - {@link http://babolforfun.github.io}
    * @package nonePackage
    * @license GPLv2  http://www.opensource.org/licenses/gpl-2.0.php
    */

    include_once("constant.php");
    include_once($_SERVER['DOCUMENT_ROOT'].'PHPMailer/PHPMailerAutoload.php');

    /**
    * Send email function
    *
    * @access public
    * @author BabolForFun - {@link http://babolforfun.github.io}
    * @param $email_address array of email address
    * @param $email_sbj subject of the email
    * @param $email_body body of the email
    * @return void
    */
    public function sendemail($email_address,$email_sbj,$email_body){

        $email_address = array_unique($email_address);

        foreach ($email_address as $email_to_add) 
            $mail->AddAddress($email_to_add);

        $mail = new PHPMailer();
        $mail->Host         = HOST_NAME;
        $mail->Port         = PORT_NUMBER;
        $mail->FromName     = FROM_NAME;
        $mail->Subject      = $email_sbj;
        $mail->Body         = $email_body;
            
        if(!$mail->Send()) {
           echo 'Error: ' . $mail->ErrorInfo . ' Contact System Administrator ' . SYS_ADMIN;
        } 
    }

?>