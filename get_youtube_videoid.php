<?php

$channel_id = 'ENTER CHANNEL ID HERE'; /* Enter Id of the channel you want the latest video ID from */
$api_key = 'ENTER YOUR YOUTUBE API KEY HERE'; /* get you youtube api key here: https://console.developers.google.com */

$json_url="https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=".$channel_id."&key=".$api_key;
$json = file_get_contents($json_url);
$listFromYouTube=json_decode($json);
$id = $listFromYouTube->items[0]->id->videoId; #if you change the zero to a 1 you get the second last video ID

#remove hashtag in line below and add hashtags to line 14,15 and 16 to get only video ID in output 
#echo $id; // Outputs the video ID. */  

$basecom = "/home/pi/kodi-cli/kodi-cli  -y"; /* change /home/pi/kodi-cli/kodi-cli  -y to https://www.youtube.com/watch?v= if you only want the link to the video */
$result = "{$basecom} {$id}";
echo $result; 