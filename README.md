Readme below not update yet.
To run this script you need the forked kodi-cli2 script in the same place as your kodi-cli script.
And Add your Youtube Data Api Key again to youtube_to_kodi.php

Then you can use this command to send the video to Kodi:

`php -f /path/to/youtube_to_kodi.php CHANNELID KODIHOSTIP KODIHOSTPORT NUMBEROFVIDEO (0 for latest video, 1 for second latest and so on till 4) y (for direct play) or q (for adding to queue)`

For example:
**`php -f /home/pi/youtube_to_kodi.php UCOmcA3f_RrH6b9NmcNa4tdg 192.168.1.8 8080 0 y`**

# youtubeid
php script that retrieves VideoId from youtube for latest video from a specific channel

###Requirements
- You can run a .php file from command line

  To be able to do this install php5-cli by: `sudo apt-get install php5-cli`
- You know the **channelid** of the channel you want the latest video ID from.

  Finding the channel id is very easy. It is explained [here] (http://dev.zype.com/posts/2014/11/04/finding-youtube-channel-id/). 
- You have your own YouTube Data API key. [Create on here.] (https://console.developers.google.com)

##Installation
1. Download the .zip file and place the .php file in /home/pi/

  Or use: `git clone https://github.com/Mister-Espria/youtubeid.git`

  When using git transfer `get_youtube_videoid.php` to `/home/pi/`

2. Edit `get_youtube_videoid.php` by adding the **channel id** to line 3 and add your **Youtube Data API key** to line 4

**Optional step:**  You can edit the code to give as output only the video id or the whole Youtube link. Standard it will add a harcoded path which i use to send Youtube videos directly to Kodi mediaplayer.

**Now you are all set to use it!**

##Usage

Simply run the code by:  `php -f get_youtube_videoid.php`

This will return my hardcoded path + the latest video ID from the given channel in the terminal.

If you want to store it change the command like this:
**`php -f get_youtube_videoid.php >./youtubeid/youtuber1.txt`**
This will save the result in **youtuber1.txt** in `/home/pi/youtubeid/`
But you need to make sure there is a folder in` /home/pi `which is called **youtubeid** in this case.

**Multiple Youtube channels**

I think it should be easy to add multiple channels to the .php file but i don't know how to implement it.
But you can just copy it and change the name of the file and the channel id. and use another file as output.

**Add crontab**

I did setup crontab to execute the command. If a youtuber has a fixed upload time you can let the command execute arround that time. You can also just let it run every hour or anything you want. It wil just overwrite the existing file. [more info on crontab] (https://www.raspberrypi.org/documentation/linux/usage/cron.md)

crontab example:
```
3,10,31 16-17 * * * php -f get_youtube_videoid.php >./youtubeid/youtuber1.txt
3,10,31,50 21-22 * * * php -f get_youtube_youtuber2.php >./youtubeid/youtuber2.txt
10,50 16-23 * * * php -f get_youtube_youtuber3.php >./youtubeid/youtuber3.txt
```


## Additional info: Send latest video from channel to Kodi using Home-Assitant
First you need to make sure you have the youtube addon installed in Kodi.

Also make sure that you have the webserver in Kodi enabled. Go to -->Settings → Services → Webserver → Allow control of Kodi via HTTP

I have also set an username and password.

For this we need to install kodi-cli by `git clone https://github.com/nawar/kodi-cli`
Thanks to nawar for this awesome code!

Navigate to `/home/pi/kodi-cli/kodi-cli` and edit lines 18 to 21 to match your setup (KODI_HOST etc.).

Now you can send a youtube video with this command: **`/home/pi/kodi-cli/kodi-cli  -y FILLHEREVIDEOID`**

**Home Assitant**

I added to my configuration.yaml the next shell command:
```
shell_command:
  play_youtuber1: 'sh /home/pi/youtubeid/youtuber1.txt'
  play_youtuber2: 'sh /home/pi/youtubeid/youtuber2.txt'
  play_youtuber3: 'sh /home/pi/youtubeid/youtuber3.txt

```
Then i created for every channel a script:
```
watch_youtuber1:
  sequence:
   - service: shell_command.play_youtuber1
```
Now you can activate the script and the Youtube video will play on your Kodi media player.
Enjoy!!!


I did found the base of the .php file [here] (http://stackoverflow.com/questions/6617567/how-to-get-the-id-of-the-latest-uploaded-video-in-a-youtube-channel)

###Problems
In case some command does not fire. Check Permissions on the folders and files. All the folders i used i gave all permissions but i don't know if it is mandatory.
