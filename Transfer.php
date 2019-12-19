<?php

require ('vendor/autoload.php');

class Transfer
{
    public static $config  = array(
        'email' => 'lavrynovychartur@gmail.com',
    );

    public static function sendByEmail($config)
    {
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('lavrynovychartur@gmail.com')
            ->setPassword('KAlabunga12');
        $mailer = new Swift_Mailer($transport);
        $message = (new Swift_Message('HEEEEEEEEY!'))
            ->setFrom(['lavrynovychartur@gmail.com' => 'Artur'])
            ->setTo($config['email'])
            ->setBody('Hello, ' . $config['email'] . '.');
        $result = $mailer->send($message);
    }
    public static function sendByTelegram($text)
    {
        define('TELEGRAM_TOKEN', '1017947919:AAG72mrbpUY6EIbqJfIxsxWjZe-UkMRqSCE');
        define('TELEGRAM_CHATID', '333116814');
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_POSTFIELDS => array(
                    'chat_id' => TELEGRAM_CHATID,
                    'text' => $text,
                ),
            )
        );
        curl_exec($ch);
    }
}