<?php
//获得聊天
$appkey = "958e8037556649a2b7b8619ef6734c67"; //你的appkey
$talkContent = ""; 
$info=addslashes($_POST['info']);
$userid=addslashes($_POST['userid']);
function send_post($url, $post_data) {  
  
  $postdata = http_build_query($post_data);  
  $options = array(  
    'http' => array(  
      'method' => 'POST',  
      'header' => 'Content-type:application/x-www-form-urlencoded',  
      'content' => $postdata,  
      'timeout' => 15 * 60 // 超时时间（单位:s）  
    )  
  );  
  $context = stream_context_create($options);  
  $result = file_get_contents($url, false, $context);  
  
  return $result;  
}  
  
//使用方法  
$post_data = array(  
  'key' => $appkey,  
  'info' => $info,
  'userid' => $userid,
);
if($appkey==""){
  $talkContent = '{"code":"500","text":"我还没学会聊天功能，快和站长联系吧！"}';
}
else{
  $talkContent = send_post('http://www.tuling123.com/openapi/api', $post_data);
}
header('Content-type:text/json');
echo $talkContent;
?>
