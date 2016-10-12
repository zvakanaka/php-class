if [ -z $1 ]; then
  echo "ERROR: Must supply dirname"
  exit 1;
fi
if [ ! -d ../photo/$1/.album ]; then
  echo "Creating album thumb dir for $1"
  mkdir ../photo/$1/.album
fi
echo $(date) Creating album thumb for $1: $2 from $3 >> log.txt
cp ../photo/$1/.thumb/$2 ../photo/$1/.album/thumb.jpg
