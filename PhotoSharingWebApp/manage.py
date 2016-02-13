#!/usr/bin/env python
#This file is for interacting with our project via command line
# eg starting the development derver

import os
import sys

if __name__ == "__main__":
    os.environ.setdefault("DJANGO_SETTINGS_MODULE", "PhotoSharingWebApp.settings")

    from django.core.management import execute_from_command_line

    execute_from_command_line(sys.argv)
