# Reload macOS
macOS has a few ways to restore a Mac to factory defaults. However, these may not work for your mini.
- https://www.macworld.com/article/672001/command-r-not-working-how-to-reinstall-macos-if-recovery-wont-work.html

Issus encounted:
  - the mid-2010 mini only supports macOS High Sierra
  - the unit came with OS X, so restore to that image doesn't help me
  - identified that Internet Recovery no longer works because the embedded certificate used has expired

## Installing macOS High Sierra
The most reliable method is to install macOS High Sierra from a bootable USB stick.

https://www.ifixit.com/Guide/How+to+Install+macOS+High+Sierra/751

This process requires creating a bootable USB from another MacOS High Sierra system (instructions provided)
- See also the later step on installing macOS from a bootable USB stick
- Beware purchasing a Windows application to create the Mac installation USB - I had a bad experience with this method
- You can purchase a bootable USB on eBay, and I had success with this method; some come with multiple installers on one USB ("Mac Repair Service 8 in 1 Bootable USB 3 Flash Drive Installer for 8 OS") which is great for the Lab

Overview:
1. Option-boot to the installation USB stick
2. Use Disk Utility to erase the drive
3. Return to the menu and insstall macOS

Steps:
- power off the Mac
- insert the recovery USB stick
- power on the mini, holding Option
- select the restoration image from the list of images on the USB
- use disk utility to [erase the hard drive/ssd](https://support.apple.com/en-us/102639)
  - Select "Macintosh HD" in the side bar (or whatever it is named)
  - Click the Erase button, then enter the requested details:
    - Name: Macintosh HD
    - Format: Mac OS Extended (Journaled), as recommended by Disk Utility
    - Click Erase
  - When done, quit Disk Utilty and return to the utilities window in Recovery
  - Select Reinstall macOS in the utilities window
    - click Continue and follow the onscreen instructions
    - for Lab use, skip configuring an Apple ID/login   
