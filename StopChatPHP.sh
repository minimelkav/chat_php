#!/bin/bash
# Try to gracefully stop the PHP container
docker stop -t 30 php
# If the container is still running, kill it
docker kill php
