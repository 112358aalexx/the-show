The Show
========

A custom report generator for FreePBX

## Overview

"The Show" is a quick 'n dirty, read-only app to review the call logs
and trunk usage of an Asterisk PBX. It works by pulling in data from
a database and has been tested with FreePBX and its MySQL database.
Usage with other databases or systems will likely require some (or many)
modifications.


## Usage

Use at your own risk. I am by no means a PHP or MySQL guru (quite the
opposite, actually) and kittens may be killed upon using the application.
You've been warned!

Usage is pretty straight forward (hopefully). When first loading The Show,
you'll have two links at the top right: "CDR" and "Trunk Usage". Clicking
either of these will load tables which can be navigated by jumping
between the day, month, and year links at the top left of the screens.

Please let me know if you have any issues or if you find The Show useful.
The is my first app of any significance and would appreciate any 
constructive criticism.


## Installation

1. Download the app and unzip it into a web accessible directory. 
2. Edit "conf/settings.php" with your database information and trunks.
3. Optionally edit "conf/regex.php" with replacements for "ugly" data
   that may be displayed
4. Optionally lock down The Show's directory with http auth. e.g.
   mod _kerb
5. Fire up a web browser and load The Show
6. Enjoy!


## To Do

1. Integrate with FreePBX's AMI Address Book for a click-to-dial list.
2. General improvements to the code
