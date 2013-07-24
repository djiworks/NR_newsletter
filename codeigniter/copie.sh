#!/bin/sh
echo "Debut de la copie"
sudo rm -rf /var/ci_application
sudo rm -rf /var/ci_system
sudo rm -rf /var/www
sudo cp -Rf ci_application /var/
sudo cp -Rf ci_system /var/
sudo cp -Rf www /var/

echo "Copie terminee"
