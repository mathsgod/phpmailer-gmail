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

1. Go to the [Google Cloud Console](https://console.cloud.google.com/apis/credentials).
2. Create a new OAuth2 client ID and client secret.
3. Generate a refresh token for your Gmail account.
4. Use these credentials in the `GmailMailer` constructor.

## Notes

- Do not commit your `vendor` directory or credentials to version control.
- The `GmailMailer` class sets up PHPMailer with all necessary OAuth2 configuration for Gmail.

## License

MIT License.
