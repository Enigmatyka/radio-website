#!/usr/bin/env bash

tar cf website.tar css/ images/ modules/ scripts/ widgets/ *.shtml index.php
scp -P 41711 website.tar  u69804@n1.slotex.cloud:public_html
ssh u69804@n1.slotex.cloud -p 41711 'cd public_html; tar xf website.tar; rm website.tar'
rm website.tar
