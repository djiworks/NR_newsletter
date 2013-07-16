#!/bin/sh
echo "Debut de la copie"
sudo cp -Rf ci_application /var/
sudo cp -Rf ci_system /var/
sudo cp -Rf www /var/

echo "Copie terminee"
