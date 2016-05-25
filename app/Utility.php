<?php

namespace App;

class Utility {

    public static function renderAlert($alertType, $message) {

        return "<div class='alert alert-$alertType'>
	<strong>Success !!! </strong>$message
                </div>";
    }

    /** Send email through the send grid method
     */
    public static function send_email_sendgrid($subject, $body, $mail_to) {
        $getdata = http_build_query(
                array(
                    'subject' => urlencode($subject),
                    'body' => urlencode($body),
                    'mail_to' => $mail_to)
        );

        $opts = array('http' =>
            array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                "Content-Length: " . strlen($getdata) . "\r\n" .
                "User-Agent:MyAgent/1.0\r\n",
                'method' => 'GET',
                'content' => $getdata
            )
        );

        $context = stream_context_create($opts);

        file_get_contents('http://flexijobsite.com/flexi-web-services/sendemail.php?' . $getdata, false, $context);
    }

}
