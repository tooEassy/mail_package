<?php

require ('vendor/autoload.php');
require ('Transfer.php');

$Transfer = new Transfer();

echo '<form method="post">
        <input placeholder="Where send?" name="mail">
        <input type="submit"> 
      </form>';

if (isset($_POST['mail'])) {
    switch($_POST['mail']){
        case 'Email':
        $Transfer::sendByEmail($Transfer::$config);
        break;
        case 'Telegram':
        $Transfer::sendByTelegram('HEY!');
        break;
        default:
        echo $_POST['mail'] . ' does not exist.';
    }
}