<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    protected $signature = 'checke_pay';

    public function handle(){
            $hostname = '{imap.yandex.com:993/imap/ssl}INBOX';
            $username = 'blackmumba@yandex.ru';
            $password = 'htcvqechiytsvatn';

        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect: ' . imap_last_error());

        $emails = imap_search($inbox, 'ALL');

        if ($emails) {
            $output = '';
            $mails = array();

            rsort($emails);

            foreach ($emails as $email_number) {
                $header = imap_headerinfo($inbox, $email_number);
                $message = quoted_printable_decode (imap_fetchbody($inbox, $email_number, 1));

                $from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
                $toaddress = $header->toaddress;
//                foreach ($mail->getAttachments() as $attachment) {
//
//                    $attachment_path = $attachment->filePath;
//                    $attachment = file_get_contents($attachment_path);
//                }
                if($from == 'inform@yoomoney.ru'){
                    $document = phpQuery::newDocument($message);
                    print_r($document.'        ');
                }else{
                    continue;
                }

            }
        }
        imap_close($inbox);
    }

    public function showMail($id){

        // get the id
        $message = Email::findOrFail($id);
        $m = $message->body;

    }
}
