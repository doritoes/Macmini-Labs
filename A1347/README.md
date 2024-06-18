# Mac mini A1337 (Mid 2010)
The "Mac Mini 2010" is an older model with some interesting features. In this lab we will refurbing and restore a Mac mini and put it to use in the Lab.

# About the unit
Specifiations: https://support.apple.com/en-us/102852

![image](https://github.com/doritoes/Macmini-Labs/assets/39832079/a45240dd-171b-4dac-a249-1ce2c629e9f3)

- Model Identifier: Macmini4,1
- Part Numbers: MC438xx/A, MC270xx/A
- Newest compatible operating system: macOS High Sierra
- Tech Specs: Mac mini (Mid 2010)

Specs: https://support.apple.com/en-us/112588

Processor and memory
- 2.4GHz or 2.66GHz Intel Core 2 Duo processor
- 3MB on-chip shared L2 cache
- 1066MHz frontside bus
- 2GB (two 1GB SO-DIMMs) of 1066MHz DDR3 SDRAM; two SO-DIMM slots support up to 8GB
  - Maximum per slot: 4GB

Peripheral connections
- One FireWire 800 port (up to 800 Mbps)
- Four USB 2.0 ports (up to 480 Mbps)
- SD card slot

Graphics and video support
- NVIDIA GeForce 320M graphics processor with 256MB of DDR3 SDRAM shared with main memory4
- Mini DisplayPort with support for up to 2560-by-1600 resolution
- HDMI port with support for up to 1920-by-1200 resolution
- DVI output using HDMI to DVI Adapter (included)
- VGA output using Mini DisplayPort to VGA Adapter (sold separately)
- Support for extended desktop and video mirroring across both ports

Communications
- AirPort Extreme 802.11n Wi-Fi wireless networking5; IEEE 802.11a/b/g compatible
- Bluetooth 2.1 + EDR (Enhanced Data Rate) wireless technology
- 10/100/1000BASE-T Ethernet (RJ-45) interface with support for jumbo frames

Audio
- Audio line in minijack (digital/analog)
- Audio line out/headphone minijack (digital/analog)
- HDMI port supports multichannel audio output
- Support for Apple iPhone headset with microphone

Storage
- 320GB or 500GB Serial ATA hard disk drive6
- 8x slot-loading SuperDrive (DVD±R DL/DVD±RW/CD-RW)
- Maximum read: 8x DVD-R, DVD+R, DVD-ROM, DVD-ROM (double layer DVD-9), DVD-R DL (double layer), DVD+R DL (double layer), DVD-RW, and DVD+RW; 24x CD
- Maximum write: 8x DVD-R, DVD+R; 6x DVD-R DL (double layer), DVD+R DL (double layer), DVD-RW; 8x DVD+RW; 24x CD-R; 24x CD-RW

## Challenges
1. the internet recovery method no longer works on this older unit due to certificate expiration/issues
2. limited to two 4GB RAM sticks
2. difficult to create a restoration USB stick
3. specialized tools neeeded to work on the hardware
4. delicate touch needed working on the hardware
5. limited to very old OS macos High Sierra 10.13
6. macOS 10.13 to no supported by most modern software (including Microsoft office apps, browsers, etc)

## Common uses
- As a [server](https://support.apple.com/guide/mac-mini/use-mac-mini-as-a-server-apd05a94454f/mac)
  - File server
  - Time Machine Server (Apple's backup system is called Time Machine)
  - Caching Server
- Streaming sports or movies
- Running Proxmox
- Runing Plex
- More ideas: https://eshop.macsales.com/blog/76875-6-ways-you-can-use-an-old-or-refurbished-mac-mini/

# Overview
## Inventory
In this step, evaluate the state of the Mac mini

[Inventory](1_Inventory.md)

https://support.apple.com/en-us/102550 Apple Diagnostics

## Upgrade RAM and Storage
Maximize the performance of the device

[Upgrade](2_Upgrade.md)

## Reload OS
This step covers reloading the Mac operating system

[Reload](3_Reload.md)

## Initial Tests
[Initial Tests](4_Testing.md)


## Install Supported Browser
No major browsers support even the most recent version of Mac os available for this older Mac mini. Firefox ESR does, though!

[Installing Firefox ESR](5_Browser.md)

## Install Linux
Installing Linux on the Mac mini

The Mini doesn't have a classic PC style BIOS because it is not built on legacy PC designs. It runs Apple's implementation of EFI. You can get into the boot picker by holding Option(Alt on a PC keyboard) at power on. If you want to change setting you do it through EFI variables, or install a compatible EFI boot manager.

https://medium.com/@woodywang2013/linux-on-an-old-mac-mini-f8cb63b7657f

Manjaro, because it is based on Arch Linux

- web server
- Docker
- what else?

[Installing Linux](6_Linux.md)

## Proxmox
Proxmox is a popular hypervisor. This is another popular use for the Mac mini: run VMs and LXC containers

The Mini doesn't have a classic PC style BIOS because it is not built on legacy PC designs. It runs Apple's implementation of EFI. You can get into the boot picker by holding Option(Alt on a PC keyboard) at power on. If you want to change setting you do it through EFI variables, or install a compatible EFI boot manager.

## Plex
Media and streaming server

## NAS
Use MacOS file sharing

## Restore MacOS
https://www.macworld.com/article/672001/command-r-not-working-how-to-reinstall-macos-if-recovery-wont-work.html
