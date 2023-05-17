@echo off
rem Try to gracefully stop the PHP container
docker stop -t 30 php
rem If the container is still running, kill it
docker kill php
