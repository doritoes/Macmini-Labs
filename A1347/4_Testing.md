# Initial Tests
For those new to Mac, here are some tools for benchmarking, testing, and maintenance.

*See also https://www.makeuseof.com/tag/free-mac-tools-fix-problems/*

## First things first
1. You can drag iTunes into the Trash
2. Enable automatic updates https://support.apple.com/guide/mac-help/keep-your-mac-up-to-date-mchlpx1065/mac

## Tools
### Benchmark
Install Geekbench 6 from the app store.
- https://www.macworld.com/article/672457/how-to-benchmark-and-speed-test-a-mac.html
- However, it doesn't run on older macOS versions such as High Sierra

### Diagostics
1. Use Disk Utility First Aid to check the integrity of the file system
    - run First Aid on the hidden Container which can be revealed within Disk Utility by clicking on "View" within Disk Utility and selecting "Show All Devices"
    - Even if First Aid shows everything is "Ok", click "Show Details" and look for any unfixed errors or warnings
2. Boot from a MemTest86 USB stick
    - Download the image https://www.memtest86.com/download.htm
    - Create a bootable USB using Etcher
    - Option-boot the Mac
2. Install Etrecheck https://www.etrecheck.com/en/index.html
    - Open the Zip file and drag the DMG to the desktop
    - Double-click the app
    - Default problem: Computer is too slow
    - Most options are only available if you pay for the Pro version

### Maintenance
1. Install Onyx https://www.titanium-software.fr/en/onyx.html
    - Download and install the version for your macOS verson (all the way back to OSX Jaguar!)
    - Comprehensive cleanup for your Mac
    - Check the status of your storage drive's SMART status
2. OmniDiskSweeper
3. TinkerTool System 6

### Web Development Testing
1. Install a MAMP stack (Mac Apache MySQL PHP)
    - https://www.mamp.info/en/downloads/

### General Usage Testing
- Test web browsing and speedtest.net
- Test Wifi
