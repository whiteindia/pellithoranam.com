#!/bin/bash
cd /home/pelliswq/public_html
eval $(ssh-agent -s)
ssh-add ~/public_html/id_rsa_pelligithub
git pull origin master
