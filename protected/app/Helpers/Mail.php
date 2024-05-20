<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Postmark\PostmarkClient;

class Mail
{
    public static function sendEmail($ServerAPItokens, $toEmail, $subject)
    {
        $client = new PostmarkClient($ServerAPItokens);
        $fromEmail = 'support@cashlez.com';

        $textBody = NULL;
        $tag = NULL;
        $trackOpens = true;
        $trackLinks = "None";
        $messageStream = "broadcast"; 
        $htmlBody = '<h1>halo dari cashlez</h1>';


        // Send an email:
        try {
        $sendResult = $client->sendEmail(
            $fromEmail,
            $toEmail,
            $subject,
            $htmlBody,
            '',
            '',
            $trackOpens,
            NULL, // Reply To
            NULL, // CC
            NULL, // BCC
            NULL, // Header array
            NULL, // Attachment array
            $trackLinks,
            NULL, // Metadata array
            $messageStream
        );
        return true;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
