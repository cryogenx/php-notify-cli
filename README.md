php-notify-cli
==============

PHP Notifcation system for command line PHP

Used as a CLI addon.

Can be used to add notifcations to any php/shell script

Requirements:

    php
    curl
    
    for prowl notifications (IOS) you will need the Prowl app on your device http://prowlapp.com 
    you will also need to sign up for an API key

    for Notify My Android notifications (Android) you will need the NMA app on your device http://www.notifymyandroid.com/ 
    you will also need to sign up for an API key 

      Note: NMA is limited to 5 notifications a day with a standard account.

Usage:

    from a bash prompt

    simply: php cli_notify.php 'type**' 'prowl api key' 'nma api key' 'appname***' 'event title ✝' 'event desc ✝✝' 'priority ☥' 'url ☥☥'
    
