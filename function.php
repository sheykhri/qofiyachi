<?php
define('API_KEY' , 'TOKEN_JOYI');

function bot($method, $datas = []) {

    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
    
}


function sendMessage($text, $keyboard = null, $pm = 'html') {
   
    global $chat_id;
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$text,
        'parse_mode'=>$pm,
        'reply_markup'=>$keyboard,
    ]);
    
}

function yangi_user(){
global $chat_id;
$start = date("H:i:s d.m.Y");
$db = new SQLite3("baza.sqlite");
$check = $db->querySingle('SELECT `step` FROM `users` WHERE `user_id` = "'.$chat_id.'"');
if(!$check) $db->exec("INSERT INTO `users` (user_id,step,til,start) VALUES ('$chat_id','none','none','$start')");
// id , step , til , start vaqti
$db->close();
}

function get_info($type){
global $chat_id;
$db = new SQLite3("baza.sqlite");
$info = $db->querySingle('SELECT `'.$type.'` FROM `users` WHERE `user_id` = "'.$chat_id.'"');
if(!$info) $info = false;
$db->close();
return $info;
}

function set_info($type,$atr){
global $chat_id;
$db = new SQLite3("baza.sqlite");
$info = $db->exec('UPDATE `users` SET `'.$type.'` == "'.$atr.'" WHERE `user_id` = "'.$chat_id.'"');
$db->close();
}

function bot_info($type){
$db = new SQLite3("baza.sqlite");
$info = $db->querySingle('SELECT `'.$type.'` FROM `bot_info`');
$db->close();
return $info;
}

function set_bot_info($type,$value){
$db = new SQLite3("baza.sqlite");
$db->exec('UPDATE `bot_info` SET `'.$type.'` == "'.$value.'"');
$db->close();
}
?>