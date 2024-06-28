# macOS Testing
In this step, we will be configuring the mini to be a simple web development system. This will be somewhat of a challenge as most modern software packages will not install on macOS High Sierra.

## First things first
- Clean up the dock
  - drag iTunes into the Trash
  - drag Facetime into the Trash
  - drag Messages into the Trash
  - drag Siri into the Trash
- Enable automatic updates
  - Click Apple Icon
  - System Preferences
  - App Store
  - Check *Automatically Check* and the settings you prefer
- Connect to WiFi https://support.apple.com/guide/mac-help/connect-your-mac-to-the-internet-using-wi-fi-mchlp1180/mac
- Enable SSD Trim (if you have an SSD)
  - `sudo trimforce enable`
  - Accept the warning
  - Accept the reboot

## Install Firefox ESR
No major browsers support macOS High Sierra any more (the latest version that runs on my lab hardward). Firefox ESR does, though!
- Google search "install firefox mac" and/or navigate to https://www.mozilla.org/en-US/firefox/mac/
- You will be notified that your OS version is not supported, and you will be seamlessly redirected to install the ESR edition "Firefox Extended Support Release".
- Click Download Firefox ESR
- Open the file in the Downloads folder (similar to "Firefox 115.12.0esr.dmg")
- Drag the Firefox icon to the Applications folder shortuct
- Control-click in the Firefox window and click Eject "Firefox"
- Optionally drag Firefox onto the Dock from the applications folder
- See more information at https://support.mozilla.org/en-US/kb/how-download-and-install-firefox-mac
- Optionally compare the speedtest.net results with Safari and Firefox

## Load Maintenance Tools
For those new to Mac, here are some tools for benchmarking, testing, and maintenance.

*See also https://www.makeuseof.com/tag/free-mac-tools-fix-problems/*

### Benchmarks
Normally we would install Geekbench 6 from the app store. However, it won't run on older macOS versions like High Sierra
- https://www.macworld.com/article/672457/how-to-benchmark-and-speed-test-a-mac.html

### Diagnostics
- Open Disk Utility and click First Aid to check the integrity of the file system
  - will will be prompted to run and scan the booot disk
  - run First Aid on the hidden Container which can be revealed within Disk Utility by clicking on "View" within Disk Utility and selecting "Show All Devices"
  - Even if First Aid shows everything is "Ok", click "Show Details" and look for any unfixed errors or warnings
- Install Etrecheck https://www.etrecheck.com/en/index.html
  - Click download EtreCheckPro
  - Click the Zip file
  - Drag the extracted .dmg from Downloads to the Applications folder
- Most options are only available if you pay for the Pro version
- In the Lab the SSD was flagged as slow under Minor problems; the controller issues show up here

### Maintenance
- Install Onyx https://www.titanium-software.fr/en/onyx.html
  - Download and install the version for your macOS verson (all the way back to OSX Jaguar!)
    - Click Download
    - Open the OnyX.dmg file
  - Drag OnyX to the Applications folder link
  - Utilities -> Run Scripts for light maintenance
  - Maintenance -> Run Tasks for comprehensive cleanup
  - Check the status of your storage drive's SMART status
- Install OmniDiskSweeper https://www.omnigroup.com/more
  - Download the version matching your macOS (e.g., 10.13)
  - Open the .dmg file and drag to the Applications folder link
  - Quickly find large, unwanted files and sweep them tinto the trash
- TinkerTool 6 - https://www.bresink.com/osx/0TinkerTool6/download.php
  - Download the .dmg file, open it, drag the app to Applications
  - Easy access to customize the interface

## Install Code Editor
VS Code is not supported on the old OS, so here are three options that do install:
- Sublime Text https://sublimetext.com
  - Download for Mac
  - Open the Zip file
  - Drag Sublime Text to the Applications folder
  - Not free (but offers an unlimited free trial), Limited built-in features compared to some competitors
- TextMate - https://macromates.com/ and https://github.com/textmate/textmate
  - Open the .tbz file
  - Open the new folder
  - Drag TextMate to the applications folder
- Brackets https://brackets.io/
  - Click Download
  - Open the .dmg file and drag app to Applications
  - Much slower to install and load on the Lab mini

## Install MAMP Environment
MAMP = Mac Apache MySQL PHP - https://www.mamp.info/en/downloads/
- Click MAMP & MAMP PRO 6.9 (macOS 1.12+ & Intel CPU)
- Open the downloaded .pkg file
- Follow the prompts
- Run the MAMP application from the MAMP folder inside the Applications folder
- Note the htdocs folder, were you will place your web application
- optionally, run MAMP PRO under a 14-day trial for a lot more handy features like changing the app location
- Click the small power icon to start the MAMP services
- Point your browser to http://127.0.0.1:8888
  
## Dokuwiki
Dokuwiki is an open source wiki that is a good demonstration. However, it does not use the mySQL database
- https://download.dokuwiki.org/
  - optionally remove unwanted language packages
  - optionally add Upgrade Plugin
  - Click Download
- Open Terminal
- Copy the downloaded .tgz file to the htdocs directory
  - Example if your volume is named macOS
  - `cp Downloads/docuwiki*tgz /Volumes/macOS/Applications/MAMP/htdocs`
- Unpack the tgz file
  - Example if your volume is named macOS
  - `cd /Volumes/macOS/Applications/MAMP/htdocs`
  - `tar xzvf dokuwiki-[tab complete]`
- Run the Dokuwiki installation wizard
  - http://127.0.0.1:8888/dokuwiki/install.php
- Clean up
  - delete the install.php file from the dokuwiki folder
  - delete the .tgz file from the htdocs folder
- Access the wiki at http://127.0.0.1:8888/dokuwiki/

## Install Homebrew
Let's install the "missing package manager" for macOS - https://brew.sh/
```
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```
## Install packages with Homebrew
### Install git
Read more at https://www.ansibletutorials.com/install-ansible-mac-os-x.html#section-install

WARNING this was extremely slow to compile in my Lab environment (measured in hours not minutes)
```
brew update
brew install git
git --version
```

### Install Ansible
Read more at https://www.ansibletutorials.com/install-ansible-mac-os-x.html#section-install

In the Lab installing the prerequisite gcc failed, so I was unable to get Ansible working.

```
brew update
brew install gcc ansible
ansible --version
```

### Install mysql-client
Read more at https://stackoverflow.com/questions/30990488/how-do-i-install-command-line-mysql-client-on-mac

In the Lab installing mysql-client gave a javac requires SDK warning, then fails.

```
brew update
brew install mysql-client
mysql --version
```

## Install LAMP Apps on MAMP
### Simple-LAMP
- https://github.com/qyjohn/simple-lamp
- Open Terminal
- Change directory to the htdocs directory
  - Example if your volume is named macOS
  - `cd Volumes/macOS/Applications/MAMP/htdocs`
- Clone the repo
  - https://github.com/qyjohn/simple-lamp
  - `git clone https://github.com/qyjohn/simple-lamp`
- Normally we would use `mysql` client to do the initial configuration. However, the mysq-client failed to build/install on High Sierra
- Create `install.php` file to perform the same options
  - [install.php](install.php)
- Configure the app:
  - http://127.0.0.1:8888/simple-lamp/install.php
- Access the app:
  - http://127.0.0.1:8888/simple-lamp/
- You can now access the app from another Lab system by using the IP address of the mini
  - example: http://192.168.0.100:8888/simple-lamp
- It's best practice to remove the `install.php` file after isntallation to prevent overwriting the database

### YOURLS
https://yourls.org/docs - https://github.com/YOURLS/YOURLS
- Web Server: YOURLS requires Apache (httpd) version 2.4 or greater, with the mod_rewrite module enabled.
- PHP: PHP version 7.4 or greater is required for YOURLS to function correctly.
- If you plan on utilizing the YOURLS API, make sure the PHP cURL extension is enabled.
- Database: YOURLS supports either MySQL (version 5.0 or greater) or MariaDB (version 10.0 or greater) for storing link data.
- HTTPS Support: For security reasons, we recommend hosting your YOURLS installation on a server with HTTPS support.

Steps:
- Change directory to the htdocs directory
  - Example if your volume is named macOS
  - `cd Volumes/macOS/Applications/MAMP/htdocs`
- Clone the repo
  - https://github.com/qyjohn/simple-lamp
  - `git clone https://github.com/YOURLS/YOURLS`
- Create the MySQL database and user
  - Create `setup.php` file in htdocs/YOURLS/setup.php
  - [setup.php](setup.php)
  - http://localhost:8888/YOURLS/setup.php
- Create config file
  - Copy htdocs/YOURLS/user/config-sample.php to htdocs/YOURLS/user/config.php
  - Edit the YOURLS_DB_USER value to `yourls` (in production you would add another user for YOURLS)
  - Edit the YOURLS_DB_PASS to `password` (see the setup.php file)
  - Modify YOURLS_SITE to the URL you will use to access the site (e.g., http://192.168.99.100:8888/YOURLS)
    - if you don't, you will get a hilarious error message
- Navigate to http://127.0.0.1:8888/YOURLS/admin

### Lychee App
https://github.com/electerious/Lychee

## Remote Access and Remote Desktop
- Click the Apple logo then System Preferences
- Click Sharing
  - Check Remote Login (allows remote SSH login)
  - Check Remote Management
    - For our Lab purposes, check all the options
    - Click on Remote Management then click Computer Settings
        - Check all 3 boxes
        - Enter VNC control password
- Test ssh access and remote desktop
  - if connected to both wired and wireless, only the wired IP address (the one showed on the remote long screen) will work

Remote access clients we use in our Lab:
- From another Mac:
  - Open Finder, then click Go from top menu
  - Enter the IP address as prefixed with vnc://
  - Example: vnc://192.168.0.100
  - Read more at https://itac.txst.edu/support/remote-desktop/mac-remote.html
- From Linux: Remmina
- From Windows: RealVNC Viewer - https://www.realvnc.com/en/connect/download/viewer/windows/
- Or use a Guamamole server

Notes:
- the Micorosoft Remote Desktop app from the app store didn't work (High Sierra is too old)
  - See older version at https://www.macupdate.com/app/mac/8431/microsoft-remote-desktop/old-versions
  - Open the .pkg file and follow the prompts
  - Be aware this app will try to update itself and give you NAG messages to upgrade macOS, which you can't do
- RealVNC Viewer Mac client Support for MacOS High Sierra was removed after VNC Server 6.7.4 and VNC Viewer 6.21.406
  - 6.21.1109 is best version available, but it does not install on our High Sierra system
    - VNC-Viewer-6.21.1109-MacOSX-x86_64.dmg
  - Older versions have a bad vulnerability
    - VNC-Viewer-6.20.111-MacOSX-x86_64.dmg
      - https://macdownload.informer.com/vncviewer/download/?ca2fb36b
      - works in the Lab environment
