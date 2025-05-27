# GmailMailer for PHPMailer 

This project provides a `GmailMailer` class for sending emails via Gmail SMTP using PHPMailer and OAuth2 authentication.

## Features

- Send emails through Gmail SMTP securely
- Uses OAuth2 (no need for less secure app access)
- Simple integration with your PHP projects

## Installation

1. Clone or download this repository.
2. Install dependencies using Composer:

   ```bash
   composer install
   ```

## Usage

1. Obtain your Gmail address, Google OAuth2 client ID, client secret, and refresh token.
2. Use the `GmailMailer` class in your PHP script:

   ```php
   require 'vendor/autoload.php';
   use PHPMailer\GmailMailer;

   $gmail = 'your-email@gmail.com';
   $clientId = 'YOUR_GOOGLE_CLIENT_ID';
   $clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
   $refreshToken = 'YOUR_REFRESH_TOKEN';

   $mailer = new GmailMailer(true, $gmail, $clientId, $clientSecret, $refreshToken);
   $mailer->addAddress('recipient@example.com');
   $mailer->Subject = 'Test Email';
   $mailer->Body = 'This is a test email sent via Gmail SMTP with OAuth2.';

   if ($mailer->send()) {
       echo "Message sent!";
   } else {
       echo "Mailer Error: " . $mailer->ErrorInfo;
   }
   ```

## How to Get OAuth2 Credentials

For detailed instructions on obtaining OAuth2 credentials and generating a refresh token, please refer to the [thephpleague/oauth2-google GitHub repository](https://github.com/thephpleague/oauth2-google).

## License

MIT License.
