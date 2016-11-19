# [php-class](http://howtoterminal.com/php-class)

# Setup
---
## Local
[Sng](https://www.npmjs.com/package/sng) can be used to serve PHP from somewhere in your home folder. Nginx, PHP,  and MySQL are required. Sng requires npm, the neatest way to install that is with [nvm](nvm.sh) (Node Version Manager).
# OR
## Server
```sh
sudo apt-get install php5 apache2 mysql-client mysql-server php5-mysql php5-mysqlnd

```
### Keep up to date with GitHub
1. Clone the repo somewhere in your home directory (e.g. `/home/pi/git/php-class`)
2. Create a directory your user has access to in your web directory (e.g. `/var/www/html/php-class`)
3. Edit your crontab to keep up copy changes from your git directory to your web directory:
```sh
crontab -e
```
Add the following lines (change variables to match your setup):
```sh
REPO=/home/pi/git/php-class
WEB_DIR=/var/www/html/
LOG=/home/pi/git/cronlog.txt
*/2 * * * * cd $REPO && echo "****** $(date) updating $REPO" >> $LOG && git pull >> $LOG && rsync -ruv --cvs-exclude $REPO $WEB_DIR && echo "update successful">> $LOG > /dev/null
```
---
## Dependencies
Photo-Gal requires `webp`, `rsync`, and `gphoto2` be installed on the server.
*Some versions of Linux may requre executing* `chmod +s $(which gphoto2)` *in order to allow use by the www-data user*

## Database
Run the setup and create scripts from MySQL:
`source dynamic/model/setup.sql` and `source dynamic/model/photo-gal.sql`

## Photos
Place photos in a sibling directory (can be symbolic link) of the project. Ensure `www-data` has rights to read and write contents.
