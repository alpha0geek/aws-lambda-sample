#!/bin/bash

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
file="./${main}.js ./index.php ./php ./vendor"
zip="./${main}.zip"
functioname="lambda-php-sns-rds-demo"

role="arn:aws:iam::671100899131:role/service-role/newrole"
region="ap-southeast-2"

zip_package() {
	rm -f ./$zip
	zip -r $zip $file 
}

upload_package() {
	
#aws lambda delete-function --function-name $functioname
	
  aws lambda create-function \
     --region $region \
     --role $role\
     --function-name $functioname  \
     --zip-file fileb://$zip \
     --handler $main.handler \
     --runtime nodejs4.3 \
     --timeout 60 \
     --memory-size 128
}

zip_package
upload_package
