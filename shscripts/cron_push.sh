#!/bin/bash
cd /home/pelliswq/public_html
eval $(ssh-agent -s)
ssh-add ~/.ssh/id_rsa_pelligithub
git add .
git commit -m "files modified"
git push --force origin master
