# What We Learned
Moving to a Mac mini from the Intel NUC world is a shock to the system. But there are some great learnings.

Use cases:
- :thumbsdown: Living Room PC
  - Zoom: You can try using Zoom in Firefox ESR, but that's it
  - Media: OK for the task
- :thumbsup: Media Server
- :thumbsup: Linux Server
  - Docker is the best virtualization play on this model
  - File server for small amount of files unless you attach storage like the OWC miniStack

# The Good
- the Lab mini has a SuperDrive which is useful to ripping DVDs to Plex Media Server
- quality components felt on-par to the Intel NUC; it didn't feel cheap, but rather well-engineered
  - Warning: so well engineered you will need <ins>patience</ins> to replace the HDD with a SSD and do disassembly/reassembly beyond upgrading the RAM
- Firefox ESR runs on it, which is good
- no additional cost for the OS (I'm looking at you Windows)

# The Bad
- limited RAM capability (later models have soldered-on RAM preventing upgrades!)
- no hyperthreading, just 2 CPU cores
- no supported macOS will run on it, ergo modern apps will not run on it
- the display chipset and drivers are very bad, expecially on the Lab mini tested

# The Ugly
- not a fan of the special tools required
- reinstalling macOS is overly difficult now that the Internet Recovery option is broken

# Recommendations
- #1 Replace HDD or Fushion Drives with SSD
- Upgrade RAM to 8GB (or more if you are doing memory intensive operations)
  - Hopefully all minis with soldered-on RAM are 8GB or more...
- Load Linux to be able to run modern applications
- Avoid loading Windows
