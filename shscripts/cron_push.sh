#!/bin/bash
cd /var/www/html
eval $(ssh-agent -s)
ssh-add /root/.ssh/pthoranam
git add .
git commit -m "files modified"
git push --force origin master
