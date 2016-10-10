# youtubeid
php script that retrieves VideoId from youtube for latest video from a specific channel

###Requirements
- You can run a .php file from command line

  To be able to do this install php5-cli by: `sudo apt-get install php5-cli`
- You know the **channelid** of the channel you want the latest video ID from.

  Finding the channel id is very easy. It is explained [here] (http://dev.zype.com/posts/2014/11/04/finding-youtube-channel-id/). 
- You have your own YouTube Data API key. [Create on here.] (https://console.developers.google.com)

##Installation
Download the .zip file and place the .php file in /home/pi/

Or use: `git clone https://github.com/Mister-Espria/youtubeid.git

When using git transfer `get_youtube_videoid.php` to `/home/pi/`

Edit `get_youtube_videoid.php` by adding the **channel id** to line 3 and add your **Youtube Data API key** to line 4

**Now you are all set to use it!**

##Usage
