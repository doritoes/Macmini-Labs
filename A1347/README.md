# Mac mini A1347
The Mac mini A1347 is a series of older models with some interesting features. In this lab we will refurbishing and restore a Mac mini and put it to use in the Lab.
- Covers 2010-2014 model years
- Intel processor
- Learn more at https://everymac.com/systems/apple/mac_mini/mac-mini-aluminum-unibody-faq/
- https://everymac.com/ultimate-mac-lookup/?search_keywords=A1347

You can find a lot of Mac mini A1347 computers for sale on eBay. There are a number of varieties available. Be mindful that a number are sold "as-is" and "for parts only".

Hardware upgrades:
- upgrading RAM to the recommeded 2x 4GB modules
- replacing the HDD or "fusion" drive with a 2.5" SSD drive

# About the unit
In the Lab we will be using mid-2010 units with the 2.4GHz processor. Later versions of the A1347 can run later versions of MacOS and might have different ports or features.

Specifications: https://support.apple.com/en-us/102852

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

## Pros, Cons and Challenges
Pros:
- the power supply and hard drive are internal and hard to remove, so we see less "stripped" devices on eBay
- generally cleaner and better cared for than Intel NUCs in my experience
- able to run other OS (EFI support, but not BIOS)
- technically supports up to 16GB RAM (but caveats apply)
Cons:
- no recent and supported macOS versions run on the oldest models
  - limited to very old OS macos High Sierra 10.13 (later A1347 models may support later versions)
  - majority of modern apps don't run on this version (Microsoft Office, Browsers, etc)
  - limited to two 4GB RAM sticks (total 8GB) unless specific conditions are met

- difficult to re-image the OS on older minis due to Internet recover no longer working
  - Internet recovery no longer works on this older unit due to certificate expiration/issues
  - difficult to create a restoration USB stick
- requires specialized tools to disassemble (there are many "Mac Mini Tool Kit" options for sale on-line)
- delicate touch needed working on the hardware
- not technically required, but a <ins>used</ins> Mac keyboard is worth the extra expense

## Common uses
- As a [server](https://support.apple.com/guide/mac-mini/use-mac-mini-as-a-server-apd05a94454f/mac)
  - File server
  - Time Machine Server (Apple's backup system is called Time Machine)
  - Caching Server
- Web developer workstation
- Streaming sports or movies
- Running Proxmox
- Running Plex
- More ideas: https://eshop.macsales.com/blog/76875-6-ways-you-can-use-an-old-or-refurbished-mac-mini/

# Overview
## Inventory
[Inventory](1_Inventory.md) - In this step, evaluate the state of the Mac mini

## Upgrade RAM and Storage
[Upgrade](2_Upgrade.md) - Maximize the performance of the device

## macOS Tasks
### Reload macOS
[Reload macOS](3_Reload_macOS.md) - This step covers reloading the Mac operating system
### Benchmarks
[Initial Tests](4_Testing.md) - Benchmark and do some initial diagnostics
### Install Firefox ESR
[Installing Firefox ESR](5_Browser.md) - No major browsers support even the most recent version of macOS available for this older Mac mini. Firefox ESR does, though!

## Linux Desktop Tasks
[Installing Linux](6_Linux.md) - Installing Linux on the Mac mini
### Install Ubuntu Desktop 22.04 LTS
It's astonishingly simple to install Linux. Just insert a bootable installation USB and power on, holding the Option key (Alt on a PC keyboard). The Mini doesn't have a classic PC style BIOS because it is not built on legacy PC designs. It runs Apple's implementation of EFI, so you will need and installer with UEFI.
### Benchmark
### Code Editor
### Install MAMP
### Test a Sample App

## Linux Server Tasks
### Install Ubuntu Server 22.04 LTS

## Tails Demonstration

## Proxmox
Proxmox is a popular hypervisor. This is another popular use for the Mac mini: run VMs and LXC containers

The Mini doesn't have a classic PC style BIOS because it is not built on legacy PC designs. It runs Apple's implementation of EFI. You can get into the boot picker by holding Option(Alt on a PC keyboard) at power on. If you want to change setting you do it through EFI variables, or install a compatible EFI boot manager.

## Plex
Media and streaming server

## NAS
Use MacOS file sharing

# Appendices
[Startup Key Combinations](Appendix - Startup Key Combinations)

## Restore MacOS
https://www.macworld.com/article/672001/command-r-not-working-how-to-reinstall-macos-if-recovery-wont-work.html
