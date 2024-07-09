# Proxmox on the Intel Mac mini
In this step, we will be installing Proxmox and put it through its paces. We will be installating Proxmox two ways and testing traditional VMs as well as LXC Linux containers. The limited resources limit us to only the smallest images.

There are two ways and different reasons to use them
- Bare metal - install proxmox directly
  - promises best performance
- On Debian - install Debian OS desktop, then install proxmox
  - Proxmox is more user-friendly when installed on a GUI
  - Proxymox is based on Debian
  - Debian installer gives you control over filesystem layoutes, etc than the Proxmox ISO installer
    - allows controlling thing like the fan speeds, etc.
    - better driver support

Important notes:
- installing proxmox successfully doesn't always mean you will have success with running and managing your VMs
  - Some machines can't run Ceph benaires (manager, monitor, etc.)
- For this older mini, Docker is the recommended virutalization solution

# Baremetal Installation
This is the first installation use case where we install Proxmox directly onto the mini.

## Create Bootable Installation USB
- Download ISO from https://www.proxmox.com/en/downloads/proxmox-virtual-environment
- Create Bootable USB using [Balena Etcher](https://etcher.balena.io/)

## Intial Installation
- Power off the Mac mini
- Insert the bootable USB stick
- Power on then immediately hold Option key (Alt key on Windows keyboard)
- Select the EFI boot image

## Initial Configuration
content here

# Installation on Debian
In this second installation we install Debian desktop on the mini and then install the Proxmox packages.
## Create Debian Installation USB

https://www.debian.org/distrib/

## Install Debian
https://www.debian.org/releases/bullseye/amd64/

To make things simple for the lab, we will use the hybrid ISO images for LiveCD installation
- https://cdimage.debian.org/debian-cd/current-live/amd64/iso-hybrid/

We are going to use the Gnome desktop: https://cdimage.debian.org/debian-cd/current-live/amd64/iso-hybrid/debian-live-12.6.0-amd64-gnome.iso

TIP This is a great opportunity to download the ISO using a torrent.
- Use aria2c to download the torrent files: https://mangohost.net/blog/guide-to-aria2-package-in-linux/
- Works in WSL on a windows machine. Example:
- `sudo apt install -y aria2`
- `aria2c https://cdimage.debian.org/debian-cd/current-live/amd64/bt-hybrid/debian-live-12.6.0-amd64-gnome.iso.torrent`

Create Bootable Installation USB

Install Debian
## Install Proxmox
https://pve.proxmox.com/wiki/Install_Proxmox_VE_on_Debian_12_Bookworm
