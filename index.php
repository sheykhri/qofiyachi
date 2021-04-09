<?php

$step = get_info("step");

if ($text == "/start" OR $etext[0] == "/start") {

    $db = new SQLite3("baza.sqlite");
    $all = $db->querySingle('SELECT COUNT(`user_id`) FROM `users`');
    $qofiya = $db->querySingle('SELECT `qofiya` FROM `stat`');
    $taklif = $db->querySingle('SELECT `taklif` FROM `stat`');
    $db->close();
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"Bot yuborilgan so'zning oxiriga mos qofiya yuboradi.\nDasturchi @sheykhri\n\nStatistika:\nFoydalanuvchilar soni $all\nQofiyalar soni $qofiya\nTaklif qofiyalar soni $taklif",
        'parse_mode'=>"markdown",
    ]);
    
    yangi_user();
    
}else {

include "words.php";

$input = strtolower(trim($etext[0]));
$last = mb_substr($input,strlen($input)-2);
if(strlen($input)<3) $last = $input;
$results = array_unique(preg_filter('~'.preg_quote($last, '~').'~',$last,$words));

$i=1;
$q = "";
$w = "";
$e = "";
$r = "";

foreach($results as $key=>$result){
if(mb_substr($result,strlen($result)-2) == $last){

if($i<=150){
$q .= $i." ".$result."\n";
}
else if($i<=300){
$w .= $i." ".$result."\n";
}
else if($i<=450){
$e .= $i." ".$result."\n";
}
else if($i<=500){
$r .= $i." ".$result."\n";
}

$i++;
}
}

sm($q);
sm($w);
sm($e);
sm($r);
$db = new SQLite3("baza.sqlite");
$qofiya = $db->querySingle('SELECT `qofiya` FROM `stat`') + 1;
$taklif = $db->querySingle('SELECT `taklif` FROM `stat`') + $i;
$db->query('UPDATE `stat` SET `qofiya` = "'.$qofiya.'", `taklif` = "'.$taklif.'"');
$db->close();
}

?>