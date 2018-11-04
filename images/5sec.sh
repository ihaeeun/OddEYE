#!/bin/bash
while true; do
python /var/www/html/OddEYE/images/search.py & python mysql2.py & sleep 5
done
