# Linux Server Testing
In this step, we will be installing Ubuntu Server 22.04 LTS and putting it through its paces.

It's very easy to install Ubuntu Server on the mini. I actually used the very same USB stick I used to install on Intel NUCs to install Ubuntu on the mini.
- Download Ubuntu Server 22.04 LTS ISO
- Create a bootable USB stick using Balena Etcher
- Power off the Mac mini
- Insert the bootable USB stick
- Power on then immediately hold Option key (Alt key on Windows keyboard)
- Select the EFI boot image
- Follow the usual prompts

*See more comments at https://medium.com/@woodywang2013/linux-on-an-old-mac-mini-f8cb63b7657f*

## Install from Bootable USB Stick
See the tutorial https://ubuntu.com/tutorials/install-ubuntu-server#1-overview
- Download the [latest iso file](https://ubuntu.com/download/server)
  - This lab was created using Ubuntu 22.04, which can be found under the "Previous releases" section
 - Create a bootable USB stick from the ISO
  - 💡[balenaEtcher](https://etcher.balena.io/#download-etcher) is recommended to create a bootable USB stick from the ISO
  - If your workstation is Windows, the Etcher Portable version is perfect for the task
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

## Update Pacakges
- `sudo apt update && sudo apt upgrade -y`

## Load Maintenance Tools

### Benchmarks

### Diagnostics

### Maintenance

## Install LAMP Environment
LAMP = Linux Apache MySQL PHP

Test a Sample App

## Install Docker
 Run a Sample App

## NAS
- Time Machine Backup
- File server
