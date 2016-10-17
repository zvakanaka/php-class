if [ -z $1 ]; then
  echo "ERROR: Must supply dirname"
  exit 1;
fi
if [ -d ../photo/$1/.thumb ]; then
  echo "ERROR: $1 thumbs already exist"
  exit 1;
fi
echo $(date) Creating thumbs for $1 from $2 >> log.txt

cd ../photo/$1
if [ $? -eq 0 ]; then
  mkdir .thumb
  if [ $? -eq 0 ]; then
    for f in *.[jJ]*; do
      convert -resize x120 -strip -interlace Plane -quality 50% $f .thumb/$f;
    done
  else
    echo $(date) Failure creating thumbs: user: $(echo $USER) >> log.txt
  fi
fi
