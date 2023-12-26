<?php


$users = file_get_contents('Database/free.txt');
$freeusers = explode("\n", $users);

$videoURLStart = "https://t.me/igppd/3782";


if (preg_match('/^(\/start|\.start|!start)/', $text)) {
    if (in_array($userId, $freeusers)) {
        $caption = "<b>🤗 Hey @$username
        
🆔 User ID <code>$userId</code>

Click</b> /cmds <b>To Check My Power 🔥</b>";
        sendVideox($chatId, $videoURLStart, $caption, $keyboard);
    } else {
        reply_tox($chatId,$message_id,$keyboard,"<b>You Are Not Registered, Register First With</b> /register <b>To Use Me</b>");
    }
}
//=========START END========//
if (preg_match('/^(\/cmds|\.cmds|!cmds)/', $text)) {
  
    $videoUrl = "https://t.me/igppd/3782"; 

    $keyboard2 = json_encode([
        'inline_keyboard' => [
            [
                ['text' => 'Gates', 'callback_data' => 'gates'],
                ['text' => 'Tools', 'callback_data' => 'herr'],
                ['text' => 'Price', 'callback_data' => 'price'],
            ],
            [
                ['text' => 'Finalize', 'callback_data' => 'finalize'],
            ],
            [
                ['text' => 'Official Group', 'callback_data' => 'channel'],
            ],
        ]
    ]);

    $caption = "<b>Welcome To My Commands Section $firstname
    
Explore Me More By Clicking The Buttons Below</b>";
    file_get_contents("https://api.telegram.org/bot$botToken/deleteMessage?chat_id=$chatId&message_id=$messageId");

    // Using sendVideo endpoint instead of sendPhoto
    file_get_contents("https://api.telegram.org/bot$botToken/sendVideo?chat_id=$chatId&video=$videoUrl&caption=" . urlencode($caption) . "&parse_mode=HTML&reply_markup=$keyboard2");
}