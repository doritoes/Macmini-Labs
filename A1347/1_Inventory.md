# Inventory
You can find a lot of Mac mini A1347 computers for sale on eBay. There are a number of varieties available. Be mindful that a number are sold "as-is" and "for parts only".

In this lab we will be using an "A1347" with an Intel processor.
- Covers 2010-2014 model years
- Learn more at https://everymac.com/systems/apple/mac_mini/mac-mini-aluminum-unibody-faq/
- https://everymac.com/ultimate-mac-lookup/?search_keywords=A1347

Pros:
- the power supply and hard drive are internal and hard to remove, so we see less "stripped" devices on eBay

Cons:
- no recent and supported Mac os versions run on the oldest models
- requires specialized tools (there are many "Mac Mini Tool Kit" options for sale on-line)
- difficult to re-image the OS on older minis due to certificate expiration issues affecting Internet recover
- not technically required, but a <ins>used</ins> Mac keyboard is worth the extra expense

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
Apple Diagnostics - https://support.apple.com/en-us/102550

## If It Won't Boot
Troubleshoot boot failure:
- https://www.macworld.com/article/672001/command-r-not-working-how-to-reinstall-macos-if-recovery-wont-work.html

If you determine you need to re-install MacOS, you may skip ahead to the section on how to recover MacOS.
