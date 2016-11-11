if [ -z $1 ]; then
  echo "ERROR: Must supply dirname"
  exit 1;
fi
photo_dir='../../photo'
if [ -d $photo_dir/$1/.web ]; then
  echo "ERROR: $1 webs already exist"
  exit 1;
fi
echo $(date) Creating webs for $1 from $2 >> log.txt

cd $photo_dir/$1 && mkdir .web;
for f in *.[jJ]*; do
  convert -resize x1000 -strip -interlace Plane -quality 70% $f .web/$f;
done
