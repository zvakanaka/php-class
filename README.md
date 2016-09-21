# php-class
Sync to a web server via its crontab:
```sh
crontab -e
```
Add the following cron job:
```sh
REPO=php-class
*/2 * * * * cd ~/git/$REPO && echo "****** $(date) updating $REPO" >> ~/cronlog.txt && git pull >> ~/cronlog.txt && rsync -ruv --cvs-exclude ~/git/$REPO ~/public_html/ && echo "update successful">> ~/cronlog.txt > /dev/null
```