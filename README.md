# [php-class](http://howtoterminal.com/php-class)
Sync to a web server via its crontab:
```sh
crontab -e
```
Add the following cron job:
```sh
HOME=/home/adam
REPO=$HOME/Downloads/git/php-class
WEB_DIR=/var/www/
LOG=$HOME/cronlog.txt
*/2 * * * * cd $REPO && echo "****** $(date) updating $REPO" >> $LOG && git pull >> $LOG && rsync -ruv --cvs-exclude $REPO $WEB_DIR && echo "update successful">> $LOG > /dev/null
```

Photo-Gal requires `webp`, `rsync`, and `gphoto2` be installed on the server.
*Some versions of Linux may requre executing* `chmod +s $(which gphoto2)` *in order to allow use by the www-data user*
