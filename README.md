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

    simply: 
    
    php cli_notify.php 'type' 'prowl api key' 'nma api key' 'appname' 'event title' 'event desc' 'priority' 'url'
    
    • type: an integer 1,2, or 3 
            1 = Prowl Notification Only
            2 = NMA Notification Only
            3 = Both
    
    • prowl api key/nma api key: key provided by prowl/nma, this overrides the one in config.php. 
      If you have set this in config.php and wish to use that just put a "" on the command line.
    
    • appname: custom name for your app (defaults to php_notify_cli)
    
    • event title: the "subject" of your event
    
    • event description: this is option if nothing is provided it defaults to "no event details"
    
    • priority: priority of the notification
    
        -2 low priority
        -1 mid low
         0 normal
         1 mid high
         2 emergency
         
         anything other than the above will be defaulted back to 0
         
    • url: a redirect url (currently only works in prowl, supposed to be included in NMA soon.)

  ▶ NOTE: YOU MUST HAVE ALL VARIABLES EVEN IF THEY ARE LEFT BLANK
