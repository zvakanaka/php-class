# php-class
Sync to a web server via its crontab:
```sh
crontab -e
```
Add the following cron job:
```sh
REPO=$HOME/Downloads/git/php-class
WEB_DIR=/var/www/
LOG=$HOME/cronlog.txt
*/2 * * * * cd $REPO && echo "****** $(date) updating $REPO" >> $LOG && git pull >> $LOG && rsync -ruv --cvs-exclude $REPO $WEB_DIR && echo "update successful">> $LOG > /dev/null
```
