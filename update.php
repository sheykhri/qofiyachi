<?php
date_default_timezone_set('Asia/Tashkent');
include "function.php";

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$callback = $update->callback_query;
$inline = $update->inline_query;
$chpost = $update->channel_post;

if(isset($message)){
$mid = $message->message_id;
$m_date = $message->date;
$caption = $message->caption;
$f_date = $message->forward_date;
$text = $message->text;
$etext = explode(" ",$text);
}

if(isset($message->from)){
$u_id = $message->from->id;
$u_isbot = $message->from->is_bot;
$u_name = $message->from->first_name;
$u_lname = $message->from->last_name;
$u_user = $message->from->username;
$u_lang = $message->from->language_code;
}

if(isset($message->chat)){
$chat_id = $message->chat->id;
$c_name = $message->chat->first_name;
$c_lname = $message->chat->last_name;
$c_user = $message->chat->username;
$c_type = $message->chat->type;
}

if(isset($message->contact)){
$c_number = $message->contact->phone_number;
$c_name = $message->contact->first_name;
$c_lname = $message->contact->last_name;
$c_id = $message->contact->user_id;
$c_vcard = $message->contact->vcard;
}

if(isset($message->forward_from)){
$f_id = $message->forward_from->id;
$f_isbot = $message->forward_from->is_bot;
$f_name = $message->forward_from->first_name;
$f_lname = $message->forward_from->last_name;
$f_user = $message->forward_from->username;
}

if(isset($message->reply_to_message)){
$reply = $message->reply_to_message;
$r_mid = $reply->message_id;
$rf_id = $reply->from->id;
$rf_isbot = $reply->from->is_bot;
$rf_name = $reply->from->first_name;
$rf_lname = $reply->from->last_name;
$rf_user = $reply->from->username;
$rf_lang = $reply->from->language_code;
$rc_id = $reply->chat->id;
$rc_name = $reply->chat->first_name;
$rc_lname = $reply->chat->last_name;
$rc_user = $reply->chat->username;
$rc_type = $reply->chat->type;
$r_fid = $reply->forward_from->id;
$r_fisbot = $reply->forward_from->is_bot;
$r_fname = $reply->forward_from->first_name;
$r_flname = $reply->forward_from->last_name;
$r_fuser = $reply->forward_from->username;
}

if(isset($message->new_chat_participant)){
$n_id = $message->new_chat_participant->id;
$n_isbot = $message->new_chat_participant->is_bot;
$n_name = $message->new_chat_participant->first_name;
$n_lname = $message->new_chat_participant->last_name;
$n_user = $message->new_chat_participant->user_name;
}

if(isset($message->new_chat_member)){
$nm_id = $message->new_chat_member->id;
$nm_isbot = $message->new_chat_member->is_bot;
$nm_name = $message->new_chat_member->first_name;
$nm_lname = $message->new_chat_member->last_name;
$nm_user = $message->new_chat_member->user_name;
}

if(isset($message->left_chat_participant)){
$l_id = $message->left_chat_participant->id;
$l_isbot = $message->left_chat_participant->is_bot;
$l_name = $message->left_chat_participant->first_name;
$l_lname = $message->left_chat_participant->last_name;
$l_user = $message->left_chat_participant->user_name;
}

if(isset($message->left_chat_member)){
$lm_id = $message->left_chat_member->id;
$lm_isbot = $message->left_chat_member->is_bot;
$lm_name = $message->left_chat_member->first_name;
$lm_lname = $message->left_chat_member->last_name;
$lm_user = $message->left_chat_member->user_name;
}

if(isset($message->video_note)){
$vn_duration = $message->video_note->duration;
$vn_length = $message->video_note->lenth;
$vn_fid = $message->video_note->file_id;
$vn_size = $message->video_note->file_size;
$vn_tid = $message->video_note->thumb->file_id;
$vn_tsize = $message->video_note->thumb->file_size;
$vn_twidth = $message->video_note->thumb->width;
$vn_theight = $message->video_note->thumb->height;
}

if(isset($message->audio)){
$a_duration = $message->audio->duration;
$a_type = $message->audio->mime_type;
$a_title = $message->audio->title;
$a_performer = $message->audio->performer;
$a_fid = $message->audio->file_id;
$a_size = $message->audio->file_size;
$a_tid = $message->audio->thumb->file_id;
$a_tsize = $message->audio->thumb->file_size;
$a_twidth = $message->audio->thumb->width;
$a_theight = $message->audio->thumb->height;
}

if(isset($message->voice)){
$v_duration = $message->voice->duration;
$v_type = $message->voice->mime_type;
$v_fid = $message->voice->file_id;
$v_size = $message->voice->file_size;
}

if(isset($message->photo)){
$p_fid = $message->photo[3]->file_id;
$p_size = $message->photo[3]->file_size;
$p_width = $message->photo[3]->width;
$p_height = $message->photo[3]->height;
}

if(isset($message->video)){
$vi_duration = $message->video->duration;
$vi_width = $message->video->width;
$vi_height = $message->video->height;
$vi_type = $message->video->mime_type;
$vi_fid = $message->video->file_id;
$vi_size = $message->video->file_size;
$vi_tfid = $message->video->thumb->file_id;
$vi_tsize = $message->video->thumb->file_size;
$vi_twidth = $message->video->thumb->width;
$vi_theight = $message->video->thumb->height;
}

if(isset($message->document)){
$d_name = $message->document->file_name;
$d_fid = $message->document->file_id;
$d_size = $message->document->file_size;
}

if(isset($update->inline_query)){
$id = $inline->id;
$query = $inline->query;
$offset = $inline->offset;
$u_id = $inline->from->id;
$u_isbot = $inline->from->is_bot;
$u_name = $inline->from->first_name;
$u_user = $inline->from->username;
$u_lang = $inline->from->language_code;
}

if(isset($update->callback_query)){
$chat_id = $callback->from->id;
$name = $callback->from->first_name;
$ida = $callback->id;
$mid = $callback->message->message_id;
$ctx = $callback->message->text;
$idd = $callback->message->chat->id;
$imid = $callback->inline_message_id;
$data = $callback->data;
$data = explode("()",$data);
}

if(isset($update->channel_post)){
$ch_id = $chpost->chat->id;
$ch_title = $chpost->chat->title;
$ch_turi = $chpost->chat->type;
$ch_user = $chpost->chat->username;
$ch_author = $chpost->author_signature;
$ch_mid = $chpost->message_id;
$ch_text = $chpost->text;
}

if(!is_numeric(bot_info("admin_id"))) include "temp.admin.php";
if(bot_info("admin_id")==$u_id){
switch($etext[0]){
case "/my_status":
sm("admin!");
break;
case "/set_bot_info":
set_bot_info($etext[1],$etext[2]);
sm("bot info $etext[1] value $etext[2]");
break;
case "/get_bot_info":
$status = bot_info($etext[1]);
sm("bot info => <code>$status</code>");
break;
}}
if(bot_info("on_off") == "off") exit;
if(get_info("ban") == "1") exit;
if(get_info("cron") == "on"){$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";file_get_contents($url);}
if($text == "/my_status" AND bot_info("admin_id")!==$u_id) sm("user");

include "index.php";
?>