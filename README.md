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

If you want to store it change to command like this:
**`php -f get_youtube_videoid.php >./youtubeid/anynameyouchoose.txt`**
This will save the result in **anynameyouchoose.txt** in `/home/pi/youtubeid/`
But you need to make sure there is a folder in` /home/pi `which is called **youtubeid** in this case.

