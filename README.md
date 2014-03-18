otshosting-provisioning
=======================


```bash
#!/bin/bash -ex

apt-get install -y -q python-paramiko python-yaml python-jinja2 python-simplejson
apt-get install -y -q git-core
apt-get install -y -q software-properties-common python-software-properties

apt-add-repository ppa:rquillo/ansible
apt-get update
apt-get install ansible

echo "localhost" > ~/ansible_hosts
export ANSIBLE_HOSTS=~/ansible_hosts

ansible-pull -U https://github.com/DSpeichert/otshosting-provisioning.git -d /srv 

exit 0
```