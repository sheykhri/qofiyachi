<?php
include "function.php";
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = str_replace("webhook.php", "update.php", $url);
$ret = bot('setwebhook',['url'=>$url]);

if($ret->ok){
echo "OK!!!!";

$out = bot('getme');
$id = $out->result->id;
$user = $out->result->username;

if(file_exists("baza.sqlite")){
$db = new SQLite3("baza.sqlite");
$db->query('CREATE TABLE stat (qofiya TEXT, taklif TEXT)');
$db->exec("INSERT INTO `stat` (qofiya,taklif) VALUES ('0','0')");
$db->query('CREATE TABLE bot_info (on_off TEXT, username TEXT, bot_id INTEGER, admin_id TEXT,cron TEXT)');
$db->exec("INSERT INTO `bot_info` (on_off,username,bot_id,admin_id,cron) VALUES ('on','$user','$id','none','off')");
$db->exec("CREATE TABLE `users` (user_id TEXT,step TEXT,til TEXT,start TEXT)");
$db->close();
}

}
?>