#!/bin/sh
echo "Debut de la copie"
sudo rm -rf /var/ci_application
sudo rm -rf /var/ci_system
sudo rm -rf /var/www
sudo rm -rf /var/univ_news_data
sudo cp -Rf ci_application /var/
sudo cp -Rf ci_system /var/
sudo cp -Rf www /var/
sudo cp -Rf univ_news_data /var/
sudo chmod -R 777 /var/univ_news_data
sudo chmod -R 777 /var/www/assets
echo "Copie terminee"
