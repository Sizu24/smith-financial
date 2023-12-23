#!/bin/bash

# Start Apache in the background
apache2-foreground &

# Start Sass watch
sass --watch src/styles:css