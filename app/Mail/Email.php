<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Log;
use View;
use Mail;

class Email extends Mailable
{
    public  function send($msg, $email)
    {

        try {
            $subject = "Обратная связь";

            Mail::send('emails.feadback', ['msg' => $msg], function($message) use ($msg, $subject, $email) {
                $message
                    ->from(env('MAIL_USERNAME'), 'Обратная связь')
                    ->to($email)
                    ->subject($subject);
            });
           // Log::info("Email sent (lead_id: {$lead->id}).");
        } catch (\Exception $e) {
            Log::error("Email sending failed: ".$e->getMessage());
        }
    }
}
