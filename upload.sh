#!/bin/bash
#
# upload.sh
# Zip and upload lambda function
#

program=`basename $0`

set -o errexit

function usage() {
  echo "Usage: $program <function.js>"
}

if [ $# -lt 1 ]
then
  echo 'Missing required parameters'
  usage
  exit 1
fi

main=${1%.js}
file="./${main}.js ./index.php ./php"
zip="./${main}.zip"

role="arn:aws:iam::671100899131:role/service-role/newrole"
region="ap-southeast-2"

zip_package() {
  zip -r $zip $file 
}

upload_package() {
  aws lambda create-function \
     --region $region \
     --role $role\
     --function-name $main  \
     --zip-file fileb://$zip \
     --handler $main.handler \
     --runtime nodejs4.3 \
     --timeout 120 \
     --memory-size 128
}

zip_package
upload_package
