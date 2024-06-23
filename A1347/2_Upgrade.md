# Upgrade RAM and Storage
I recommend upgrading the RAM to 8GB (2x 4GB modules):
- DDR3 1066 MHz and 1.5V
- Using 1.35V DDR RAM will result it failure to boot

The storage drive can be replaced with a 2.5" SSD of your choice.
- The 2010 Mac Mini has a SATA II G3 controller, so you will need to make sure that whatever drive you select (SSD or HDD) is compatible or backwards compatible to SATA II 3G.
- Reportedly utilizes SATA2 but seems to perform at SATA1 speeds due to controller issues
- Samsung or Crucial are recommended brands

Requirements:
- Mac Mini toolkit
- If you are replacing the storage, you will need a bootable MacOS High Sierra USB stick to install the OS when you are done

## RAM
Difficulty: Easy

Apple solution: [Upgrade or install memory in your Mac mini](https://support.apple.com/en-us/102328)

## SSD
Difficulty: Hard

Replacing the drive:
- ifixit: https://www.ifixit.com/Guide/Mac+mini+Mid+2010+Hard+Drive+Replacement/3113

Installing macOS High Sierra
- https://www.ifixit.com/Guide/How+to+Install+macOS+High+Sierra/751
- requires creating a bootable USB from another MacOS High Sierra system (instructions provided)
- See also the later step on installing macOS
- the Internet recovery method for older Mac Minis is now broken since a required certificate expired
- beware purchasing a Windows application to create the Mac installation USB - I had a bad experience with this method
- you can purchase a bootable USB on eBay, and I had success with this method; some some with multiple installers on one USB ("Mac Repair Service 8 in 1 Bootable USB 3 Flash Drive Installer for 8 OS")
