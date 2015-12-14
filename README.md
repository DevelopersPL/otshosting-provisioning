otshosting-provisioning
=======================
This is an Ansible playbook used to fully provision a Ubuntu machine for OTS Hosting.

__It works with Ubuntu versions with systemd -> Ubuntu >= 15.04__

A script to run on a standalone machine to provision it. If user "otsmanager" does not exist, it will be created with password: "otsmanager".
```bash
#!/bin/bash -ex
apt-get update
apt-get install -y -q python-paramiko python-yaml python-jinja2 python-simplejson git-core ansible
ansible-pull -i 'localhost,' -U https://github.com/DevelopersPL/otshosting-provisioning.git -d /srv/otshosting-provisioning
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

apt_sources:
- source: deb $MIRROR $RELEASE universe multiverse restricted
- source: deb $MIRROR $RELEASE-updates universe multiverse restricted
- source: deb $MIRROR $RELEASE-security universe multiverse restricted

packages:
 - python-paramiko
 - python-yaml
 - python-jinja2
 - python-simplejson
 - git
 - ansible
 
runcmd:
  - 'ansible-pull -i 'lcoalhost,' -U https://github.com/DevelopersPL/otshosting-provisioning.git -d /srv/otshosting-provisioning'

```
