echo $(date) Oh yeah >> log.txt
if [ -z $1 ]; then
  echo "ERROR: Must supply dirname"
  exit 1;
fi
if [ -d ../photo/$1/.thumb ]; then
  echo "ERROR: $1 thumbs already exist"
  exit 1;
fi

cd ../photo/$1 && mkdir .thumb;
for f in *.[jJ]*; do
  convert -resize x120 -strip -interlace Plane -quality 50% $f .thumb/$f;
done
