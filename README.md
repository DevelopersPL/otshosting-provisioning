You may be looking for our --> [DOCUMENTATION on wiki](https://github.com/DevelopersPL/otshosting-provisioning/wiki) <--

otshosting-provisioning
=======================
This is an Ansible playbook used to fully provision a Ubuntu machine for OTS Hosting.

__It works with Ubuntu 16.04 or newer.__

Make sure to have universe, multiverse and restricted repositories enabled.

A script to run on a standalone machine to provision it. If user "otsmanager" does not exist, it will be created with password: "otsmanager".
```bash
#!/bin/bash -ex
apt-get update
apt-get install -y -q python-simplejson git-core ansible aptitude
ansible-pull -i localhost, -U https://github.com/DevelopersPL/otshosting-provisioning.git -d /srv/otshosting-provisioning --purge
```

A cloud-init script to provision cloud instances with otshosting:
```
#cloud-config
users:
  - name: otsmanager
    gecos: OTS Manager
    lock-passwd: false
    
disable_root: true
ssh_pwauth: True
timezone: Europe/Warsaw

package_upgrade: true
package_update: true
apt_mirror: http://mirror.ovh.net/ubuntu/

packages:
 - python-simplejson
 - git
 - ansible
 - aptitude
 
runcmd:
  - 'ansible-pull -i localhost, -U https://github.com/DevelopersPL/otshosting-provisioning.git -d /srv/otshosting-provisioning --purge'
```
