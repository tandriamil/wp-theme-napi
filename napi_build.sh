#!/bin/sh

# Check if everything is correctly installed
# sudo apt-get install npm
# sudo npm -g install bower clean-css

# Go to the src directory
cd src

# Update bower dependencies
bower update

# Concatenate and clean css files
cat bower_components/bootstrap/dist/css/bootstrap.min.css bower_components/bootstrap/dist/css/bootstrap-theme.min.css css/style.css | cleancss -o ../css/napi.css

# For the js files, just concatenate them (add a space to avoid an error)
cat bower_components/jquery/dist/jquery.min.js > ../js/napi.js
echo " " >> ../js/napi.js
cat bower_components/bootstrap/dist/js/bootstrap.min.js >> ../js/napi.js

# Replace the bootstrap fonts files
cp bower_components/bootstrap/dist/fonts/* ../fonts
