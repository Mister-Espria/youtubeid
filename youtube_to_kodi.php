<?php
/* Example_Command: php -f youtube_to_kodi.php UCLecVrux63S6aYiErxdiy4w 192.168.1.10 8080 0 y               */

$channel_id = $argv[1];     /* Example: UCLecVrux63S6aYiErxdiy4w */
$host = $argv[2];              /* Example: 192.168.1.10 */
$port = $argv[3];               /* Example: 8080 */
$latest = $argv[4];            /* Example_latest_video: 0           Example_second_latest_video: 1      (max = 4)    */                        
$playorqueue = $argv[5];   /* Example_playdirectly: y           Example_playaftervideoends: q  */

$api_key = 'FillYoutubeDataApiKeyHERE';

$json_url="https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=".$channel_id."&key=".$api_key;
$json = file_get_contents($json_url);
$listFromYouTube=json_decode($json);
$id = $listFromYouTube->items[$latest]->id->videoId;

$basecom = "/home/pi/kodi-cli/kodi-cli2";
$yturl = "https://www.youtube.com/watch?v="; 
$result = "{$basecom} -{$playorqueue} {$yturl}{$id} {$host} {$port}";

shell_exec($result);
