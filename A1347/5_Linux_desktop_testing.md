# Linux Desktop Testing
In this step, we will be installing Ubuntu Desktop 22.04 LTS and putting it through its paces.

It's very easy to install Ubuntu Desktop on the mini. I actually used the very same USB stick I used to install on Intel NUCs to install Ubuntu on the mini.
- Download Ubuntu Live Desktop 22.04 LTS ISO
- Create a bootable USB stick using Balena Etcher
- Power off the Mac mini
- Insert the bootable USB stick
- Power on then immediately hold Option key (Alt key on Windows keyboard)
- Select the EFI boot image
- Follow the usual prompts

*See more comments at https://medium.com/@woodywang2013/linux-on-an-old-mac-mini-f8cb63b7657f*

IMPORTANT Lab testing ran into a few scenarios where after first boot the main graphics panne was corrupted with RAM artifacts and ghosting. Installing 3rd party drivers during setup was the most common cause. A package update and reboot solved the issue in all cases.

## Install from Bootable USB Stick
See the tutorial https://ubuntu.com/tutorials/install-ubuntu-desktop#1-overview
- Download the [latest ISO file](https://ubuntu.com/download/desktop)
- Create a bootable USB stick from the ISO
  - 💡[balenaEtcher](https://etcher.balena.io/#download-etcher) is recommended to create a bootable USB stick from the ISO
  - If your workstation is Windows, the Portable version is perfect for the task
  - Click **Flash from file** and select the downloaded ISO file
  - Click **Select target** and select the the USB stick you inserted
  - Click **Flash!** and allow the command shell to continue
  - Wait for the flash and verification to complete
  - Safely eject the USB stick (yes, there are two "drives" on the USB stick) ([tip](Appendix_Safely_Eject.md))
- Option-boot the mini from the bootable USB stick
  - Connect to keyboard, mouse and power
    - Optionally connect to wired network for faster setup
  - Insert the USB stick
  - Reboot or power on the mini
  - Press and hold Option
  - Select the USB stick (USB UEFI)
- Follow the prompts to install Ubuntu on the mini
  - Allow the system to come up to the "Install" screen and click **Install Ubuntu**
  - Accept the keyboard settings
  - Configure the wifi connection now (if you are wired, you won't be prompted; set it up later)
  - There is no wrong answer for the packages screen; accept the defaults or modify as desired
  - Select **Erase disk and install Ubuntu**
  - Click **Install Now**
  - Click **Continue** and write changes to disk
  - Accept the time zone settings
  - Enter system and user information *you can modify these as desired*
    - Name: **mini**
    - Computer name: **mini1**
    - Username: **tux**
    - Password: **tux**
    - Require password to log in
    - Continue
  - Wait patiently for the **Installation Complete** message
  - Click **Restart Now**
  - Remove the USB stick when prompted and press Enter

💡 You cannot SSH to mini1 at this point.

## Allow Remote Access
- Allow ssh
  - `sudo apt update && sudo apt install openssh-server -y`
- Allow remote desktop
  - See https://askubuntu.com/questions/1482111/remote-desktop-ubuntu-22-04-lts
  - Settings > Sharing
  - Enable the Sharing slider
  - Click Remote Desktop
  - Enable Remote Desktop
  - Enable Remote Control
  - Only Enable Legacy VNC Protocol if you must
  - Under authentication, confirm the username <ins>and password</ins>
    - a random password is set; you might want to change it to something more memorable  
  - BEWARE that remote desktop is disabled when the screen is locked
    - see https://askubuntu.com/questions/1411504/connect-when-remote-desktop-is-on-login-screen-or-screen-locked-without-autolog
    - there are workarounds

## Load Maintenannce Tools
References:
- https://www.howtoforge.com/tutorial/how-to-maintain-a-clean-ubuntu/

Cleanup and maintenance tools for Ubuntu
- ubuntu-cleaner
  - designed to clean up your Ubuntu system
  - `sudo update && sudo apt install software-properties-common`
  - `sudo add-apt-repository ppa:gerardpuig/ppa`
  - `sudo apt update && sudo apt install ubuntu-cleaner`
  - easy to remove after you are done cleaning
    - `sudo apt remove ubuntu-cleaner && sudo apt autoremove`
- ucaresystem
  - complete update and cleaning tool
  - automates the manual cleanup steps
  - Install
    - `sudo add-apt-repository ppa:utappia/stable`
    - `sudo apt dupate && sudo install ucaresystem-core`
  - Run
    - `sudo ucasesystem-core`
- GtkOrphan
  - scans for orphaned packages upon launch
  - `sudo apt update && sudo apt instlal gtkorphan`
- BleachBit
  - similar to CCleaner
  - deeper clean that allows cleanup junk files like history, cache, temporary files, crash reports, etc.
  - https://www.bleachbit.org/download/linux
  - download the .deb package and open it with... INSTALLER?
- Stacer
  - open source system optimizer and appliaction monitor
  - https://oguzhaninan.github.io/Stacer-Web/
  - `sudo add-apt-repository ppa:oguzhaninan/stacer`
  - `sudo apt-get update && sudo apt-get install stacer`
- GNOME Tweaks Tool
  - Exposes more settings to customize your interface, beyond Tinker on Mac
  - https://itsfoss.com/gnome-tweak-tool/
  - Tweaks has "Janitor" gives context and helps you clean wuth confidence
  - check if it's installed: run `gnome-tweaks`
  - `sudo apt update`
  - `sudo apt-add-repository universe`
  - `sudo apt install gnome-tweaks`
  - Search for tweaks or run command `gnome-tweaks`

Other tips for a clean system:
- clear APT cacche
  - sudo apt clean
  - sudo apt autoclean
  - sudo apt autoremove
- remove unneeded locale/localization packages
  - sudo apt install localepurge
- remove older kernels you don't need
- avoid complication from source

### Benchmarks
See https://openbenchmarking.org/ for more benchmarking information and learn about the Phoronix Test Suite
- sysbench
  - `sudo apt update && sudo apt install sysbench`
  - `sysbench cpu run`
    - single-threaded CPU benchmark
    - multi-threaded: `sysbench --threads=16 cpu run`
- stress-ng
  - `sudo udpate && sudo apt install stress-ng`
- 7z (yes 7-zip has build-in benchmark tool)
  - `sudo update && sudo install p7zip-full`
  - single threaded: `7z b -mmt1`
  - multi-thread: `7z b`

### Diagnostics
- System Profiler and Benchmark (aka hardinfo)
  - Available in the software center
  - https://github.com/hardinfo2/hardinfo2
- hw-probe
  - create a snapshot of your computer's hardware state and logs; checks operability of devices and returns a url to view the probe of the computer; suggets proper Linux kernel verion for devices missing a driver
  - https://github.com/linuxhw/hw-probe
  - there are a variety of ways to run a probe

NOTE The Ultimate Boot CD (UBCD) does not support UEFI boot.

## Install Code Editor
- VS Code
  - https://code.visualstudio.com/Download
- Notepadqq
  - https://notepadqq.com/wp/download/
  - `sudo apt install notepadqq`

## Install LAMP Environment
LAMP = Linux Apache MySQL PHP

- Install all the pieces manually
  - https://www.digitalocean.com/community/tutorials/how-to-install-lamp-stack-on-ubuntu
- Use a Docker image
  - https://medium.com/@mikez_dg/how-to-set-up-a-simple-lamp-server-with-docker-images-in-2023-9b0e24476ec6
  - [docker-compose.yml](docker-compose.yml)

## Test a Sample App



## Learn More
### Finding the IP address of mini1
https://help.ubuntu.com/stable/ubuntu-help/net-findip.html.en
### Remote access to mini1
- Remote Desktop and VNC - https://www.youtube.com/watch?v=m5U1PgqfGiA
- https://linuxize.com/post/how-to-enable-ssh-on-ubuntu-20-04/
- https://www.itpro.com/mobile/remote-access/368102/how-to-remote-desktop-into-ubuntu
  - `sudo apt update && sudo apt install openssh-server -y`
### Remmina Remote Desktop client
Remmina comes pre-installed on Ubuntu Desktop. It is handy way to connect to your other Lab systems
- RDP to Windows machines
- SSH
- VNC
- More!
