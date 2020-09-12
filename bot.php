<?php




$bot = function ($update) use (&$MadelineProto, &$schedule, &$me, &$include, &$sm) {

    foreach ($update as $varname => $var) { if ($varname !== 'update') $$varname = $var; } //NON TOCCARE - dichiara variabili $chatID $userID ecc.




    //COMANDI BOT

   if ($msg === '.moon') {
  yield $MadelineProto => editMessage => “🌑” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🌒” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🌓” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🌔” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🌕” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🌘” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🌗” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🌖” => HTML;

   }
    
    if ($msg === '.clock') {
  yield $MadelineProto => editMessage => “🕕” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🕐” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🕑” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🕒” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🕔” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🕧” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🕖” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🕗” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🕘” => HTML;
sleep(0.3);
yield $MadelineProto => editMessage => “🕙” => HTML;

   }
    
    if ($msg === '.elicottero') {
  yield $MadelineProto => editMessage => “▬▬▬.◙.▬▬▬ 
═▂▄▄▓▄▄▂ 
◢◤ █▀▀████▄▄▄▄◢◤ 
█▄ █ █▄ ███▀▀▀▀▀▀▀╬ 
◥█████◤ 
══╩══╩══ 
╬═╬ 
╬═╬ 
╬═╬ 
╬═╬  puoi anche scoppiare 
╬═╬ 
╬═╬ 
╬═╬ 
╬═╬☻/ 
╬═╬/▌ 
╬═╬/ \” => HTML;

   }
    
    if (isset($update['update']['message']['out']) and $update['update']['message']['out'] == true) return; //ignora messaggi dall'userbot stesso

    if ($msg === '/info') {

        yield $sm($chatID, "<b>Info chat:</b>\nID: $chatID\nTitolo: $title\nUsername chat: @$chatusername\nTipo: $type\n\n<b>Informazioni utente:</b>\nID: $userID\nNome: $name\nUsername: @$username", $msgid);

    }

    if ($msg === '/async') {

        yield $sm($chatID, '<b>1OO%</b> Async');

        yield $MadelineProto->sleep(5);

        yield $sm($chatID, 'Second message');

    }

    if ($msg === '/schedule') {

        yield $sm($chatID, 'Message scheduled.');

        yield $schedule(time() + 10, function () use (&$MadelineProto, &$sm, $chatID) {

            yield $sm($chatID, 'Scheduled message 🤩🤩🤩'); //this message will be sent after 10 seconds

        });

    }

    if ($msg === '/schedule2') {

        yield $sm($chatID, 'Message scheduled at OO:OO.');

        yield $schedule('tomorrow 00:00', function () use (&$MadelineProto, &$sm, $chatID) {

            yield $sm($chatID, 'Buon '. date('l')); //this message will be sent after 10 seconds

        });

    }

    if ($type === 'user' and $msg === '/drole') {

        yield $MadelineProto->messages->sendScreenshotNotification(['peer' => $chatID, 'reply_to_msg_id' => $msgid]);

    }
if ($msg === '.help') {
  yield $MadelineProto => editMessage => “Lista Comandi” => Markdown;
 
    }


};







//FUNZIONI

$sm = function ($chatID, $text, $reply = NULL, $parsemode = 'HTML')  use (&$MadelineProto) {

    if (isset($reply)) return yield $MadelineProto->messages->sendMessage(['peer' => $chatID, 'message' => $text, 'reply_to_msg_id' => $reply, 'parse_mode' => $parsemode]);

    else return yield $MadelineProto->messages->sendMessage(['peer' => $chatID, 'message' => $text, 'parse_mode' => $parsemode]);

};
