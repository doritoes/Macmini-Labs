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
  - Accept the language
  - Update the installer
    - Continue without updating
    - Optionally, update to the new installer; it will restart the process
  - Select "Ubuntu Server"
    - the "minimized" option is good, but means installing more packages later
    - no need to search for third-party drivers
    - the WiFi support packages will still be installed, as seen in a note at the bottom of the next screen
  - Accept the DHCP IP address
  - Leave Proxy blank
  - Wait for the mirror test to complete, then continue
  - accept the default storage settings
    - entire disk
    - LVM Group
  - <ins>Review the summary</ins>
    - Note the "free space" and only 100GB allocated to the root "/" partition
    - You can edit the root partition size or mount the free space somewhere like /home or /var
  - Continue and accept the warning that the storage will be erased
  - Enter server information (you can customize this as you see fit)
    - Your name:
    - Your servers name:
    - Pick a username:
    - Choose a password:
    - Confirm your password:
  - Skip Ubuntu "Pro"
  - Check/select Install OpenSSH server and continue
  - No featured server snaps required, just continue
  - Wait for the installation to complete. You will be prompted to choose reboot
  - When prompted, remove the USB stick and press Enter

## Update Pacakges
- `sudo apt update && sudo apt upgrade -y`

## Load Maintenance Tools

Tips for a clean system:
- avoid complication from source
- remove older kernels you don't need
- clear APT cache
  - sudo apt clean
  - sudo apt autoclean
  - sudo apt autoremove

### Benchmarks
See https://openbenchmarking.org/ for more benchmarking information and learn about the Phoronix Test Suite
- sysbench
  - Install
    - `sudo apt update && sudo apt install sysbench`
  - Run
    - `sysbench cpu run`
      - single-threaded CPU benchmark
      - multi-threaded: `sysbench --threads=16 cpu run`
    - See also: memory, threads, fileio, and mutex
- stress-ng
  - Install
    - `sudo udpate && sudo apt install -y stress-ng`
  - Run
    - CPU
      - `uptime && stress-ng --cpu -2 --timeout 60s --metrics-brief && uptime`
    - I/O for temporary files on disk 2
      - `stress-ng --disk 1 --timeout 60s --metrics-brief`
    - Memory
      - `stress-ng --vm 2 --vm-bytes 1G --timeout 60s`
    - Multiple: 60 seconds with 4 cpu stressors, 2 io stressors and 1 vm stressor using 1GB of virtual memory
      - `stress-ng --cpu 4 --io 2 --vm 1 --vm-bytes 1G --timeout 60s --metrics-brief`
  - Read more: https://www.cyberciti.biz/faq/stress-test-linux-unix-server-with-stress-ng/
- 7z (yes 7-zip has built-in benchmark tool)
  - Install
    - `sudo update && sudo install -y p7zip-full`
  - Run
    - single threaded: `7z b -mmt1`
    - multi-thread: `7z b`

### Diagnostics
- hw-probe
  - create a snapshot of your computer's hardware state and logs; checks operability of devices and returns a url to view the probe of the computer; suggests proper Linux kernel version for devices missing a driver
  - https://github.com/linuxhw/hw-probe
  - there are a variety of ways to run a probe; we will use a snap
  - `sudo snap install hw-probe`
  - `sudo -E hw-probe -all -upload`
  - Open the link that is returned to view the details in your web browser

NOTE The Ultimate Boot CD (UBCD) does not support UEFI boot.

## Install LAMP Environment
LAMP = Linux Apache MySQL PHP

Reference: https://www.digitalocean.com/community/tutorials/how-to-install-lamp-stack-on-ubuntu

- `sudo apt update && sudo apt install -y lamp-server^`
  - The carrot is there on purpose and is important
  - Alternative: `sudo apt update && sudo apt install -y apache2 mysql-server php libapache2-mod-php php-mysql`
- Make index.php the default index page
  - ``sudo vi /etc/apache2/mods-enabled/dir.conf``
  - move index.php to be the first item after DirectoryIndex
    - i.e., `DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm`
- Test PHP processing
  - copy this file to /var/www/html/
    - [index.php](index.php)
- Restart Web server
  - `sudo systemctl restart apache2`
- Load the page to test php processing
  - `curl http://127.0.0.1`
  - or access the IP address of the server remotely via browser (i.e., http://192.168.1.30)
  - should show the phpinfo() detailed output


## Install Docker
See https://medium.com/@mikez_dg/how-to-set-up-a-simple-lamp-server-with-docker-images-in-2023-9b0e24476ec6

Use the easy isntallation method
- `sudo apt update && sudo apt install -y curl`
- `curl -fsSL https://get.docker.com -o get-docker.sh`
- `sudo sh ./get-docker.sh --dry-run`
- `sudo sh ./get-docker.sh`

## NAS
- Time Machine Backup
See https://www.dimov.xyz/ubuntu-20-04-setting-up-mac-os-time-machine-server/
- File server
  - SMB
    - sudo apt install samba
    - modify /etc/samba/smb.conf
    - uncomment or add security = user, this can be found under the authentication header in the file.
    - Add the following
~~~
[Fred]
comment = Fred's Files
path = /path/to/folder
writable = yes
read only = yes
create mask = 0755
available = yes
~~~
    - add a password to your user: `sudo smbpassword fred`
    - `sudo sytemctl restart smbd`
  - NFS
    - Reference: https://reintech.io/blog/setting-up-nfs-server-ubuntu-22
    - `sudo apt update && sudo apt install -y nfs-kernel-server`
    - `sudo mkdir -p /srv/nfs/share`
    - `sudo chown nobody:nogroup /srv/nfs/share`
    - `sudo chmod 777 /srv/nfs/share`
    - Configure NFS exports
      - edit /etc/exports
      - Add following line to the file, replacing <client_ip> with the IP address of your client or subnet:
        - `/srv/nfs/share <client_ip>(rw,sync,no_subtree_check)`
      - `sudo exportfs -a`
    - `sudo systemctl enable nfs-kernel-server`
    - `sudo systemctl start nfs-kernel-server`
