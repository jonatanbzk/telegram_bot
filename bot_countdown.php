<?php
   $dateNow = time();
   $endDate = mktime(0, 0, 0, 0, 0, 2020);
   $interval = $endDate - $dateNow;
   if ($interval < 0) {
      $interval = 0;
     }
   $intervalDays = floor($interval/60/60/24);
   $text = "There are ". $intervalDays." days remaining ! ";
   $botToken="xxxxxxxxxxxxxxx";

   $website="https://api.telegram.org/bot".$botToken;
   $chatId=0123456789;  //this chatId MUST be the chat_id of a person
   $params=[
       'chat_id'=>$chatId,
       'text'=>$text,
   ];
   $ch = curl_init($website . '/sendMessage');
   curl_setopt($ch, CURLOPT_HEADER, false);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   $result = curl_exec($ch);

   if ($result === FALSE) {
     echo 'An error has occured: ' . curl_error($ch) . PHP_EOL;
   }
   else {
     echo $result;
   }

   curl_close($ch);
?>
