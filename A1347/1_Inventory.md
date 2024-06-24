# Inventory
Mac minis were produced in different varieties and options, including the different CPU option.

## Identify the model
The first step it to identify which one you have.
- The best way is to boot it it up and check
  - Apple menu -> About this Mac
    - Click System Report... for more information
- If your mini  is not booting, enter its serial number in the search tool: https://everymac.com/ultimate-mac-lookup/?search_keywords=A1347

## Identify the RAM
The most common modifications made to Mac minis is adding more RAM. My Lab devices had been upgraded from 2GB base to 2x 2GB Crucial RAM modules for 4GB total.

Be aware that originally the maximum RAM was 8GB. However, if three requirements are met, it can support up to 16GB of RAM
- running OS X 10.7.5 or higher
- updated with the latest EFI
- equipped with proper specification memory modules
A non-compatible RAM module will cause the device to fail to boot

To physically inspect the RAM, remove the bottom panel by rotating it. Replace the panel when done.

## Diagnostics
Running hardware diagnostics is meant to be simple and easy: press and hold the "D" key when powering on.
- Apple Diagnostics - https://support.apple.com/en-us/102550

However, in my Lab test I received the error "Apple Hardware Test does not support this machine". Pressing and holding Option (⌥)-D gave the same results.

This site provides information on creating your own bootable USB stick with the hardware test.
-  https://github.com/upekkha/AppleHardwareTest

Steps
1. Format the USB stick
    - Insert the USB stick
    - Identify the disk number: `diskutil list`
    - Example for "disk2"
      - `diskutil eraseDisk JHFS+ USBstick GPT disk`
    - The USB should now be mounted under `/Volumes/USBstick`
2. Download the MacMini4,1 AHT (Apple Hardware Test)
    - Download https://download.info.apple.com/Apple_Hardware_Test/022-4706-A.dmg
3. Double-click the DMG file to mount it
    - `ls /Volumes`
    - In my Lab the volume is `AHTDTwo`
4. Copy AHT to the USB stick and flag it as bootable
```
cp -r /Volumes/AHT_Disk_Two/System /Volumes/USBstick/
sudo bless --folder /Volumes/USBstick/ --file /Volumes/USBstick/System/Library/CoreServices/.diagnostics/diags.efi --label AHT
```
5. Option-boot with the USB stick inserted and select the AHT

These instructions make the USB stick show "EFI Boot" when I did an option-boot. But selecting it just booting the mini as normal.

## Alternative Hardware Diagnostics
Since the mini has an Intel processory and can boot from EFI images, you can boot from other hardward diagnostics tools.

One simple way is to boot from a Linux Live image and look at the system.

## If the mini Won't Boot
Troubleshoot boot failure:
- https://www.macworld.com/article/672001/command-r-not-working-how-to-reinstall-macos-if-recovery-wont-work.html

If you determine you need to re-install MacOS, you may skip ahead to the [Appendix - Create Recovery USB Stick](Appendix - Create Recovery USB Stick)
