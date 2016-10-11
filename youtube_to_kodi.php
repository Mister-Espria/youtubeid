<?php

$channel_id = $argv[1];
$host = $argv[2];
$port = $argv[3];
$latest = $argv[4];

$api_key = 'FillYoutubeDataApiKeyHERE';

$json_url="https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=".$channel_id."&key=".$api_key;
$json = file_get_contents($json_url);
$listFromYouTube=json_decode($json);
$id = $listFromYouTube->items[$latest]->id->videoId;

$basecom = "/home/pi/kodi-cli/kodi-cli2 -y https://www.youtube.com/watch?v="; 
$result = "{$basecom}{$id} {$host} {$port}";

shell_exec($result);
