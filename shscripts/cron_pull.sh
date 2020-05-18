#!/bin/bash
cd /var/www/html
eval $(ssh-agent -s)
ssh-add ~/.ssh/pthoranam
git pull origin master
