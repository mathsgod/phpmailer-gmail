<?php

namespace PHPMailer;

use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;

class GmailMailer extends PHPMailer
{
    public function __construct($exceptions = null, string $gmail, string $clientId, string $clientSecret, string $refreshToken)
    {
        parent::__construct($exceptions);

        $this->isSMTP();
        $this->Host = 'smtp.gmail.com';
        $this->Port = 465;
        $this->SMTPSecure = 'ssl';
        $this->SMTPAuth = true;
        $this->AuthType = 'XOAUTH2';

        $provider = new Google(
            [
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
            ]
        );

        $this->setOAuth(
            new OAuth(
                [
                    "provider" => $provider,
                    'clientId' => $clientId,
                    'clientSecret' => $clientSecret,
                    'refreshToken' => $refreshToken,
                    'userName' => $gmail,
                ]
            )
        );

        $this->setFrom($gmail);

        $this->CharSet = 'UTF-8';
    }
}
