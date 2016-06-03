#!/bin/bash
php -S localhost:9920 &
(sleep 1 && open http://localhost:9920) 

