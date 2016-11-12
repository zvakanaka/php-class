if [ -z $1 ]; then
  echo "ERROR: Must supply album name"
  exit 1;
fi
if [ -z $2 ]; then
  echo "ERROR: Must supply server name"
  exit 1;
fi
if [ -z $3 ]; then
  echo "ERROR: Must supply user name"
  exit 1;
fi
photo_dir='../../photo'
if [ ! -d $photo_dir/$1 ]; then
  echo "ERROR: $1 album does not exist"
  exit 1;
fi
remote_path="/home/$3/public_html/photo"
if [ ! -z $4 ]; then
  $remote_path=$4
fi

echo $(date) Uploading $1 to $3@$2 >> log.txt

rsync -av --chown=www-data:www-data $photo_dir/$1 $3@$2:$remote_path/
