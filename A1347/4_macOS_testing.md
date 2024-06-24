# macOS Testing
In this step, we will be configuring the mini to be a simple web development system. This will be somewhat of a challenge as most modern software packages will not install on macOS High Sierra.


## First things first
- You can drag iTunes into the Trash
- Enable automatic updates by following the steps at https://support.apple.com/guide/mac-help/keep-your-mac-up-to-date-mchlpx1065/mac
- Connect to WiFi https://support.apple.com/guide/mac-help/connect-your-mac-to-the-internet-using-wi-fi-mchlp1180/mac

## Install Firefox ESR
No major browsers support macOS High Sierra any more (the latest version that runs on my lab hardward). Firefox ESR does, though!
- Google search "install firefox mac" and/or navigate to https://www.mozilla.org/en-US/firefox/mac/
- You will be notified that your OS version is not supported, and you will be seamlessly redirected to install the ESR edition "Firefox Extended Support Release".
- Download Firefox
- After completing the download, the file (Firefox.dmg) may open a Finder window containing the Firefox application
- Drag the Firefox icon to the Applications folder
- See more information at https://support.mozilla.org/en-US/kb/how-download-and-install-firefox-mac
  - how to eject the dmg file
  - how to add Firefox to your dock
- Compare the speedtest.net resuts with Safari


## Load Maintenance Tools
For those new to Mac, here are some tools for benchmarking, testing, and maintenance.

*See also https://www.makeuseof.com/tag/free-mac-tools-fix-problems/*

### Benchmarks
Normally we would install Geekbench 6 from the app store. However, it won't run on older macOS versions like High Sierra
- https://www.macworld.com/article/672457/how-to-benchmark-and-speed-test-a-mac.html

### Diagnostics
- Use Disk Utility First Aid to check the integrity of the file system
    - run First Aid on the hidden Container which can be revealed within Disk Utility by clicking on "View" within Disk Utility and selecting "Show All Devices"
    - Even if First Aid shows everything is "Ok", click "Show Details" and look for any unfixed errors or warnings
- Install Etrecheck https://www.etrecheck.com/en/index.html
    - Open the Zip file and drag the DMG to the desktop
    - Double-click the app
    - Default problem: Computer is too slow
    - Most options are only available if you pay for the Pro version
### Maintenance
- Install Onyx https://www.titanium-software.fr/en/onyx.html
    - Download and install the version for your macOS verson (all the way back to OSX Jaguar!)
    - Comprehensive cleanup for your Mac
    - Check the status of your storage drive's SMART status
- OmniDiskSweeper
- TinkerTool System 6

## Install Code Editor
VS Code is not supported on the old OS, so here are two options that do install:
- Sublime Text - Not free (but offers an unlimited free trial), Limited built-in features compared to some competitors
- TextMate - https://github.com/textmate/textmate

Things that failed:
- VS Code https://code.visualstudio.com/
- check folllowing
- Brackets https://brackets.io/
- https://espressoapp.com/
- ATOM is discontinued
- BBEdit - cost
- CotEditor

## Install MAMP Environment
MAMP = Mac Apache MySQL PHP

https://www.mamp.info/en/downloads/

## Test a Sample App
