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

IMPORTANT Lab testing ran into a few scenarios where after first boot the main graphics pane was corrupted with RAM artifacts and ghosting. Installing 3rd party drivers during setup was the most common cause. A package update and reboot solved the issue in all cases.

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

## Update Pacakges
- `sudo apt update && sudo apt upgrade -y`

## Allow Remote Access
- Allow ssh
  - `sudo apt update && sudo apt install -y openssh-server`
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

## Load Maintenance Tools
References:
- https://www.howtoforge.com/tutorial/how-to-maintain-a-clean-ubuntu/

Cleanup and maintenance tools for Ubuntu
- ubuntu-cleaner
  - designed to clean up your Ubuntu system
  - Install
    - `sudo update && sudo apt install -y software-properties-common`
    - `sudo add-apt-repository ppa:gerardpuig/ppa`
    - `sudo apt update && sudo apt install -y ubuntu-cleaner`
  - Run
    - Run Ununtu Cleaner from launcher
  - Easy to remove after using: `sudo apt remove ubuntu-cleaner && sudo apt autoremove`
  - Lab testing had "abnormal ends" trying Apps and Personal. System worked fine.
- ucaresystem
  - complete update and cleaning tool; automates the manual cleanup steps
  - Install
    - `sudo add-apt-repository ppa:utappia/stable`
    - `sudo apt update && sudo install -y ucaresystem-core`
  - Run
    - run uCareSystem from launcher
    - `sudo ucaresystem-core`
- BleachBit
  - similar to CCleaner; deeper clean that allows cleanup junk files like history, cache, temporary files, crash reports, etc. Erases free disk space.
  - Install
    - https://www.bleachbit.org/download/linux
    - download the .deb package and open it with Software Install
  - Run
    - There are two variants to run from the launcher, one "as Administrator"
- localepurge
  - Remove unneeded locale/localization packages and prevent installation of uneed locales in future
  - Install
    - `sudo apt install -y localepurge`
    - Follow the prompts
  - Run
    - After the initial configuration, operates in the background
- GNOME Tweaks Tool
  - Exposes more settings to customize your interface, like Tinker on Mac
  - https://itsfoss.com/gnome-tweak-tool/
  - Tweaks has "Janitor" gives context and helps you clean with confidence
  - Install
    - check if it's installed: run `gnome-tweaks`
    - `sudo apt update`
    - `sudo apt-add-repository universe`
    - `sudo apt install -y gnome-tweaks`
  - Run
    -  run Tweaks from launcher
    - `gnome-tweaks`
- Stacer
  - open source system optimizer and application monitor that can also clean junk
  - https://oguzhaninan.github.io/Stacer-Web/
  - Install
    - `sudo apt-get update && sudo apt-get install -y stacer`
  - Run
    - Run Stacer from the launcer
    - `stacer`

NOTE GtkOrphan has been removed the from Ubuntu archive. It used to scan for orphaned packages upon launch.

Other tips for a clean system:
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
- System Profiler and Benchmark (aka hardinfo)
  - Available in the software center
  - https://github.com/hardinfo2/hardinfo2
- hw-probe
  - create a snapshot of your computer's hardware state and logs; checks operability of devices and returns a url to view the probe of the computer; suggests proper Linux kernel version for devices missing a driver
  - https://github.com/linuxhw/hw-probe
  - there are a variety of ways to run a probe; we will use a snap
  - `sudo snap install hw-probe`
  - `sudo -E hw-probe -all -upload`
  - Open the link that is returned to view the details in your web browser

NOTE The Ultimate Boot CD (UBCD) does not support UEFI boot.

## Install Code Editor
- VS Code
  - https://code.visualstudio.com/Download
- Notepadqq
  - https://notepadqq.com/wp/download/
  - `sudo apt install notepadqq`

## Install LAMP Environment
LAMP = Linux Apache MySQL PHP

Here are 2 ways to set up the LAMP environment. They both point to the same web root data and same mysql data on the system/

- Install all the pieces manually
  - `sudo apt update && sudo apt install -y lamp-server^'`
    - The carrot is there on purpose and is important
    - Alternative: `sudo apt update && sudo apt install -y apache2 mysql-server php libapache2-mod-php php-mysql`
  - https://www.digitalocean.com/community/tutorials/how-to-install-lamp-stack-on-ubuntu
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
    - http://127.0.0.1
    - should show the phpinfo() detailed output
- Use a Docker image
  - https://medium.com/@mikez_dg/how-to-set-up-a-simple-lamp-server-with-docker-images-in-2023-9b0e24476ec6
  - Install docker if needed
    - `sudo apt update && sudo apt install -y curl`
    - `curl -fsSL https://get.docker.com -o get-docker.sh`
    - `sudo sh ./get-docker.sh --dry-run`
    - `sudo sh ./get-docker.sh`
  - Create a project directory
    - `mkdir lamp-docker && cd lamp-docker`
  - Create the file [docker-compose.yml](docker-compose.yml)
  - If /var/www/html doesn't exist yet
    - `sudo mkdir -p /var/www/html`
  - Put your web application or HTML files inside it
    - If you don't have any files handy, put a copy of [index.php](index.php) there; it will display the output of phpinfo()
  - Build and run the containers
    - Install docker-compose
        - https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-22-04
        - `mkdir -p ~/.docker/cli-plugins/`
        - `curl -SL https://github.com/docker/compose/releases/download/v2.3.3/docker-compose-linux-x86_64 -o ~/.docker/cli-plugins/docker-compose`
        - `chmod +x ~/.docker/cli-plugins/docker-compose`
        - `sudo ln -s ~/.docker/cli-plugins/docker-compose /usr/sbin`
        - `docker-compose version`
    - `sudo docker-compose up -d`
  - Test access:
    - Web site: http://localhost
    - PHPMyAdmin: http://localhost:8080
      - credentials are in the docker-compose.yml file

## Dokuwiki
Dokuwiki is an open source wiki that is a good demonstration. However, it does not use the MySQL database
- https://download.dokuwiki.org/
  - optionally remove unwanted language packages
  - optionally add Upgrade Plug-In
  - Click Download
- Open Terminal
- Copy the downloaded .tgz file to the web root
  - `sudo cp Downloads/dokuwiki*tgz /var/www/html`
- Unpack the tgz file
  - `cd /var/www/html`
  - `sudo tar xzvf dokuwiki-[tab complete]`
- Set permissions
  - `sudo chown -R www-data:www-data /var/www/html/dokuwiki`
- Run the Dokuwiki installation wizard
  - http://127.0.0.1/dokuwiki/install.php
- Clean up
  - delete the install.php file from the /var/www/dokuwiki folder
  - delete the .tgz file from the /var/www/html folder
- Access the wiki at http://127.0.0.1/dokuwiki/

## Install LAMP Apps
### Simple-LAMP
WARNING If you configured strong password requirements when you ran `mysql_secure_installation`, you will need to use something stronger than "password" in the command below and in the config.php file. "Password1234!" works.

IMPORTANT - currently the database only accepts unix sockets, so the connection for 'username' fails.
~~~
Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1142 SELECT command denied to user 'username'@'localhost' for table 'upload_images' in /var/www/html/simple-lamp/index.php:118\nStack trace:\n#0 /var/www/html/simple-lamp/index.php(118): PDOStatement->execute()\n#1 /var/www/html/simple-lamp/index.php(207): retrieve_recent_uploads()\n#2 {main}\n  thrown in /var/www/html/simple-lamp/index.php on line 118
~~~

- https://github.com/qyjohn/simple-lamp
- Open Terminal
- Change directory to the html root
  - `cd /var/www/html`
- Clone the repo
  - https://github.com/qyjohn/simple-lamp
  - `git clone https://github.com/qyjohn/simple-lamp`
  - `cd simple-lamp`
- Configure MySQL
  - `sudo mysql`
  - Paste commands below
~~~
DROP DATABASE IF EXISTS simple_lamp;
CREATE DATABASE simple_lamp;
USE simple_lamp;
DROP USER IF EXISTS 'username'@'localhost';
CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON simple_lamp.* TO 'username'@'localhost';
FLUSH PRIVILEGES;
CREATE TABLE upload_images (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) DEFAULT '',
  filename varchar(255) DEFAULT '',
  timeline timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
~~~
  - `exit`
  - WARNING If you ran `mysql_secure_installation` you will want to run this:
    - `ALTER USER 'username'@'localhost' IDENTIFIED WITH mysql_native_password by `Password1234!';`
    - and update the config.php file to use the same password `Password1234!`
  - `sudo mysql -u root -p simple_lamp < simple_lamp.sql`
   - press enter (no password) when prompted for the mysql password for root
- Set file permissions
  - `sudo chown www-data:www-data -R /var/www/html/simple-lamp/`
- Access the app:
  - http://127.0.0.1/simple-lamp/
  - or docker: http://127.0.0.1:8080/simple-lamp/
- You can now access the app from another Lab system by using the IP address of the mini
  - example: http://192.168.0.100/simple-lamp

### YOURLS
This is a URL shortener service app that exercises the MySQL database.

https://yourls.org/docs - https://github.com/YOURLS/YOURLS
- Web Server: YOURLS requires Apache (httpd) version 2.4 or greater, with the mod_rewrite module enabled.
- PHP: PHP version 7.4 or greater is required for YOURLS to function correctly.
- If you plan on utilizing the YOURLS API, make sure the PHP cURL extension is enabled.
- Database: YOURLS supports either MySQL (version 5.0 or greater) or MariaDB (version 10.0 or greater) for storing link data.
- HTTPS Support: For security reasons, we recommend hosting your YOURLS installation on a server with HTTPS support.

Steps:
- Change directory to the html root
  - `cd /var/www/html`
- Clone the repo
  - https://github.com/qyjohn/simple-lamp
  - `sudo git clone https://github.com/YOURLS/YOURLS`
- Set permissions
  - `sudo chown www-data:www-data -R /var/www/html/YOURLS`
- Create the MySQL database and user
  - `sudo mysql`
~~~
DROP DATABASE IF EXISTS yourls;
CREATE DATABASE yourls;
DROP USER IF EXISTS 'yourls'@'localhost';
CREATE USER 'yourls'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON yourls.* TO 'yourls'@'localhost';
FLUSH PRIVILEGES;
~~~
- Create config file
  - Copy /var/www/html/YOURLS/user/config-sample.php to /var/www/html/YOURLS/user/config.php
  - Edit 
  - Edit the YOURLS_DB_USER value to `yourls` (in production you would add another user for YOURLS)
  - Edit the YOURLS_DB_PASS to the password we above (i.e. `password` unless you had to use another password because you secured your mysql installation)
  - Modify YOURLS_SITE to the URL you will use to access the site
    - e.g., http://192.168.99.100/YOURLS or docker http://192.168.99.100:8080/YOURLS
    - if you don't change this setting you will get a hilarious error message
  - Optionally modify the default admin credentials of: username/password
- Navigate to http://127.0.0.1/YOURLS/admin
  - or docker http://127.0.0.1:8080/YOURLS/admin
- Click **Install YOURLS**
- Click the link to the admin page
- Log in (credentials in config.php, default: username/password)
- Optionally create a web page the home directory that non-admins will see (e.g., /var/www/html/YOURLS/index.php)
- Remove the unneeded files from the YOURLS directory, such as "setup.php", "readme.html", the sample files, the git folders, etc.

### Lychee
Lychee is a photo management tool.

https://lycheeorg.github.io/docs/installation.html

Lychee is a photo management tool. We are going install an older version to keep things simple. The latest version is intended to be installed using npm, beyond the scope of our limited environment.

https://github.com/electerious/Lychee

Steps:
- Change directory to the /var/www/html directory
- Clone the repo
  - https://github.com/electerious/Lychee
  - `sudo git clone https://github.com/electerious/Lychee`
- Permissions
  - `cd Lychee`
  - `sudo chown www-data:www-data -R /var/www/html/Lychee
  - `sudo chmod -R 750 uploads/ data/`
- Set password
  - `sudo mysql`
  - `ALTER USER 'root'@'localhost' IDENTIFIED BY 'password';`
  - `ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'password';`
  - `exit`
- Configure
  - http://127.0.0.1/Lychee
    - or docker http://127.0.0.1:8080/Lychee
  - Database host: leave blank
  - Database Username: **root**
  - Database Password: the root password you selected (you will need to re-enable root login if you ran `msql_secure_installation`)
  - Click Connect
  - Enter username and password for your new installation then click Create Login

Troubleshooting:
- http://127.0.0.1/Lychee/plugins/Diagnostics/index.php
  - docker: http://127.0.0.1:8080/Lychee/plugins/Diagnostics/index.php
 
CREATE DATABASE lychee;
USE lychee;
DROP USER IF EXISTS 'lycheeuser'@'localhost';
CREATE USER 'lycheeuser'@'localhost' IDENTIFIED BY 'lycheeuser_passwd';
GRANT ALL PRIVILEGES ON lychee.* TO 'lycheeuser'@'localhost';
FLUSH PRIVILEGES;

Note that if you log in and try to upload a photo, you might get the error
- No API function specified! Please take a look at the console of your browser for further details.
- No all images had this issue in my testing

Note: the latest version of Lychee is at https://github.com/LycheeOrg/Lychee
- You can try `brew install npm` and install it, but my attempts failed.

## Learn More
### Finding the IP address of mini1
https://help.ubuntu.com/stable/ubuntu-help/net-findip.html.en
### Remmina Remote Desktop client
Remmina comes pre-installed on Ubuntu Desktop. It is handy way to connect to your other Lab systems
- RDP to Windows machines
- SSH
- VNC
- More!

### Securing MySQL
Many tutorials recommend running:


This is a good idea, but can cause issues in our lab if you are not prepared.

Steps:
- `sudo mysql_secure_installation`
- Validate password component: No (this is a lab)
  - Remove anonymous users: Yes
  - Disallow root login remotely: Yes
  - Remove test database and access to it: Yes
  - Reload privilege tables now: Yes
  - To access the mysql cli:
    - YES: sudo mysql
    - NO: mysql -u root -p
  - To renable logging in with root password:
    - `ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'mynewpassword';`
  - To switch back to socket:
    - `ALTER USER 'root'@'localhost' IDENTIFIED WITH auth_socket;`
