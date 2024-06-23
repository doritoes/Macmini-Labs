# Inventory
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
- a non-compatible RAM module (i.e., a single 8GB RAM module) will cause the device to fail to boot

Remove the bottom panel by rotating it, and inspect the RAM sticks. Replace the panel when done.

## Diagnostics
Running hardware diagnostics is meant to be simple and easy: press and hold the "D" key when powering on.
- Apple Diagnostics - https://support.apple.com/en-us/102550

However, in my Lab test I received the error "Apple Hardware Test does not support this machine". Pressing and holding Option (⌥)-D gave the same results. If you device runs it successfully, for any any hardware issues.

For information on how to boot and run the hardware diagnostics, see https://github.com/upekkha/AppleHardwareTest

## If It Won't Boot
Troubleshoot boot failure:
- https://www.macworld.com/article/672001/command-r-not-working-how-to-reinstall-macos-if-recovery-wont-work.html

If you determine you need to re-install MacOS, you may skip ahead to the section on how to recover MacOS.
