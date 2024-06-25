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

## Install Firefox ESR
No major browsers support macOS High Sierra any more (the latest version that runs on my lab hardward). Firefox ESR does, though!
- Google search "install firefox mac" and/or navigate to https://www.mozilla.org/en-US/firefox/mac/
- You will be notified that your OS version is not supported, and you will be seamlessly redirected to install the ESR edition "Firefox Extended Support Release".
- Click Download Firefox ESR
- Open the file in the Downlods folder (similar to "Firefox 115.12.0esr.dmg)
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
VS Code is not supported on the old OS, so here are two options that do install:
- Sublime Text https://sublimetext.com
  - Download for Mac
  - Open the Zip file
  - Drag Sublime Text to the Applications folder
  - Not free (but offers an unlimited free trial), Limited built-in features compared to some competitors
- TextMate - https://macromates.com/ and https://github.com/textmate/textmate
  - Open the .tbz file
  - Open the new folder
  - Drag TextKate to the applications folder
- Brackets https://brackets.io/
  - Click Download
  - Much slower to install and load on the Lab mini

## Install MAMP Environment
MAMP = Mac Apache MySQL PHP - https://www.mamp.info/en/downloads/
- MAMP & MAMP PRO 6.9 (macOS 1.12+ & Intel CPU)
- open the downloaded .pkg file
- follow prompts
- run MAMP application from the MAMP folder inside the Applications folder
- note the htdocs folder, were you will place your web application
- optionally, run MAMP PRO under a 14-day trial for a lot more handy features like changing the app location
- Click Start
- Point your browser to http://127.0.0.1:8888
  
## Test a Sample App
