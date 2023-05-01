<?php
/* 
 * Telegram Channel @TeamSyria 🍃
 * Telegram Channel @HLOOFiles 💯
 * Telegram MyUser @KKYKKN 💕
 * Github https://github.com/yhyasyrian/Telegram-Bot-PHP 🌐
*/
error_reporting(1);
$Token = '';// Your Token
$Admin = '';// Your Id
define('API_KEY',$Token);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function getupdate($offset){
	$getupdates = bot('getupdates',[
	'offset'=>$offset,
	]);
	if(!empty($getupdates->error_code) && $getupdates->error_code == 409){
		bot('deletewebhook');
		return getupdate($offset);
	}
	return $getupdates->result[0];
}
function run($update){
print_r($update);
$admin = $GLOBALS['Admin'];
$message = $update->message;
$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$type = $message->chat->type;
if($text == "/start" and $type == "private"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"I Am Work 😏💯"
]);
}
if($text == "/stop" and $type == "private"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"Ok 💔"
]);
return 'stop';
}
}
while(true){
try{
	$update_id = $update_id ?? 0;
	$update = getupdate($update_id+1);
	$ok = run($update);
	$update_id = $update->update_id;
	if($ok == 'stop'){
		$update = getupdate($update_id+2);
	  	break;
	  }
} catch (Exception $e) {
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>$e->getMessage(),
]);
break;
}
}
/* 
 * Telegram Channel @TeamSyria 🍃
 * Telegram Channel @HLOOFiles 💯
 * Telegram MyUser @KKYKKN 💕
 * Github https://github.com/yhyasyrian/Telegram-Bot-PHP 🌐
*/
