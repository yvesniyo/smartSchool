<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Config;

class SmsApi
{

    private $sender, $username, $message, $password, $recipients, $callBackUrl;

    public function __construct()
    {
        $this->sender = Config::get("app.SMS_INTOUCH_SENDER");
        $this->username = Config::get("app.SMS_INTOUCH_USERNAME");
        $this->password = Config::get("app.SMS_INTOUCH_PASSWORD");
        $this->callBackUrl = Config::get("app.url") . Config::get("app.SMS_INTOUCH_CALL_BACK_URL");
    }

    public function setSender($sender): SmsApi
    {
        $this->sender = $sender;
        return $this;
    }


    public function sender($sender): SmsApi
    {
        $this->sender = $sender;
        return $this;
    }

    public function setUsername($username): SmsApi
    {
        $this->username = $username;
        return $this;
    }

    public function username($username): SmsApi
    {
        $this->username = $username;
        return $this;
    }

    public function setMessage($message): SmsApi
    {
        $this->message = $message;
        return $this;
    }

    public function message($message): SmsApi
    {
        $this->message = $message;
        return $this;
    }

    public function setPassword($password): SmsApi
    {
        $this->password = $password;
        return $this;
    }


    public function password($password): SmsApi
    {
        $this->password = $password;
        return $this;
    }

    public function setRecipients($recipients): SmsApi
    {
        $this->recipients = $recipients;
        return $this;
    }

    public function recipients($recipients): SmsApi
    {
        $this->recipients = $recipients;
        return $this;
    }

    public function addRecipient($recipient): SmsApi
    {
        $recipients = $this->recipients;
        if ($recipients == null || $recipients == "") {
            $recipients = "";
            $recipients .= $recipient;
        } else {
            $recipients .= "," . $recipient;
        }
        $this->recipients = $recipients;
        return $this;
    }



    public function getSender()
    {
        return $this->sender;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRecipients()
    {
        return $this->recipients;
    }

    public function getCallBackUrl()
    {
        return $this->callBackUrl;
    }


    public static function parse(): SmsApi
    {
        return app("SmsApi");
    }
}
